@extends('Admin.master')

@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


       <div class="page-header head-section">
           <h2>مقالات</h2>
           <a href="{{route('articles.create')}}" class="btn btn-sm btn-primary"> ارسال مقاله</a>
       </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered"  >
                <thead >
                <tr>
                    <th>عنوان مقاله</th>
                    <th>تعداد نظرات</th>
                    <th>مربوط به دسته بندی </th>
                    <th>مقدار بازدید</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @php()
                $categories = Categories::all();
                @endphp
            @foreach($articles as $article)
                <tr>
                    <td><a href="{{$article->path()}}">{{$article->title}}</a></td>
                    <td>{{$article->commentCount}}</td>
                    <td>
                        @foreach($article->categories as $category)

                              <li> {{ $category->name }} </li>
                        @endforeach
                    </td>
                    <td>{{$article->viewCount}}</td>
                    <td>1</td>


                    <td>
                        <form action="{{ route('articles.destroy',['article'=>$article->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('آیا از حذف محصول مورد نظر اطمینان دارید؟')" class="alert-danger">حذف</button>
                            <a class="d-lg-flex" href="{{ route('articles.edit',['article'=>$article->id])}}" class="btn-primary">ویرایش</a>

                        </form>
                    </td>
                </tr>
            @endforeach

                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $articles->render() !!}
        </div>
    </div>
@endsection
