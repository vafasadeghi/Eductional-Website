@extends('Home.master')


@section('content')
    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->

        <!-- Title -->
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1>{{ $article->title }}</h1>

        <!-- Author -->
        <p class="lead">
            توسط <a href="#">{{ $article->user->name }}</a>
        </p>



        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span>:  ارسال شده در {{ $article->created_at }}</p>


        <!-- Preview Image -->
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">

        <hr>

        <!-- Post Content -->
        <div id="content">
            {!! $article->body !!}
        </div>

        <hr>

        <!-- Blog Comments -->

        @include('Home.layouts.comment' , ['comments' => $comments , 'subject' => $article])

    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Blog Search Well -->
        <div class="well">
            <h4>جستجو در سایت</h4>
            <div class="input-group">
               <form action="/search" method="get">

                   <input type="text" name="search" class="form-control">
                   <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>

               </form>
            </div>
            <!-- /.input-group -->
        </div>

        <!-- Side Widget Well -->
        <div class="well">
            <h4>دیوار</h4>
            <p>طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد.</p>
        </div>

    </div>


@endsection
