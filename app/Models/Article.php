<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Article extends Model
{
   
    protected $fillable = ['user_id','title','body','slug','description','images','tags','categories'];

//    protected $guarded = ['id'];
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

    public function scopeSearch($query , $keywords){
        $keywords = explode(' ',$keywords);
        foreach ($keywords as $keyword) {
            $query->whereHas('categories' , function ($query) use ($keyword){
                $query->where('name' , 'LIKE' , '%' . $keyword . '%' );
            })
                ->orWhere('title' , 'LIKE' , '%' . $keyword . '%')
                ->orWhere('tags' , 'LIKE' , '%' . $keyword . '%');
        }
        return $query;

    }

    public function path()
    {
        return "/articles/$this->slug";
    }

    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public  function categories()
    {
        return $this->belongsToMany(Category::class);
    }


}
