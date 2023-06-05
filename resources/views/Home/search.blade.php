@extends('Home.master')

@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-sm-12">
            <h3 style="color: #009900">مقالات یافته شده</h3>
        </div>
        @foreach($articles as $article)
            <div class="col-sm-4 col-lg-4 col-md-4" >
                <div class="thumbnail">
                    <img src="{{$article->images['thumb']}}" alt="">
                    <div class="caption">
                        <h3><a href="{{$article->path()}}">{{$article->title}}</a></h3>
                        <p> {{Str::limit($article->description,40)}} <p>
                    </div>
                    <div class="ratings">
                        {{--                        <p class="pull-right">{{$article->viewCount}} بازدید</p>--}}
                        <p class="pull-left">{{  Redis::get("views.{$article->id}.article") }} بازدید</p>

                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection
