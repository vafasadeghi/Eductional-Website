@extends('Home.master')

@section('content')


    <div class="container">
        <div class="jumbotron">
            <h1> پنل کاربری</h1>
            <p> شما در اینجا می توانید اطلاعات کاربری خود را مشاهده و یا ویرایش کنید. </p>
        </div>

    </div>


<ui class="nav nav-tabs">
    <li role="presentation" class="{{Route::currentRouteName() == 'user.panel' ? 'active' : '' }}"> <a href="{{route('user.panel')}}"> اطلاعات کاربری</a></li>
    <li role="presentation" class="{{Route::currentRouteName() == 'user.panel.history' ? 'active' : '' }}"> <a href="{{route('user.panel.history')}}"> پرداخت های انجام شده</a></li>
    <li role="presentation"  class="{{Route::currentRouteName() == 'user.panel.vip' ? 'active' : '' }}"> <a href="{{route('user.panel.vip')}}"> vip شارژ  </a></li>
</ui>

    {{$slot}}
@endsection
