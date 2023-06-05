@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


       <div class="page-header head-section">
           <h2>دسترسی ها</h2>
           <div class="btn-group">
  <a href="{{route('permissions.create')}}" class="btn btn-sm btn-danger"> ایجاد دسترسی</a>

           </div>
       </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered"  >
                <thead >
                <tr>
                    <th>نام دسترسی</th>
                    <th>توضیح دسترسی</th>
                   <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
            @foreach($permissions as $permission)
                <tr>
                    <td>{{$permission->name}}</a></td>
                    <td>{{$permission->label}}</td>
                    <td>0</td>
                    <td>
                        <form action="{{ route('permissions.destroy',['permission'=>$permission->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('آیا از حذف محصول مورد نظر اطمینان دارید؟')" class="alert-danger">حذف</button>
                            <a class="d-lg-flex" href="{{ route('permissions.edit',['permission'=>$permission->id])}}" class="btn-primary">ویرایش</a>

                        </form>

                    </td>
                </tr>
            @endforeach

                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $permissions->render() !!}
        </div>
    </div>
@endsection
