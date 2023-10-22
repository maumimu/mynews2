@extends('layouts.front')

@section('content')
    <div class="container">
       <div class="row"> 
            <h2>プロフィール一覧</h2>
        </div>
        <div class="row">
            <div class="list-profile col-md-12 mx-auto">
                <form action="{{ route('profile.index') }}" method="get">
                    <div class="row">
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th width="10%">ID</th>
                                    <th width="20%">氏名</th>
                                    <th width="10%">性別</th>
                                    <th width="20%">趣味</th>
                                    <th width="30%">自己紹介欄</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $profile)
                                    <tr>
                                        <th>{{ $profile->id }}</th>
                                        <td>{{ Str::limit($profile->name, 60) }}</td>
                                        <td>{{ Str::limit($profile->gender, 10) }}</td>
                                        <td>{{ Str::limit($profile->hobby, 100) }}</td>
                                        <td>{{ Str::limit($profile->introduction, 250) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection