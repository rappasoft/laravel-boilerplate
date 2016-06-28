<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    use SoftDeletes;
    
    public $table = 'articles';
    protected $fillable = array('title', 'slug', 'excerpt', 'content');
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
    protected static function boot() {
        static::creating(function ($model) {
            if(!$model->id){
                $model->user_id = 1;
                $model->created_at = Carbon::now();
                $model->updated_at = Carbon::now();
            }
        });
        
        return parent::boot();
    }
}
