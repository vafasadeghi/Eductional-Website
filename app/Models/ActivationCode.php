<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\String_;
use Illuminate\Support;

class ActivationCode extends Model
{
    use HasFactory;
    protected $fillable = ['user_id' , 'code' , 'used' , 'expire'];

    public function scopeCreateCode($query , $user)
    {
        $user->activationCode()->delete();
        $code = $this->code();

        return $query->create([
            'user_id' => $user->id,
            'code' => $code,

            'expire' => Carbon::now()->addMinutes(10)
        ]);
    }
    public function scopeVerifyCode($query,$code,$user)
    {
        return !! $user->activationCode()->whereCode($code)->where('expire' , '>=' , Carbon::now() )->latest()->first();

    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    private function code()
    {
        do {
            $code = mt_rand(100000, 999999);
            $check_code = static::whereCode($code)->get();
        } while( ! $check_code->isEmpty() );

        return $code;
    }
}
