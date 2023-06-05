@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


       <div class="page-header head-section">
           <h2>دوره ها</h2>
           <div class="btn-group">
               <a href="{{route('courses.create')}}" class="btn btn-sm btn-primary"> ایجاد دوره جدید</a>
               <a href="{{route('episodes.index')}}" class="btn btn-sm btn-danger"> بخش ویدیو ها</a>

           </div>
       </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered"  >
                <thead >
                <tr>
                    <th>عنوان مقاله</th>
                    <th>تعداد نظرات</th>
                    <th>مقدار بازدید</th>
                    <th>تعداد شرکت کننده</th>
                    <th>وضعیت دوره</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
            @foreach($courses as $course)
                <tr>
                    <td><a href="{{$course->path()}}">{{$course->title}}</a></td>
                    <td>{{$course->commentCount}}</td>
                    <td>{{$course->viewCount}}</td>
                    <td>1</td>
                    <td>
                        @if($course->type== 'free')
                            رایگان
                        @elseif($course->type== 'vip')
                            اعضای ویژه
                            @else
                                نقدی
                        @endif
                    </td>

                    <td>
                        <form action="{{ route('courses.destroy',['course'=>$course->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('آیا از حذف محصول مورد نظر اطمینان دارید؟')" class="alert-danger">حذف</button>
                            <a class="d-lg-flex" href="{{ route('courses.edit',['course'=>$course->id])}}" class="btn-primary">ویرایش</a>

                        </form>
                    </td>
                </tr>
            @endforeach

                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $courses->render() !!}
        </div>
    </div>
@endsection
