<?php

namespace App\Http\Livewire\Home\Users;

use App\Models\User;
use Livewire\Component;
use App\Models\Home\Token;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ForgetVerifyPassword extends Component
{
    public $user,$token,$code;

    protected $rules = [

        'code'    => 'required',

    ];

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
        $this->token = Token::where('user_id', $id)->latest()->first();
    }
    public function verifyCode()
    {
        $this->validate();
        if ($this->token->code == $this->code) {
            if ($this->token->expired_at > Carbon::now()) {
                $this->user->update([
                    'phone_verified_at' => now()
                ]);
              
                //TODO
                return redirect(route('change.password',$this->token->code));
            } else {
                //TODO
                //show button repeat send sms
                $this->emit('toast', 'error', 'کد تائید منقضی شده است' . "<br/>" . 'بر روی دکمه ارسال مجدد کلیک کنید.');
            }
        } else {
            $this->emit('toast', 'error', 'کد تائیدیه اشتباه است!');
        }
    }

    public function resendSms($id)
    {
        $user = User::find($id);
        $code = random_int(1000,9999);
        Token::tokenCreate($user->id, $code, 'resendSmsVerify');
        user::sendSms($code,$user->phone);
        $this->token->delete();
        return $this->redirect(request()->header('Referer'));

    }
    public function render()
    {
        $user = $this->user;
        return view('livewire.home.users.forget-verify-password',compact('user'))->layout('layouts.auth');;
    }
}
