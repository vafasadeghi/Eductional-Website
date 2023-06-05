@section('title','ثبت نام')


<div>
    <div id="main">
        <div class="col-lg-4 col-md-6 col-xs-12 mx-auto">
            <div class="account-box">
                <a href="{{ route('home')}}" class="logo-account"><img src="{{ asset('home/images/logo-no-background.jpg')}}"></a>
                <span class="account-head-line" style="text-align: center">ثبت نام  </span>
                <div class="content-account">
                    <hr>
                    <form  id="register" wire:submit.prevent='RegisterForm'>
                        @include('admin.section.errors')
                        <label for="name">نام و نام خانوادگی:</label>
                        <input type="text" id="name" required wire:model.defer="name" class="input-email-account" style="text-align:right">

                        <label for="phone">شماره موبایل:</label>
                        <input type="text" inputmode="numeric" required id="phone" wire:model.defer="phone" class="input-email-account" placeholder="">

                        <label for="password">رمز عبور:</label>
                        <input type="password" required id="password" wire:model.defer="password" class="input-password" placeholder="">

                        <label for="password_confirmation">تکرار رمز عبور:</label>
                        <input type="password" required id="password_confirmation" wire:model.defer="password_confirmation" class="input-password" placeholder="">

                        <div class="parent-btn">
                            <button class="dk-btn dk-btn-info" type="submit">
                                ثبت نام
                                <i class="mdi mdi-account-plus-outline sign-in"></i>
                            </button>
                        </div>
                        <div class="form-auth-row">
                            <label for="remember" class="ui-checkbox">
                                <input type="checkbox" value="1" name="login" checked="" id="remember">
                                <span class="ui-checkbox-check"></span>
                            </label>
                            <label for="remember" class="remember-me"><a href="#">حریم خصوصی</a> و <a href="#">شرایط
                                    قوانین</a>استفاده از سرویس های سایت وب لرن را مطالعه نموده و با کلیه موارد آن
                                موافقم.</label>
                        </div>
                    </form>
                </div>
                {{-- <div class="account-footer">

                    <a href="{{ route('login.google')}}" class="btn-link-register"> <span>  ثبت‌ نام با گوگل</span></a>
                </div> --}}
                <div class="account-footer">
                    <span>قبلا  ثبت‌ نام کرده‌اید؟</span>
                    <a href="{{ route ('login')}}" class="btn-link-register">وارد شویــد</a>
                </div>
            </div>
        </div>
    </div>
</div>

