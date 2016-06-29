<?php

namespace App\Http\Controllers\Backend\Content;

use App\Http\Controllers\Controller;
use App\Models\Content\Article\Article;
use App\Http\Requests\Backend\Content\Article\StoreArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * Class ArticleController
 * @package App\Http\Controllers
 */
class ArticleController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        javascript()->put([
            'test' => 'it works!',
        ]);

        $models = Article::withTrashed()->paginate(10);
        
        return view('backend.content.article.index', ['models'=> $models]);
    }
    
    /**
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function view(int $id)
    {
        $model = Article::withTrashed()->find($id);
        
        return view('backend.content.article.view', ['model' => $model]);
    }
    
    /**
     * 
     * @param \Illuminate\Http\Request; $request
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = new Article();
        
        return view('backend.content.article.create', ['model' => $model]);
    }
    
    /**
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        $model = Article::withTrashed()->find($id);
        
        return view('backend.content.article.edit', ['model' => $model]);
    }
    
    /**
     * 
     * @param \Illuminate\Http\Request; $request
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function update(Request $request, int $id)
    {
        $model = Article::withTrashed()->find($id);
        if($model->fill($request->all())->save()){
            Session::flash('flash_success', trans('alerts.backend.content.article.updated'));
        }
        
        return redirect('admin/content/article');
    }
    
    /**
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function store(StoreArticleRequest $request)
    {
        if(Article::create($request->all())){
            Session::flash('flash_success', trans('alerts.backend.content.article.created'));
        }
        
        return redirect('admin/content/article');
    }
    
    /**
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function destroy(int $id)
    {
        if(Article::destroy($id)){
            Session::flash('flash_success', trans('alerts.backend.content.article.deleted'));
        }
        
        return redirect()->back();
    }
    
    /**
     * 
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function restore(int $id)
    {
        if(Article::withTrashed()->find($id)->restore()){
            Session::flash('flash_success', trans('alerts.backend.content.article.restored'));
        }
        
        return redirect()->back();
    }
}
