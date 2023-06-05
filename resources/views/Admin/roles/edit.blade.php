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
            <h2>ویرایش مقام</h2>

        </div>
        <form  class="form-horizontal" action="{{route('roles.update',['role'=> $role->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @include('admin.section.errors')
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="title" class="control-label">  نام مقام</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="لطفا عنوان را وارد کنید" value="{{ $role->name }}" >
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="permission_id" class="control-label">دسترسی ها</label>
                    <select class="form-control" name="permission_id[]" id="permission_id" multiple>
                        @foreach(\App\Models\Permission::latest()->get() as $permission)
                            <option value="{{ $permission->id }}" {{ in_array(trim($permission->id) , $role->permissions->pluck('id')->toArray()) ? 'selected' : ''  }}>{{ $permission->name }} - {{ $permission->label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="title" class="control-label"> توضیح مقام</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="لطفا توضیح را وارد کنید" value="{{ $role->description }}" >
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-12">
                    <button type="submit" class="btn-danger" > ویرایش</button>

                </div>
            </div>

        </form>
    </div>
@endsection
