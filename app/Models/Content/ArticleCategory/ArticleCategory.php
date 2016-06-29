<?php

namespace App\Models\Content\ArticleCategory;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Content\ArticleCategory\Traits\Attribute\ArticleCategoryAttribute;
use App\Models\Content\ArticleCategory\Traits\Relationship\ArticleCategoryRelationship;
use Carbon\Carbon;

class ArticleCategory extends Model
{
    use SoftDeletes;
    use ArticleCategoryAttribute;
    use ArticleCategoryRelationship;
    
    /**
     * table name
     * @var string 
     */
    public $table = 'article_categories';
    
    /**
     * fields can be filled
     * @var array 
     */
    protected $fillable = array('title', 'slug', 'status');
    
    /**
     *d date field
     * @var array 
     */
    protected $dates = ['deleted_at'];
    
    /**
     * disable timestamp fields
     * @var type 
     */
    public $timestamps = false;
    
    const STATUS_PUBLISHED = 1;
    const STATUS_DRAFT = 0;
    
    protected static function boot() {
        static::creating(function ($model) {
            if(!$model->id){
                $model->user_id = Auth::user()->id;
            }
        });
        
        return parent::boot();
    }
    
    /**
     * get all categories for dropdown list
     * @return array $categoriesList
     */
    public static function categoriesList(){
        $categories = self::withTrashed()->get();
        
        $categoriesList = [];
        foreach($categories as $category){
            $categoriesList[$category->id] = $category->title;
        }
        
        return $categoriesList;
    }
}
