<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Episode;
use Illuminate\Http\Request;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
   public function telegram()
   {
////       return Telegram::getMe();
//       return Telegram::getUpdates();
    return Telegram::setWebhook(['url'=>'https://70c0-51-89-210-150.eu.ngrok.io/5437205698:AAGQWULHXCdy0ZsQ1BueXcDMLN4umgHRxto/webhook']);
   }
   public  function webhook()
   {
       Telegram::commandsHandler(true);

       switch (request('message.text')) {
           case 'آخرین مقالات سایت':
               return $this->lastArticles();
               break;
           case 'آخرین ویدیوهای سایت':
               return $this->lastEpisodes();
               break;
           case 'راهنمای استفاده از ربات راکت':
               return $this->guide();
               break;
       }
   }

    private function lastArticles()
    {
        $articles = Article::latest()->take(5)->get();
        if($articles) {
            $text = '';

            foreach ($articles as $article) {
                $text .= $article->title . "\n";
                $text .= url()->to($article->path()) . "\n";
            }
        } else {
            $text = 'مقاله ای برای نمایش وجود ندارد';
        }

        Telegram::sendMessage([
            'chat_id' => request('message.chat.id'),
            'text' => $text,
        ]);
    }

    private function lastEpisodes()
    {
        $episodes = Episode::latest()->take(5)->get();
        if($episodes) {
            $text = '';

            foreach ($episodes as $episode) {
                $text .= $episode->title . "\n";
                $text .= url()->to($episode->path()) . "\n";
            }
        } else {
            $text = 'ویدیوی برای نمایش وجود ندارد';
        }

        Telegram::sendMessage([
            'chat_id' => request('message.chat.id'),
            'text' => $text,
        ]);
    }

    private function guide()
    {
    }

}
