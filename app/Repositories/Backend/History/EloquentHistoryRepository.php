<?php namespace App\Repositories\Backend\History;

use App\Models\History\History;
use App\Models\History\HistoryType;

/**
 * Class EloquentHistoryRepository
 * @package App\Repositories\Backend\History
 */
class EloquentHistoryRepository implements HistoryContract {

	/**
	 * @param $type
	 * @param $text
	 * @param null $entity_id
	 * @param null $icon
	 * @param null $class
	 * @param null $assets
	 * @return bool|static
	 */
	public function log($type, $text, $entity_id = null, $icon = null, $class = null, $assets = null)
	{
		//Type can be id or name
		if (! is_numeric($type))
			$type = HistoryType::where('name', $type)->first();

		if ($type instanceof HistoryType)
			return History::create([
				'type_id' => $type->id,
				'text' => $text,
				'user_id' => access()->id(),
				'entity_id' => $entity_id,
				'icon' => $icon,
				'class' => $class,
				'assets' => is_array($assets) && count($assets) ? json_encode($assets) : null,
			]);

		return false;
	}

	/**
	 * @return string
	 */
	public function render() {
		$history = History::with('user')->latest()->get();

		if (! $history->count())
			return trans("history.backend.none");

		return $this->buildList($history);
	}

	/**
	 * @param $type
	 * @return string
	 */
	public function renderType($type) {
		if (is_numeric($type)) {
			$history = History::with('user')->where('type_id', $type)->latest()->get();
		} else {
			$type = strtolower($type);

			$history = History::whereHas('type', function ($query) use ($type) {
				$query->where('name', ucfirst($type));
			})->latest()->get();
		}

		if (! $history->count())
			return trans("history.backend.none_for_type");

		return $this->buildList($history);
	}

	/**
	 * @param $entity_id
	 * @return string
	 */
	public function renderEntity($entity_id) {
		$history = History::with('user', 'type')->where('entity_id', $entity_id)->latest()->get();

		if (! $history->count())
			return trans("history.backend.none_for_entity", ['entity' => $history->type->name]);

		return $this->buildList($history);
	}

	/**
	 * @param $text
	 * @param bool $assets
	 * @return mixed|string
	 */
	public function renderDescription($text, $assets = false) {
		$assets = json_decode($assets, true);
		$count = 1;
		$asset_count = count($assets)+1;

		if (count($assets)) {
			foreach ($assets as $name => $values) {
				switch ($name) {
					case "string":
						${"asset_".$count} = $values;
						break;

					//Cant have link be multiple array keys, allows for link, link1, link2, etc.
					case substr($name, 0, 4) == "link":
						if (is_array($values)) {
							switch (count($values)) {
								case 1:
									${"asset_".$count} = link_to_route($values[0], $values[0]);
									break;

								case 2:
									${"asset_".$count} = link_to_route($values[0], $values[1]);
									break;

								case 3:
									${"asset_".$count} = link_to_route($values[0], $values[1], $values[2]);
									break;

								default:
									break;
							}
						} else {
							//Normal url
							${"asset_".$count} = link_to($values, $values);
						}
						break;

					default:
						break;
				}

				$text = str_replace("$".$count, ${"asset_".$count}, $text);
				$count++;
			}
		}

		if ($asset_count == $count) {
			//Evaluate all trans functions as PHP
			//We don't want to use eval() for security reasons so we're explicitly converting trans cases
			return preg_replace_callback('/trans\(\"([^"]+)\"\)/', function($matches) {
				return trans($matches[1]);
			}, $text);
		}
		return '';
	}

	/**
	 * @param $items
	 * @return string
	 */
	public function buildList($items) {
		$html = '<ul class="timeline">';

		foreach ($items as $h) {
			$html .= $this->buildItem($h);
		}

		$html .= '</ul>';

		return $html;
	}

	/**
	 * @param History $history
	 * @return string
	 */
	public function buildItem(History $history) {
		return
			'<li>'.
              '<i class="fa fa-'.$history->icon.' '.$history->class.'"></i>'.

				'<div class="timeline-item">'.
                '<span class="time"><i class="fa fa-clock-o"></i> '.$history->created_at->diffForHumans().'</span>'.
				'<h3 class="timeline-header no-border"><strong>'.$history->user->name.'</strong> '.$this->renderDescription($history->text, $history->assets).'</h3>'.
              '</div>'.
            '</li>';
	}
}