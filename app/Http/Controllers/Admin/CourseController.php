<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\course;
use Illuminate\Http\Request;
use App\Models\User;
class CourseController extends  AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->paginate(20);
        return view('Admin.course.all',compact('courses'));

    }


    public function create()
    {
        return view('Admin.course.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CourseRequest|Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {

        $imagesUrl = $this->uploadImages($request->file('images'));
        auth()->user()->course()->create(array_merge($request->all() , [ 'images' => $imagesUrl]));
        alert()->success('دوره  با موفقیت ایجاد  شد','متن پیام')->persistent('خیلی خوب');

        return redirect(route('courses.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(course $course)
    {
        return  view('Admin.course.edit',compact('course'));
        alert()->success('دوره با موفقیت ویرایش  شد','متن پیام')->persistent('خیلی خوب');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, course $course)
    {
        $file = $request->file('images');
        $inputs = $request->all();
        if($file){
            $inputs['images'] = $this->uploadImages($request->file('images'));
        }else{
            $inputs['images'] = $course->images;
            $inputs['images']['thumb']=$inputs['imagesThumb'];

        }

        unset($inputs['imagesThumb']);
        $course->update($inputs);
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(course $course)
    {
        $course->delete();
        alert()->success('دوره با موفقیت ویرایش  شد','متن پیام')->persistent('خیلی خوب');

        return back();
    }
}
