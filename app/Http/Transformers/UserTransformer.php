<?php namespace App\Http\Transformers;

/**
 * UserTransformer
 *
 * @author Anuj Jaha <er.anujjaha@gmail.com>
 */
use App\Http\Transformers;

class UserTransformer extends Transformer 
{
    /**
     * Transform
     *
     * @param object $data
     * @return array
     */
    public function transform($data)  
    {
        return [
            'userId'    => $data->id,
            'name'      => $this->nulltoBlank($data->name),
            'email'     => $this->nulltoBlank($data->email)
        ];
    }
}