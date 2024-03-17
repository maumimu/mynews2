<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


// 追記
use App\Models\News;
use App\Models\Comment;



class NewsController extends Controller
{
     public function index(Request $request)
    {
        $posts = News::all()->sortByDesc('updated_at');

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        $comment = Comment::all();

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('news.index', ['headline' => $headline, 'posts' => $posts, 'comment' => $comment]);
    }

    


    public function show(Request $request){
        $news = News::find($request->id);
        if (empty($news)) {
            abort(404);
        }

        
        return view('news.show', ['news' => $news]);
        
        }
        
       
        
        
    } 

