@extends('layouts.comment')
@section('title', 'コメント投稿')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>コメント投稿</h2>
                 <form action="{{ route('comment.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-10 offset-1">コメントを入れてください</label>
                       
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10 offset-1">
                            <textarea class="form-control" name="text" rows="15">{{ old('text') }}</textarea>
                        </div>
                    </div>
                    
                     @csrf

                    <input type="hidden" name="news_id" value="{{ $news->id }}">
                    <input type="submit" class="btn btn-primary" value="コメントする">
                    
                </form>
            </div>
        </div>
    </div>
@endsection
        