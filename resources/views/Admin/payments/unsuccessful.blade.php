@extends('Admin.master')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">


        <div class="page-header head-section">
            <h2>  پرداختی های نا موفق</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered"  >
                <thead >
                <tr>
                    <th>نام کاربر  </th>
                    <th>مقدار پرداختی</th>
                    <th>نوع پرداخت</th>
                    <th>تنظیمات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>{{ $payment->user->name }}</td>
                        <td>{{$payment->price}}</td>
                        @if( $payment->course_id == vip)
                            <td>بابت عضویت ویژه</td>

                        @else
                            <td>{{$payment->course->title}}</td>

                        @endif
                        <td>
                            <div style="display: flex">
                                <form action="{{ route('payments.destroy',['payment'=>$payment->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" onclick="return confirm('آیا از حذف نظر مورد نظر اطمینان دارید؟')" class="alert-danger">حذف</button>

                                </form>
                                <form action="{{ route('payments.update',['payment'=>$payment->id]) }}" method="post">
                                    @csrf
                                    @method('Patch')
                                    <button style="margin-right: 5px" type="submit" onclick="return confirm('آیا از تایید نظر مورد نظر اطمینان دارید؟')" class="alert-success">تایید</button>

                                </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <div style="text-align: center">
            {!! $payments->render() !!}
        </div>
    </div>
@endsection
