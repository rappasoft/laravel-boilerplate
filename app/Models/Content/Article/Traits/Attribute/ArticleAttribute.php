<?php

namespace App\Models\Content\Article\Traits\Attribute;

/**
 * Class ArticleAttribute
 * @package App\Models\Access\User\Traits\Attribute
 */
trait ArticleAttribute
{
    /**
     * 
     * @return string
     */
    public function getTitleLabelAttribute()
    {
        if ($this->trashed())
            return "<label class='label label-default'><del>".$this->title ."</del></label>";
        return "<label class='label label-info'>".$this->title ."</label>";
    }
    
    /**
     * 
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->status)
            return "<label class='label label-success'>".trans('labels.general.published')."</label>";
        return "<label class='label label-default'>".trans('labels.general.draft')."</label>";
    }
    
    /**
     * @return string
     */
    public function getViewButtonAttribute()
    {
        return '<a href="' . route('admin.content.article.view', $this->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.view') . '"></i></a> ';
    }
    
    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="' . route('admin.content.article.edit', $this->id) . '" class="btn btn-xs btn-warning"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.edit') . '"></i></a> ';
    }
    
    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="' . route('admin.content.article.restore', $this->id) . '" class="btn btn-xs btn-success"><i class="fa fa-recycle" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.restore') . '"></i></a> ';
    }
    
    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="' . route('admin.content.article.destroy', $this->id) . '" class="btn btn-xs btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="' . trans('buttons.general.crud.delete') . '"></i></a> ';
    }
    
    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        $html = $this->getViewButtonAttribute();
        $html.=$this->getEditButtonAttribute();
        $html.=$this->deleted_at ? $this->getRestoreButtonAttribute() : $this->getDeleteButtonAttribute();
        return $html;
    }
}