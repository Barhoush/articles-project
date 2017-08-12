<?php
namespace App\Http\Controllers;
use App\Article;
use App\Category;
use App\Comment;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            return redirect()->back();
        }
        $comments   =   $article
            ->comments()
            ->where('published',    1)
            ->orderBy('created_at', 'DESC')
            ->take(10)
            ->get();

        return  view('home.show')
            ->with('article',   $article)
            ->with('comments',   $comments)
            ;
    }
    //Handled from ajax request
    public function commentArticle($articleId, Request $request){
        $validator = Validator::make($request->all(), [
            'comment' => 'required|string|min:5|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors()
            );
        }
        $article    =   Article::find($articleId);
        $user   =   Auth::user();
        if(!$user){
            return response()->json(
                ['message'   =>  'Only registered users can comment!']
            );
        }
        if(!$article){
            return response()->json(
                ['message'   =>  'No such article found!']
            );
        }

        $comment    =   new Comment();
        $comment    ->  description =   $request->comment;
        $comment    ->  article_id =   $articleId;
        $comment    ->  user_id =   $user   ->  id;
        $comment    ->  save();

        return response()->json(
            ['message'   =>  'Thank you for sharing your thoughts with us!']
        );

    }
}