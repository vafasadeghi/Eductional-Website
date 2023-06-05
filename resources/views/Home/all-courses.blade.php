@extends('Home.master')

@section('content')
    <!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">

    </header>
   
    <div class="row ">
        @foreach ($courses as $course)
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{{ $course->images['thumb'] }}" alt="">
                    <div class="caption">
                        <h3><a href="{{ $course->path() }}">{{ $course->title }}</a></h3>


                        <p> {{ Str::limit($course->description, 40) }}
                        <p>
                        <p>
                            <a href="{{ $course->path() }}" class="btn btn-primary">خرید</a> <a href="{{ $course->path() }}"
                                class="btn btn-default">اطلاعات بیشتر</a>
                        </p>
                    </div>
                    <div class="ratings">
                        <p class="pull-left">{{ $course->viewCount }} بازدید</p>
                        {{--                    <p class="pull-left">{{  Redis::get("views.{$course->id}.courses") }} بازدید</p> --}}

                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <hr>


@endsection
