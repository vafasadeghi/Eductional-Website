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
           <h2>ایجاد مقاله</h2>

       </div>
        <form  class="form-horizontal" action="{{route('articles.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                <label for="title" class="control-label"> عنوان مقاله</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="لطفا عنوان را وارد کنید" value="{{ old('title') }}" >
            </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                <label for="title" class="control-label"> توضیح کوتاه </label>
                    <textarea rows="5" class="form-control" name="description" id="description" placeholder="لطفا توضیح کوتاه را وارد کنید" >{{ old('description') }}</textarea>
            </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                <label for="title" class="control-label"> متن </label>
                <textarea rows="5" class="form-control" name="body" id="body" placeholder="متن مقاله  را وارد کنید"  >{{ old('body') }}</textarea>
            </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <label for="images" class="control-label"> تصویر اصلی </label>
                    <input type="file" class="form-control" name="images" id="images" placeholder="تصویر اصلی  را وارد کنید" value="{{ old('images') }}" >


                </div>
            <div class="form-group">
                   <div class="col-sm-6">
                       <label for="tags" class="control-label"> تگ ها </label>
                       <input type="text" class="form-control" name="tags" id="tags" placeholder="تگ ها  را وارد کنید" value="{{ old('tags') }}" >

               </div>
            </div>


                <div class="form-group d-flex flex-row-reverse">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <label for="permission_id" class="control-label">دسته بندی</label>
                        <select data-placeholder="انتخاب کنید..." data-tags="true" data-allow-clear="true"
                                class="form-control select2" name="category_id[]" id="category_id" multiple="multiple">
                            @foreach (\App\Models\Category::get() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn-danger" > ارسال</button>

                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
