@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


       <div class="page-header head-section">
           <h2>کاربران</h2>
           <div class="btn-group">
  <a href="{{route('roles.index')}}" class="btn btn-sm btn-primary"> سطح دسترسی</a>
  <a href="{{route('level.index')}}" class="btn btn-sm btn-success"> کاربران مدیریت</a>

           </div>
       </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered"  >
                <thead >
                <tr>
                    <th>نام کاربر</th>
                    <th>ایمیل کاربر</th>
                    <th>وضعیت ایمیل</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</a></td>
                    <td>{{$user->phone}}</td>
                    <td>
                         @if( $user->active == 1) <div style="color:limegreen">فعال <div>
                            @else  <div style="color: red"> غیر فعال<div>
                        @endif

                    </td>
                    <td>
                        <form action="{{ route('users.destroy',['user'=>$user->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('آیا از حذف محصول مورد نظر اطمینان دارید؟')" class="alert-danger">حذف</button>

                        </form>
                    </td>
                </tr>
            @endforeach

                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $users->render() !!}
        </div>
    </div>
@endsection
