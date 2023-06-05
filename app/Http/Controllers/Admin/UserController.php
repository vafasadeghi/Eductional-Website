<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $users = User::latest()->paginate(25);
        return view('Admin.users.all' , compact('users'));


   }
    public function destroy(User $user)
    {
       $user->delete();
        alert()->success('محصول با موفقیت حذف شد شد','متن پیام')->persistent('خیلی خوب');

        return back();
    }
}
