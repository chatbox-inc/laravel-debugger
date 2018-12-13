<?php
namespace Chatbox\Debug\Commands;
use Illuminate\Console\Command;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/12/13
 * Time: 4:44
 */

class UploadFile extends Command
{
    protected $signature = "debug:upload {file}";

    protected $description = "upload files";

    public function handle(){
        $file = file_get_contents(app()->basePath($this->argument("file")));

        $path = "debug/".str_random();

        Storage::put($path,$file);
        $this->line("file uploaded!");
        $this->line("url " . Storage::url($path));
    }
}