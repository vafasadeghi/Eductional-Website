<?php

namespace App\Http\Livewire\Home\Users;


use Carbon\Carbon;
use App\Models\Home\Token;
use Livewire\Component;
use App\Models\User;
// use App\Rules\Recaptcha;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class Login extends Component
{
    public User $user;
    public  $phone, $password;

    public function mount()
    {
        $this->user = new User;
    }

    protected $rules = [

        'phone'    => 'required|ir_mobile',
        'password'    => 'required',

    ];


    public function loginForm()
    {

        $this->validate();

        $user = User::where('phone', $this->phone)->first();

        if (isset($user)) {
            if ($user->phone_verified_at == null) {
                $code = random_int(1000, 9999);
                if (isset($user->token->expired_at)) {
                    if ($user->token->expired_at > Carbon::now()) {
                        Token::tokenCreate($user->id, $code, 'verify');
                        user::sendSms($code, $user->phone);
                    }
                } else {
                    Token::tokenCreate($user->id, $code, 'verify');
                    user::sendSms($code, $user->phone);
                }

                return redirect(route('verify.mobile', $user->id));
            } elseif (Hash::check($this->password, $user->password)) {
                Auth::loginUsingId($user->id);
                //TODO
                //Roledetection
                return redirect(route('user.panel'));
            } else {
                $this->emit('toast', 'error', '!    اطلاعات ورود نادرست است!  ');
            }
        } else {

            $this->emit('toast', 'error', '!شما در سایت ثبت نام نکرده اید');
        }
    }

    public function render()
    {
        return view('livewire.home.users.login')->layout('layouts.auth');
    }
}
