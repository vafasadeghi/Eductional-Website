@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


       <div class="page-header head-section">
           <h2>ویدیو ها</h2>
           <div class="btn-group">
               <a href="{{route('episodes.create')}}" class="btn btn-sm btn-primary"> ایجاد ویدیو جدید</a>

           </div>
           <a href="{{route('episodes.create')}}" class="btn btn-sm btn-primary"> ایجاد ویدیو جدید</a>
       </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered"  >
                <thead >
                <tr>
                    <th>عنوان ویدیو</th>
                    <th>تعداد نظرات</th>
                    <th>مقدار بازدید</th>
                    <th>تعداد دانلود</th>
                    <th>وضعیت ویدیو</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
            @foreach($episodes as $episode)
                <tr>
                    <td><a href="{{$episode->path()}}">{{$episode->title}}</a></td>
                    <td>{{$episode->commentCount}}</td>
                    <td>{{$episode->viewCount}}</td>
                    <td>{{$episode->downloadCount}}</td>
                    <td>
                        @if($episode->type== 'free')
                            رایگان
                        @elseif($episode->type== 'vip')
                            اعضای ویژه
                            @else
                                نقدی
                        @endif
                    </td>

                    <td>
                        <form action="{{ route('episodes.destroy',['episode'=>$episode->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('آیا از حذف محصول مورد نظر اطمینان دارید؟')" class="alert-danger">حذف</button>
                            <a class="d-lg-flex" href="{{ route('episodes.edit',['episode'=>$episode->id])}}" class="btn-primary">ویرایش</a>

                        </form>
                    </td>
                </tr>
            @endforeach

                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $episodes->render() !!}
        </div>
    </div>
@endsection
