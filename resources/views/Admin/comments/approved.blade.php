@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


       <div class="page-header head-section">
           <h2> همه ی نظرات</h2>
       </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered"  >
                <thead >
                <tr>
                    <th>نام کاربر  </th>
                    <th>متن کامنت</th>
                    <th>پست مربوطه</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->user->name }}</td>
                    <td>{{$comment->comment}}</td>
                    <td><a href="{{ $comment->commentable->path() }}"> {{$comment->commentable->title}}</a></td>


                    <td>
                       <div style="display: flex">
                           <form action="{{ route('comments.destroy',['comment'=>$comment->id]) }}" method="post">
                               @csrf
                               @method('delete')
                               <button type="submit" onclick="return confirm('آیا از حذف نظر مورد نظر اطمینان دارید؟')" class="alert-danger">حذف</button>

                           </form>
                           <form action="{{ route('comments.update',['comment'=>$comment->id]) }}" method="post">
                               @csrf
                               @method('Patch')
                               <button style="margin-right: 5px" type="submit" onclick="return confirm('آیا از تایید نظر مورد نظر اطمینان دارید؟')" class="alert-success">تایید</button>

                           </form>
                       </div>
                    </td>
                </tr>
            @endforeach

                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $comments->render() !!}
        </div>
    </div>
@endsection
