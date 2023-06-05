@section('title',',فراموشی رمز عبور')
<div>
    <div id="main">
        <div class="col-lg-4 col-md-6 col-xs-12 mx-auto">
            <div class="account-box">
                <a href="{{ route('home')}}" class="logo-account"><img src="{{ asset('home/images/logo-no-background.jpg')}}" ></a>
                <span class="account-head-line" style="text-align: center">فراموشی رمز عبور</span>
                <div class="content-account">
                    <form wire:submit.prevent='ForgetForm' id="login">

                        <label for="phone">شماره موبایل    </label>

                        <input type="text" id="phone" wire:model.defer="phone" class="input-email-account" placeholder="">

                        <div class="parent-btn">
                            <button type="submit" class="dk-btn dk-btn-info">
                                ارسال کد تاییدیه
                                <i class="fa fa-sign-in sign-in"></i>
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
