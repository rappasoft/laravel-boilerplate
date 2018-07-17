<?php

namespace App\Http\Controllers\Backend\History;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\History\ViewHistoryRequest;
use App\Repositories\Backend\History\HistoryRepository;

/**
 * Class HistoryController.
 */
class HistoryController extends Controller
{

	/**
	 * @var HistoryRepository
	 */
	protected $historyRepository;

	/**
	 * HistoryController constructor.
	 *
	 * @param HistoryRepository $historyRepository
	 */
	public function __construct(HistoryRepository $historyRepository)
	{
		$this->historyRepository = $historyRepository;
	}

	/**
	 * @param ViewHistoryRequest $request
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index(ViewHistoryRequest $request) {
		$view = view('backend.history.index');

		$history_types = $this->historyRepository->getHistoryTypes();
		$view->with('history_types', $history_types);

		foreach ($history_types as $history_type) {
			$view->with(str_replace('\\', '_', $history_type), $this->historyRepository->getCategory($history_type));
		}

		return $view;
	}
}