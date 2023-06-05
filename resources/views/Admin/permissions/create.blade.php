@extends('Admin.master')
@section('script')
    <script>
        $(document).ready(function () {
            $('#permission_id').selectpicker();
        })
    </script>
@endsection

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


        <div class="page-header head-section">
            <h2>ایجاد دسترسی</h2>

        </div>
        <form  class="form-horizontal" action="{{route('permissions.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="title" class="control-label">  نام دسترسی</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="لطفا عنوان را وارد کنید" value="{{old('name') }}" >
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-12">
                    <label for="title" class="control-label"> توضیح دسترسی</label>
                    <input type="text" class="form-control" name="label" id="label" placeholder="لطفا توضیح را وارد کنید" value="{{  old('description') }}" >
                </div>
            </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn-danger" > ایجاد</button>

                    </div>
                </div>

        </form>
    </div>
@endsection
