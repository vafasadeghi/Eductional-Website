<?php namespace App\Telegram\Commands;



use Telegram\Bot\Commands\Command;
use Telegram\Bot\Laravel\Facades\Telegram;

class StartCommand extends Command
{
    protected $name = 'Start';
    protected $description = 'شروع کار با ربات وب لرن';

    public function handle()
    {
//        Telegram::sendMessage([
//            'chat_id' => request('message.chat.id'),
//            'text' => 'به ربات تلگرام راکت خوش آمدید',
//        ]);

        $keyboard = [
            ['آخرین ویدیوهای سایت','آخرین مقالات سایت'],
            ['راهنمای استفاده از ربات راکت']
        ];

        $reply_markup = Telegram::replyKeyboardMarkup([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);


        Telegram::sendMessage([
            'chat_id' => request('message.chat.id'),
            'text' => 'به ربات تلگرام راکت خوش آمدید',
            'reply_markup' => $reply_markup
        ]);
    }


}
