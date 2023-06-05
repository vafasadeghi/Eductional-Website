<?php

namespace App\Http\Controllers;

use App\Jobs\sendMail;
use App\Models\Article;
use App\Models\Course;
use App\Models\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {


        SEOMeta::setTitle('وب سایت وب لرن');

        SEOMeta::setDescription('  آموزش تخصصصی  لاراول  با جدید ترین ورژن فعلی لاراول9  ');

        //        cache()->pull('articles');
        //        cache()->pull('courses');
        if (cache()->has('articles')) {
            $articles = cache('articles');
        } else {
            $articles = Article::latest()->take(8)->get();
            cache(['articles' => $articles], Carbon::now()->addMinutes(10));
        }

        if (cache()->has('courses')) {
            $courses = cache('courses');
        } else {
            $courses = Course::latest()->take(4)->get();
            cache(['courses' => $courses], Carbon::now()->addMinutes(10));
        }

        $articles = Article::latest()->take(6)->get();
        $courses = Course::latest()->take(8)->get();

        return view('Home.index', compact('articles', 'courses'));
    }

    public function allArticles()
    {


        SEOMeta::setTitle('وب سایت وب لرن');

        SEOMeta::setDescription('  آموزش تخصصصی  لاراول  با جدید ترین ورژن فعلی لاراول9  ');

        //        cache()->pull('articles');

        if (cache()->has('articles')) {
            $articles = cache('articles');
        } else {
            $articles = Article::latest()->take(8)->get();
            cache(['articles' => $articles], Carbon::now()->addMinutes(10));
        }


        $articles = Article::latest()->take(6)->get();
        return view('Home.all-articles', compact('articles'));
    }

    public function allCourses()
    {


        SEOMeta::setTitle('وب سایت وب لرن');

        SEOMeta::setDescription('  آموزش تخصصصی  لاراول  با جدید ترین ورژن فعلی لاراول9  ');

        //        cache()->pull('courses');
        if (cache()->has('courses')) {
            $courses = cache('courses');
        } else {
            $courses = Course::latest()->take(4)->get();
            cache(['courses' => $courses], Carbon::now()->addMinutes(10));
        }


        $courses = Course::latest()->take(8)->get();

        return view('Home.all-courses', compact('courses'));
    }

    public function abouteMe()
    {
        return view('Home.abouteme');
    }

    public function comment()
    {
        $this->validate(request(), [
            'comment' => 'required',
        ]);
        auth()->user()->comments()->create(\request()->all());
        return back();
    }

    public function search()
    {
        $keyword = request('search');
        $articles = Article::search($keyword)->latest()->get();
        return view('Home.search', compact('articles'));
    }

    public function logout()
    {
        Auth::logout();
        alert()->success('شما از حساب کاربری خود خارج شدید.')->persistent('خیلی خوب');

        return redirect(route('home'));
    }
}
