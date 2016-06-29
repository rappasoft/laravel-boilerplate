<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Content\Article\Article;
use Illuminate\Http\Request;

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

        return view('frontend.article.index', ['articles'=> Article::paginate(10)]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function view(Request $request, $id)
    {
        $model = Article::findOrFail($id);
        
        return view('frontend.article.view', ['model' => $model]);
    }
}
