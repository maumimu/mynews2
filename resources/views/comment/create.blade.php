@extends('layouts.comment')
@section('title', 'コメント投稿')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>コメント投稿</h2>
                 <form action="{{ route('comment.create', $news->id) }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-10 offset-md-1">コメントを入れてください</label>
                       
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10 offset-md-1">
                            <textarea class="form-control" name="body" rows="15">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    
                     @csrf
                <div class="row">

                   
                    <div class="col-md-8 offset-md-1">
                        <input type="hidden" name="news_id" value="{{ $news->id }}">
                        <input type="submit" class="btn btn-primary" value="コメントする">
                    </div>
                    <div class="col-md-3">
                                 <a href="{{ route('news_detail', $news->id) }}" role="button" class="btn btn-primary float-end">詳細画面に戻る</a>
                    </div>
                </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
        