<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    
    /**
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.test')->withArticles(\App\Models\Content\Article::all());
    }
}
