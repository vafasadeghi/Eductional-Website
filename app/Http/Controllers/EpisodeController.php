<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class EpisodeController extends Controller
{
    public function single(Episode $episode,Course $course)
    {


        $comments = $episode->comments()->where('approved' , 1)->where('parent_id', 0)->latest()->with(['comments' => function($query) {
            $query->where('approved' , 1)->latest();
        }])->get();
//        Redis::incr("views.{$article->id}.articles");
      
        return view('Home.vedeo' , compact('episode' ,'comments','course'));
    }
}
