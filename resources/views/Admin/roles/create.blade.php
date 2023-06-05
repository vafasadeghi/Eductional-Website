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
            <h2>ایجاد مقام</h2>

        </div>
        <form  class="form-horizontal" action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="name" class="control-label">عنوان مقام</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="عنوان را وارد کنید" value="{{ old('name') }}">                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="permission_id" class="control-label">دسترسی ها</label>
                    <select class="form-control" name="permission_id[]" id="permission_id" multiple>
                        @foreach(\App\Models\Permission::latest()->get() as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }} - {{ $permission->description }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="description" class="control-label"> توضیح مقام</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="لطفا توضیح را وارد کنید" value="{{ old('description') }}" >
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
