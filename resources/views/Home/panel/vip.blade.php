@component('Home.panel.master')
   <form action="{{route('user.panel.vip.payment')}}" method="post">
       @csrf
        <select name="plan">
            <option value="1"> عضو ویژه یک ماهه 10000 تومان</option>
            <option value="3"> عضو ویژه سه ماهه 30000 تومان</option>
            <option value="12"> عضو ویژه دوازده ماهه 120000 تومان</option>
        </select>

       <button type="submit"> افزایش اعتبار</button>
   </form>


@endcomponent
