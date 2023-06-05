<?php

namespace App\Rules;
use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;


class Recaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try{
            $client = new client();
            $response = $client->request('post','https://www.google.com/recaptcha/api/siteverify',[
                'form_params'=>[
                    'secret'=> env('GOOGLE_RECAPTCHA_SECRET_KEY'),
                    'response'=> $value,
                ]
            ]);

        }catch (\exception $exception){

        }
        $response = json_decode($response->getBody());
        return $response->success;


    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '.شما را به عنوان ربات تشخیص داده ایم';
    }
}
