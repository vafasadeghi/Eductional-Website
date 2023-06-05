<?php

namespace App\Http\Controllers;

use App\Models\ActivationCode;
use App\Models\Payment;
use Artesaos\SEOTools\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use SEO;

use SoapClient;
class UserController extends Controller
{
    protected $MerchantID = 'f83cc956-f59f-11e6-889a-005056a205be'; //Required



    public function Activation($token)
    {
        $activationCode = ActivationCode::whereCode($token)->first();


    }

    public function index(){
        SEO::SetTitle('پنل کاربری');
        return view('Home.panel.index');
    }
     public  function history()
     {
         SEO::SetTitle('تاریخچه پرداخت');
        $payments = auth()->user()->payments()->latest()->paginate(20);
         return view('Home.panel.history',compact('payments'));
     }

     public  function vip()
     {
         SEO::SetTitle('عضو ویژه وب لرن');

         return view('Home.panel.vip');
     }

    public function vipPayment()
    {

        $this->validate(request(),[
            'plan' => 'required'
        ]);

        switch (\request('plan')) {
            case 3 :
                $price = 30000;
                break;
            case 12 :
                $price = 120000;
                break;
            default:
                $price = 100;
        }

        $Description = 'توضیحات تراکنش تستی'; // Required
        $Email = user()->email; // Optional
        $CallbackURL = url(route('user.panel.vip.checker')); // Required

        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $this->MerchantID,
                'Amount' => $price,
                'Description' => $Description,
                'Email' => $Email,
                'CallbackURL' => $CallbackURL,
            ]
        );

        //Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {

            user()->payments()->create([
                'resnumber' => $result->Authority,
                'price' => $price,
            ]);

            return redirect('https://www.zarinpal.com/pg/StartPay/'.$result->Authority);
        } else {
            echo 'ERR: ' . $result->Status;
        }
    }


    public function checkPayment($payment)
    {
        $payment->update([
            'payment' => 1
        ]);

        switch ($payment->price) {
            case 100 :
                $time = 1;
//                $type = 'month';
                break;
            case 30000 :
                $time = 3;
//                $type = '3month';
                break;
            case 120000 :
                $time = 13;
//                $type = '12mo';
                break;
        }

        $user = $payment->user;
        $viptime = $user->isActive() ? Carbon::parse($user->viptime) : Carbon::now();
        $user->update([
            'viptime' => $viptime->addMonths($time),
        ]);

        return true;
    }
}
