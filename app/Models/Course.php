<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
class Course extends Model
{



    protected $fillable = ['user_id','type','title','slug','description','body','price','images','tags'];

    protected $casts = [
        'images' => 'array'
    ];

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function path()
    {
        return "/courses/$this->slug";
    }

    public function setBodyAttribute($value)
    {
        $this->attributes['description'] = str_contains(preg_replace('/<[^>]*>/' , '' , $value) , 200);
        $this->attributes['body'] = $value;
    }


    public function Episodes()
    {
         return $this->hasMany(Episode::class);
}


    /**
     * Get all of the post's comments.
     */

    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }

    public  function user(){
        return $this->belongsTo(User::class);
    }

}
