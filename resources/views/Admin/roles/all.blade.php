@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


       <div class="page-header head-section">
           <h2>مقام ها</h2>
           <div class="btn-group">
  <a href="{{route('roles.create')}}" class="btn btn-sm btn-danger"> ایجاد مقام</a>
  <a href="{{route('permissions.index')}}" class="btn btn-sm btn-success"> بخش دسترسی ها</a>

           </div>
       </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered"  >
                <thead >
                <tr>
                    <th>نام مقام</th>
                    <th>توضیح مقام</th>
                   <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->name}}</a></td>
                    <td>{{$role->description}}</td>
                    <td>0</td>
                    <td>
                        <form action="{{ route('roles.destroy',['role'=>$role->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('آیا از حذف محصول مورد نظر اطمینان دارید؟')" class="alert-danger">حذف</button>
                            <a class="d-lg-flex" href="{{ route('roles.edit',['role'=>$role->id])}}" class="btn-primary">ویرایش</a>

                        </form>

                    </td>
                </tr>
            @endforeach

                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $roles->render() !!}
        </div>
    </div>
@endsection
