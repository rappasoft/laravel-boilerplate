<?php

namespace App\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\ArticleCategory\ArticleCategory;
use App\Http\Requests\Backend\Content\ArticleCategory\StoreArticleCategoryRequest;
use Illuminate\Http\Request;

/**
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleCategoryController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        javascript()->put([
            'test' => 'it works!',
        ]);

        $models = ArticleCategory::withTrashed()->paginate(10);
        
        return view('backend.content.article-category.index', ['models'=> $models]);
    }
    
    /**
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function view(int $id)
    {
        $model = ArticleCategory::withTrashed()->find($id);
        
        return view('backend.content.article-category.view', ['model' => $model]);
    }
    
    /**
     * 
     * @param \Illuminate\Http\Request; $request
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = new ArticleCategory();
        
        return view('backend.content.article-category.create', ['model' => $model]);
    }
    
    /**
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        $model = ArticleCategory::withTrashed()->find($id);
        
        return view('backend.content.article-category.edit', ['model' => $model]);
    }
    
    /**
     * 
     * @param \Illuminate\Http\Request; $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function update(Request $request, int $id)
    {
        $model = ArticleCategory::withTrashed()->find($id);
        $model->fill($request->all())->save();
        
        return redirect('admin/content/article-category');
    }
    
    /**
     * 
     * @param \Illuminate\Http\Request; $request
     * @return \Illuminate\View\View
     */
    public function store(StoreArticleCategoryRequest $request)
    {
        ArticleCategory::create($request->all());
        
        return redirect('admin/content/article-category');
    }
    
    /**
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function destroy(int $id)
    {
        ArticleCategory::destroy($id);
        
        return redirect()->back();
    }
    
    /**
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function restore(int $id)
    {
        ArticleCategory::withTrashed()->find($id)->restore();
        
        return redirect()->back();
    }
}
