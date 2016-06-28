<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    
    public function index(){
        return view('frontend.test')->withArticles(\App\Models\Article::all());
    }
}
