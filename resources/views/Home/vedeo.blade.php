
@extends('Home.master')


@section('content')
    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

        <!-- Blog Post -->
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!-- Title -->
        <h1>{{ $episode->title }}</h1>

        <!-- Author -->


        <hr>


        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> ارسال شده در ۱۲ خرداد ۹۶</p>

        <hr>

        <!-- Post Content -->
        <div id="content">
            {!! $episode->tittle !!}
        </div>

        @if (auth()->check())
            @if ($course->type == 'vip')
                @if (!user()->isActive())
                    <div class="alert alert-danger" role="alert">برای مشاهده تمامی قسمت ها باید عضویت ویژه تهیه کنید</div>
                @endif
            @elseif($course->type == 'cash')
                @if (!user()->checkLearning($course))
                    <div class="alert alert-danger" role="alert">برای مشاهده تمامی قسمت ها باید این دوره را خریداری کنید
                    </div>
                @endif
            @endif
        @else
            <div class="alert alert-danger" role="alert">برای مشاهده این دوره نیاز است ابتدا وارد سایت شوید</div>
        @endif

        <h3>قسمت های دوره</h3>
        <table class="table table-condensed table-bordered">
            <thead>
                <tr>
                    <th>شماره قسمت</th>
                    <th>عنوان قسمت</th>
                    <th>زمان قسمت</th>
                    <th> نمایش</th>
                    <th>دانلود</th>
                </tr>
            </thead>
            <tbody>

                    <tr>
                        <th>{{ $episode->number }}</th>
                        <td>{{ $episode->title }}</td>
                        <td>{{ $episode->time }}</td>

                        <td>
                            <video id="my-video" class="video-js" controls preload="auto" width="840" height="264"
                                poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                                <source src="{{ $episode->download() }}" type='video/mp4'>
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a web browser
                                    that
                                    <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                        video</a>
                            </video>

                        </td>
                        <td>
                            <a href="{{ $episode->download() }}"><span class="glyphicon glyphicon-download-alt"
                                    aria-hidden="true"></span></a>
                        </td>

                    </tr>

            </tbody>
        </table>
        <!-- Blog Comments -->

        @include('Home.layouts.comment', ['comments' => $comments, 'subject' => $episode])



    </div>





@endsection
