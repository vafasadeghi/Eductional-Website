@extends('Admin.master')
@section('script')


@endsection
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


       <div class="page-header head-section">
           <h2>ایجاد کاربر</h2>

       </div>
        <form  class="form-horizontal" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                <label for="title" class="control-label"> نام مقام</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="لطفانام مقام را وارد کنید" value="{{ old('title') }}" >
            </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                <label for="title" class="control-label"> توضیح کوتاه </label>
                <textarea rows="5" class="form-control" name="description" id="description" placeholder="توضیح کوتاه را وارد کنید"  >{{ old('description') }}</textarea>
            </div>
            </div>

    <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn-danger" > ارسال</button>

                    </div>
                </div>


        </form>
    </div>

@endsection
