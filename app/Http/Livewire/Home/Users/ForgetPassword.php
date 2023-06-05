<?php

namespace App\Http\Livewire\Home\Users;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Home\Token;

class ForgetPassword extends Component
{
    public User $user;
    public  $phone;

    public function mount()
    {
        $this->user = new User;
    }

    protected $rules = [

        'phone'    => 'required|ir_mobile',

    ];

    public function ForgetForm()
    {
        $code = random_int(1000,9999);
        $this->validate();
        $userExist = User::wherePhone($this->phone)->first();
        if($userExist)
        {
            Token::tokenCreate($userExist->id, $code, 'verify');
            user::sendSms($code,$userExist->phone);
            return redirect(route('verify.forget.password',$userExist->id));

        }else
        {
               $this->emit('toast','error','!کاربری با این شما ثبت نام نکرده است');
        }


    }
    public function render()
    {
        return view('livewire.home.users.forget-password')->layout('layouts.auth');
    }
}
