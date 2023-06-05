@component('Home.panel.master')
    <table class="table table-hover">
        <thead>
        <tr>
            <th>مقدار پرداخت</th>
            <th>وضعیت پرداخت </th>

        </tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
                <td>{{ $payment->price }}  تومان</td>
                <td>{{ $payment->payment == 1 ?'موفق' : 'ناموفق'}}</td>

            </tr>

        @endforeach



        </tbody>
    </table>
@endcomponent
