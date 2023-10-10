<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 以下の1行を追記することで、Profile Modelが扱えるようになる
use App\Models\Profile;


class ProfileController extends Controller
{
    // 以下を追記 
    public function add()
    {
        return view('admin.profile.create');
    }
    
    

    public function create(Request $request)
    {
         // 以下を追記
        // Validationを行う
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();

      
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
      
        // データベースに保存する
        $news->fill($form);
        $news->save();
        return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
    
    

       
}
