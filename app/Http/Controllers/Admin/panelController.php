<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\permission;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class panelController extends Controller
{
    public function index()
    {
//        auth()->loginUsingId(2);
//        return User::whereEmail('vafa@gmail')->first()->roles()->get();
//        return auth()->user()->roles()->sync(2);
//        return auth()->user();
//       return permission::create([
//            'name' => 'show-comment',
//            'description' => 'مشاهده بخش نظرات',
//        ]);
        return view('admin.panel');
    }

    public function uploadImageSubject()
    {
        $this->validate(request() , [
            'upload' => 'required|mimes:jpeg,png,bmp',
        ]);

        $year = Carbon::now()->year;
        $imagePath = "/upload/images/{$year}/";

        $file = request()->file('upload');
        $filename = $file->getClientOriginalName();

        if(file_exists(public_path($imagePath) . $filename)) {
            $filename = Carbon::now()->timestamp . $filename;
        }

        $file->move(public_path($imagePath) , $filename);
        $url = $imagePath . $filename;

        return "<script>window.parent.CKEDITOR.tools.callFunction(1 , '{$url}' , '')</script>";
    }
}
