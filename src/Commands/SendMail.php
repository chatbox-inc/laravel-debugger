<?php
namespace Chatbox\Debug\Commands;
use Illuminate\Console\Command;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\HtmlString;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/12/13
 * Time: 4:44
 */

class SendMail extends Command
{
    protected $signature = "debug:sendmail";

    protected $description = "send mail for debug";

    public function handle(){
        $to = "t.goto@chatbox-inc.com";
        $title = "laravel debug tool - debug mail";
        $body = "hello world";
        Mail::send([
            new HtmlString(nl2br($body)),
            new HtmlString($body)
        ], [], function (Message $message) use ($title, $to) {
            $message->setTo($to);
            $message->setSubject($title);
        });
        $this->line("mail sent!");
    }

}