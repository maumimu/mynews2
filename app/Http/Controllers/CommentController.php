<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\Comment;

class CommentController extends Controller
{
     public function add($news_id)
    {
        $news = News::find($news_id);
        return view('comment.create', ['news' => $news]);
    }
    
    public function create($news_id, Request $request)
    {
         // Validationを行う
        $this->validate($request, Comment::$rules);

         
        $comment = new Comment;
        
       
        $form = $request->all();

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

         // データベースに保存する
         $comment->fill($form);
         $comment->save();
         
     
         $news = News::find($news_id);
        return redirect()->route('news_detail', ['id' => $news_id]);
    }

    public function index(Request $request)
    {
        $comment = Comment::all();

       

        // news/index.blade.php ファイルを渡している
        // また View テンプレートに headline、 posts、という変数を渡している
        return view('news.show',['comment' => $comment]);
        
    }

    public function store(Request $request, News $news)
    {
        $comment = new Comment();
        $comment->news_id = $news->id;
        $comment->body = $request->body;
        $comment->save();

        return redirect()
            ->route('news_detail', $news);
    }
    



   

    
}
