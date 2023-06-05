@component('Home.panel.master')
<ul style="margin: 20px">
    <div class="user-profile-area">
        <div class="user-profile-heading">
            <!-- Thumb -->
            <div class="profile-img">
                <img class="chat-img mr-2" src="{{user()->profilephoto }}" alt="">
            </div>

        </div>
        <br>
        <form action="{{ route('logout') }}" method="post">
        @csrf

            <button style="background-color: tomato" type="submit" class="dropdown-item"><i class="fa fa-sign-out profile-icon bg-danger" aria-hidden="true"></i> خروج از سیستم</button>


        </form>
    </div>
    <br>

    <div>
        <li>   نام کاربری   : {{ user()->name }} </li>
        <li>   شماره مبایل شما       :  {{ user()->phone}}</li>

            @if(user()->isActive())
            <li> زمان پایان اعتبار ویژه : {{ \Carbon\Carbon::parse(user()->viptime)->diffInDays() }} روز دیگر</li>
            @else
            <li> شما عضو ویژه نیستید </li>
        @endif
        <a href="{{route('forget-password')}}" class="dropdown-item"><i class="fa fa-key profile-icon bg-info" aria-hidden="true"></i> تغییر رمز عبور</a>

    </div>


</ul>
@endcomponent
