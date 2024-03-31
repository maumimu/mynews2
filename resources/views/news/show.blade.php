@extends('layouts.front')
@section('title', 'ニュース詳細画面')


@section('content')
    <div class="container">
   
        
        
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
            
                <div class="post">
                    <div class="row">
                        <div class="text col-md-6">
                            <div class="date">
                                    {{ $news->updated_at->format('Y年m月d日') }}
                            </div>
                             
                            
                            <div class="title">
                                <a href="{{ route('news_detail', $news->id)}}">{{ Str::limit($news->title, 150) }}</a>
                            </div>
                            <div class="body mt-3">
                                {{ Str::limit($news->body, 1500) }}
                            </div>
                        </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($news->image_path)
                                    <img src="{{ asset('storage/image/' . $news->image_path) }}">
                                @endif
                            </div>
                            <div class="col-md-4">
                                 <a href="{{ route('comment.create', $news->id) }}" role="button" class="btn btn-primary ms-auto">コメントする</a>
                            </div>
                            <!-- <button type="button" class="btn btn-primary mb-2 mt-3">コメントする</button> -->
                    </div>
                </div>
                
            <div class="comments col-md-8 mx-auto mt-3">
                <div class="comments">
                    <div class="row">
                        <div class="text-start col-md-6">
                            <h4>コメント</h4>
                                <ul>
                                    @foreach ($news->comments as $comment)
                                        <li>
                                            {{ $comment->body }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                    
                            
                               
                            
                            
                        
            </div>
                 

                            

                           
                               
                           
                       
                       
                
            
        </div>         
              
               
            
       

                        
                        
                            
    </div> 
            
            

@endsection