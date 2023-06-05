@extends('Admin.master')
@section('script')
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body' ,{
            filebrowserUploadUrl : '/admin/panel/upload-image',
            filebrowserImageUploadUrl :  '/admin/panel/upload-image'
        });
    </script>
@endsection
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


       <div class="page-header head-section">
           <h2>ایجاد دسته بندی</h2>

       </div>
        <form  class="form-horizontal" action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                <label for="name" class="control-label"> عنوان دسنه بندی</label>
                <input type="text" class="form-control" name="name" id="title" placeholder="لطفا عنوان را وارد کنید" value="{{ old('name') }}" >
            </div>
            </div>


            <div class="form-group">
                   <div class="col-sm-6">
                       <label for="slug" class="control-label"> اسلاگ </label>
                       <input type="text" class="form-control" name="slug" id="slug" placeholder="اسلاگ  را وارد کنید" value="{{ old('slug') }}" >

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
