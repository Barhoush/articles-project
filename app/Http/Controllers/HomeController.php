<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
{
    //
    public function index($category =   null){
        if($category){
            $categoryModel  =   Category::where('slice',$category)  ->  first();
            $articles   =   $categoryModel? $categoryModel  ->  articles()  :   null;
        }
        else{
            $articles   =   Article::where('published', 1);
        }
        $articlesCollection =   $articles?  $articles   ->  paginate(8)  :   [];
        return view('home.index')
            ->with('articles',  $articlesCollection)
            ;
    }

    public function showArticle($id){
        $article    =   Article::find($id);
        if(!$article){
            throwException(NotFoundHttpException::class);
        }

        return  view('home.show')
            ->with('article',   $article);
    }
}
