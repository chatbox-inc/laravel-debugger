<?php
namespace Chatbox\Debug;
use Carbon\Carbon;
use Chatbox\Debug\Commands\CacheList;
use Chatbox\Debug\Commands\CheckCache;
use Chatbox\Debug\Commands\SendMail;
use Chatbox\Debug\Commands\UploadFile;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/10/30
 * Time: 13:19
 */

class DebugToolServiceProvider extends ServiceProvider
{
    public function register(){
        $this->commands([
            SendMail::class,
            UploadFile::class,
            CheckCache::class,
            CacheList::class
        ]);
    }

}