<?php
namespace Chatbox\Debug\Commands;
use Illuminate\Console\Command;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/12/13
 * Time: 4:44
 */

class CheckCache extends Command
{
    protected $signature = "debug:cache {--put=} {--clear}";

    protected $description = "cache test";

    public function handle(){
        $key = "DEBUG_CACHE_TEST";

        if(!Cache::has($key)){
            $this->line("cache $key is not set");
        }else{
            $this->line("cache $key has value: ".Cache::get($key));
        }

        if($this->option("clear")){
            Cache::forget($key);
            $this->line("now cache cleared");
        }
        if($newValue = $this->option("put")){
            Cache::forever($key,$newValue);
            $this->line("now cache value overwritten");
        }
    }


}