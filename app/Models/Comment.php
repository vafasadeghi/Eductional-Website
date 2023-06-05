<?php

namespace App\Models;

use App\Models\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'parent_id',
        'comment',
        'approved',
        'commentable_id',
        'commentable_type'
    ];
    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class , 'parent_id' , 'id');
    }


    public function setCommentAttribute($value)
    {
        $this->attributes['comment'] = str_replace(PHP_EOL , "<br>" , $value);
    }

//    تبدیل تاریخ میلادی به شمسی

    public function getCreatedAtAttribute($created_at){
        $v1 = new Verta($created_at);
//        $v1 = $v1->format('Y-n-j H:i ');
        return $v1;
    }
    public function getUpdatedAtAttribute($updated_at)
    {
        $v2 = new Verta($updated_at);
        $v2 = $v2->format('i:H j/n/Y  ');
        return $v2;
    }
}
