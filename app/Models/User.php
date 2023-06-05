<?php

namespace App\Models;

use App\Models\Home\Token;
use Carbon\Carbon;
use Ghasedak\GhasedakApi;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Ghasedak\Laravel\GhasedakFacade;

class User extends Authenticatable
{
    use  HasFactory, Notifiable,HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'phone', 'password','email','active' , 'api_token','viptime','phone_verified_at'

    ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'phone_verified_at' => 'datetime',
    ];

    public  function  isActive(){
        return $this->vipTime > Carbon::now() ? true : false;
    }

    public function article()
    {
        return $this->hasMany(Article::class);
    }
    public function course()
    {
        return $this->hasMany(Course::class);
    }
    public function payments(){

        return $this->hasMany(Payment::class);
    }


    public function isAdmin()
    {
        return $this->level == 'admin' ? true : false;
  }
  public function tokens()
  {
      return $this->belongsToMany(Token::class);
  }

    public static function sendSms($code,$phone)
    {
        $response = \Ghasedak\Laravel\GhasedakFacade::setVerifyType(\Ghasedak\Laravel\GhasedakFacade::VERIFY_MESSAGE_TEXT)
        ->Verify(
            $phone,  // receptor
            "weblearnaca",  // name of the template which you've created in you account
            $code,       // parameters (supporting up to 10 parameters)

        );
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function checkLearning($course)
    {
        return !! Learning::where('user_id' , $this->id)->where('course_id' , $course->id)->first();
    }}
