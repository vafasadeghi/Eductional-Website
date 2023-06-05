<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Episode extends Model
{
    use HasFactory;
    protected $fillable=[ 'course_id','type','title','description','videoUrl','tags','time','number','viewCount','commentCount','downloadCount'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function path()
    {
        return "/course/{$this->course->slug}/episode/{$this->number}";
    }
    
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }

    public function download()
    {
        if(! auth()->check()) return "#";

        $statuse = false;

        switch ($this->type ){
            case 'free':
                $statuse = true;
                break;
            case  'vip':
                if (user()->isActive()) $statuse = true;
                break;
            case  'cash':
                if (user()->checklearning($this->course)) $statuse = true;
                break;

                    }
        $timestamp = Carbon::now()->addHour(5);
         $hash = Hash::make('askyjhdjh!@@#fldlkf$%^dlfkl15f' . $this->id .request()->ip().$timestamp);

        return $statuse ? "/download/$this->id?mac=$hash&t=$timestamp" : "#";



    }



}
