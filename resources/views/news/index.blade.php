@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="image">
                                    @if ($headline->image_path)
                                        <img src="{{ asset('storage/image/' . $headline->image_path) }}">
                                    @endif
                                </div>
                                <div class="title p-2">
                                    <h1><a href="{{ route('news_detail', $headline->id)}}">{{ Str::limit($headline->title, 70) }}</a></h1>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-6"> -->
                            <!-- <p class="body mx-auto">{{ Str::limit($headline->body, 650) }}</p> -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <!-- <div class="posts col-md-8 mx-auto mt-3q"> -->
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                             
                            
                                <div class="title">
                                    <a href="{{ route('news_detail', $post->id)}}">{{ Str::limit($post->title, 150) }}</a>
                                </div>
                                <!-- <div class="body mt-3"> -->
                                    <!-- {{ Str::limit($post->body, 1500) }} -->
                                <!-- </div> -->
                            </div>
                            <!-- <div class="image col-md-6 text-right mt-4"> -->
                                <!-- @if ($post->image_path) -->
                                    <!-- <img src="{{ asset('storage/image/' . $post->image_path) }}"> -->
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            <!-- </div> -->
        </div>
    </div>
    
@endsection