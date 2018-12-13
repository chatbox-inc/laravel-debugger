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

class CacheList extends Command
{
    protected $signature = "debug:cachelist ";

    protected $description = "cache list";

    public function handle(){
        $cache = \DB::table("cache")->limit(100)->get();

        $index = 0;
        $cache = $cache->map(function($value)use(&$index){
            $index++;
            return [
                $index,
                $value->key,
                $value->value,
                $value->expiration,
            ];
        })->toArray();

        $this->table([
            "#",
            "key",
            "value",
            "expiration"
        ], $cache);

    }
}