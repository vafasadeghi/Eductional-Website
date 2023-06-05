<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">وبسایت آموزشی وب لرن</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">

            <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
            </form>

            <div class="navbar-left btn-group">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-warning" style="margin: 15px">خروج از پنل مدیریت</button>

                </form>

            </div>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">

            <ul class="nav nav-sidebar">
                <li class="active"><a href="/admin/panel">پنل اصلی</a></li>
                @can('acsessToArticle')
                <li><a href="/admin/articles">مقاله ها</a></li>
                @endcan

                @can('acsessToEpisode')
                <li><a href="/admin/courses">دوره ها</a></li>
                @endcan
                @can('acsessToCategories')
                <li><a href="/admin/categories">دسته بندی ها</a></li>
                @endcan
            </ul>


            @can('acsessToComments')
            <ul class="nav nav-sidebar">
                <li><a href="/admin/comments">همه نظرات<span class="badge">{{$commentApprovedCount}}</span> </a></li>
                <li><a href="/admin/comments/unapproved">نظرات تایید نشده <span class="badge">{{$commentUnapprovedCount}}</span></a></li>
                {{--<li><a href="">Another nav item</a></li>--}}
            </ul>
            @endcan()


            <ul class="nav nav-sidebar">
                <li><a href="/admin/users">کاربران <span class="badge">{{$userCount}}</span></a></li>
                @can('acsessToEpisode')
                <li><a href="/admin/payments">پرداختی های موفق <span class="badge">0</span></a></li>
                <li><a href="/admin/payments/unsuccessful">پرداختی های ناموفق <span class="badge">0</span></a></li>
            </ul>
            @endcan

        </div>
    </div>
</div>
