<?php namespace App\Http\Transformers;

/**
 * Transformer
 *
 * @author AnuJ Jaha <er.anujjaha@gmail.com>
 */
abstract class Transformer 
{
	/**
	 * Transform Collection
	 *
	 * @param object $items
	 * @return array
	 */
    public function transformCollection($items) 
    {
    	return array_map([$this, 'transform'], $items);
    }

    /**
     * Transform Description
     * 
     * @param array $item
     * @return mixed
     */
    public abstract function transform($item);
    	
    /**
     * Null To Blank
     * 
     * @param string|mixed $data
     * @return string
     */
    public function nulltoBlank($data = null)
    {
        return isset($data) ? $data : '';
    }
}