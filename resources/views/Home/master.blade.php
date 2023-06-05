<!DOCTYPE html>
<html lang="fa">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {!! SEO::generate() !!}
    <link rel="icon" href="{{ asset('admin/img/bg-img/logo.png') }}">
    <link href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    {{--    <title>وبسایت وب لرن</title> --}}

    <!-- Bootstrap Core CSS -->
    <link href="/css/home.css" rel="stylesheet">
    <link type="application/rss+xml" title="فید مقالات وبلرن" rel="alternate" href="/feed/articles">
</head>

<body>

    <!-- Navigation -->

    <nav style="background-color:#ff6600" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div id="trapezoid">
                    <a href="/"> <img src="{{ asset('home/images/logo-no-background.jpg') }}" alt="logo"></a>

                    <a style="color:#2af106" class="navbar-brand" href="/">وبسایت وب لرن</a>
                </div>


            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (auth()->check())
                        <li>
                            <a href="{{ route('user.panel') }}">پنل کاربری</a>
                        </li>
                        <li>
                            <a href="{{route('allCourses')}}">دوره‌ها</a>
                        </li>
                        <li>
                            <a href="/allarticles">مقالات</a>
                        </li>
                        <li>
                            <a href="/abouteme">درباره‌ما</a>
                        </li>

                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <div class="btn-group">
                                    <button style="margin:20px " type="submit" class="button">خروج از سایت</button>
                                </div>
                            </form>
                        @else
                        <li>
                            <a href="/allarticles">مقالات</a>
                        </li>

                        <li>
                            <a href="{{route('allCourses')}}">دوره ها/a>
                        </li>
                        <li>
                            <a href="/abouteme">درباره‌ما</a>
                        </li>

                        <li>
                            <div class="btn-group">
                                <a href="/login"> <button class="button"><i style="margin-left: 25px"
                                            class="fas fa-user"></i>ورود/عضویت</button></a>


                            </div>
                        </li>
                    @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    {{-- <!-- Nav2 -->

    <div id="navbar-animmenu">

        <ul class="show-dropdown main-navbar">

             <li>
                <a href="/"> صفحه ی اصلی</a>
            </li>

            <li>
                <a href="#">دوره های آموزشی</a>
            </li>
            <li>
                <a href="#">مقالات</a>
            </li>
            <li>
                <a href="#">درباره ی ما</a>
            </li>
            <li>
                <a href="/"> <img src="{{ asset('home/images/logo-no-background.jpg') }}" alt="logo"></a>

            </li>
        </ul>
    </div> --}}
    <!-- Page Content -->
    <div id="app" class="container">

        <div class="row">
            @yield('content')
        </div>

    </div>
    <!-- /.container -->

    <div class="container">
        <hr>
        <!-- Footer -->
        <footer>
            <div class="footer-jump col-lg-2">
                <a href="#">
                    <span class="footer-jump-angle"><i class="fa fa-angle-up"></i> برگشت به بالا </span>
                </a>
            </div>

            <div class="col-lg-3">
                <div style="font-size:1.25em">
                    <h4 style="color: #6363da">
                        اطلاعات موسسه :
                    </h4>
                    <p style="color:#337ab7">
                        استان فارس-شهرستان گله دار-کارگاه سایت ساز صادقی
                    </p>
                    <h4 >
                        درباره ی ما: وب سایت وب لرن یک وب سایت تازه تاسیس هست که به شما علاقه مندان در حوزه ی سایت سازی کمک می کنه.
                    <h5>
                </div>
            </div>

            <div class="col-lg-2">
                <div style="font-size:1.25em">

                    <h4 style="color: #6363da"> دسترسی سریع
                    </h4>
                    <ul>
                        <li>
                            <a style="font-size:17px" href="/">صفحه ی اصلی</a>
                        </li>
                        <li>
                            <a style="font-size:17px" href="#"> دوره های سایت</a>
                        </li>
                        <li>
                            <h5>تماس با ما:۰۹۳۸۹۳۷۶۳۹۵</h5>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2" id="naghshe">
                <a href="#">
                    نقشه راه یادگیری
                </a>
                <a href="#">
                    قوانین سایت
                </a>
                <br>

            </div>


            <div class="footer-social">
                <span class="newslitter-form-social">شبکه های احتماعی</span>
                <div class="social-links">
                    <a  href="https://instagram.com/weblearn_sadeghi">
                        <i class='fa fa-instagram' style='color: red'></i></a>
                    <a href="https://t.me/weblearnacademi/weblearnacademi"><i
                            class="fa fa-telegram"></i></a>

                </div>

            </div>
            <div class="col-lg-12">
            <div class="copy-right-footer">
                <p style="text-align: center">
                    -----------------------copyRight@------------------------
                </p>
            </div>
    </div>
    </div>
    <br>
    <br>
    <br>
    <br>

    </footer>

    </div>
    <!-- /.container -->



    <script src="/js/app.js"></script>

</body>

</html>
