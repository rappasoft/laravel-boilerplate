<?php

namespace App\Models\Content\Article;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Content\Article\Traits\Attribute\ArticleAttribute;
use App\Models\Content\Article\Traits\Relationship\ArticleRelationship;
use Carbon\Carbon;

class Article extends Model
{
    use SoftDeletes;
    use ArticleAttribute;
    use ArticleRelationship;
    
    /**
     * table name
     * @var string 
     */
    public $table = 'articles';
    
    /**
     * fields can be filled
     * @var type 
     */
    protected $fillable = array('title', 'slug', 'excerpt', 'content', 'category_id', 'status');
    
    /**
     * date field
     * @var type 
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    
    protected static function boot() {
        static::creating(function ($model) {
            if(!$model->id){
                $model->user_id = Auth::user()->id;
                $model->created_at = Carbon::now();
                $model->updated_at = Carbon::now();
            }
        });
        
        return parent::boot();
    }
}
