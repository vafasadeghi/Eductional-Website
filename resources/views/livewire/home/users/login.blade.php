@section('title',',ورود')
@section('script')
<script src="https://www.google.com/recaptcha/api.js?render={{env('CAPTCHA_SITE_KEY')}}"></script>

<script>
    function handle(e) {
        grecaptcha.ready(function () {
            grecaptcha.execute('{{env('CAPTCHA_SITE_KEY')}}', {action: 'submit'})
                .then(function (token) {
                    @this.set('captcha', token);
                });
        })
    }
</script>
@endsection
<div>
    <div id="main">
        <div class="col-lg-4 col-md-6 col-xs-12 mx-auto">
            <div class="account-box">
                <a href="{{ route('home')}}" class="logo-account"><img src="{{ asset('home/images/logo-no-background.jpg')}}"></a>
                <span class="account-head-line" style="text-align: center">ورود</span>
                <div class="content-account">
                    <form wire:submit.prevent='loginForm' id="login">
                        @include('admin.section.errors')
                        <label for="phone">شماره موبایل خود را وارد کنید</label>
                        <input type="text" id="phone" wire:model.defer="phone" class="input-email-account" placeholder="">
                        <label for="password">رمز عبور</label>
                        <input type="password" id="password" wire:model.defer="password" class="input-password" placeholder="">
                        @recaptcha

                        <div class="parent-btn">

                            <button type="submit" class="dk-btn dk-btn-info"
                                data-sitekey="{{env('CAPTCHA_SITE_KEY')}}"
              data-callback='handle'
              data-action='submit'
               class="g-recaptcha some-button-style">
                                ورود
                                <i class="fa fa-sign-in sign-in"></i>
                            </button>
                            <a href="{{route('forget-password')}}" class="account-link-password">رمز خود را فراموش کرده ام</a>

                        </div>
                        <div class="form-auth-row">
                            <label for="remember" class="ui-checkbox">
                                <input type="checkbox" value="1" name="login" checked="" id="remember">
                                <span class="ui-checkbox-check"></span>
                            </label>
                            <label for="remember" class="remember-me">مرا به خاطر داشته باش</label>
                        </div>
                    </form>
                </div>

                <div class="account-footer">
                    <span>کاربر جدید هستید؟</span>
                    <a href="{{route('register')}}" class="btn-link-register">ثبت‌نام</a>

                </div>

            </div>
        </div>
    </div>
</div>


