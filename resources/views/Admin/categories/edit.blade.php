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
           <h2>ویرایش دسته بندی</h2>

       </div>
        <form  class="form-horizontal" action="{{route('categories.update',['category'=>$category->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @include('admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                <label for="name" class="control-label"> عنوان دسته بندی</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="لطفانام دسته بندی را وارد کنید" value="{{ $category->name }}" >
            </div>
            </div>

                <div class="form-group">
                   <div class="col-sm-6">
                       <label for="tags" class="control-label"> اسلاگ</label>
                       <input type="text" class="form-control" name="slug" id="slug" placeholder="اسلاگ را وارد کنید" value="{{ $category->slug}}" >

               </div>
            </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn-danger" > ویرایش</button>


                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>

        </form>
    </div>
@endsection
