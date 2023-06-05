@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


       <div class="page-header head-section">
           <h2>دسته بندی ها</h2>
           <a href="{{route('categories.create')}}" class="btn btn-sm btn-primary"> ایجاد دسته بندی</a>

       </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered"  >
                <thead >
                <tr>
                    <th>عنوان دسته بندی</th>
                    <th>اسلاگ</th>

                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
            @foreach($categories as $category)
                <tr>

                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>1</td>


                    <td>
                        <form action="{{ route('categories.destroy',['category'=>$category->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('آیا از حذف دسته بندی مورد نظر اطمینان دارید؟')" class="alert-danger">حذف</button>
                            <a class="d-lg-flex" href="{{ route('categories.edit',['category'=>$category->id])}}" class="btn-primary">ویرایش</a>

                        </form>
                    </td>
                </tr>
            @endforeach

                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $categories->render() !!}
        </div>
    </div>
@endsection
