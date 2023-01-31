<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class StoreFavicon implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $favicon_url;
    public function __construct($favicon_url)
    {
        $this->favicon_url = $favicon_url;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $favicon_url = $this->favicon_url;
        $client = new \GuzzleHttp\Client();
        $res = $client->get($favicon_url);
        $content = (string) $res->getBody();

        Storage::disk('local')->put('downloads/favicon/favicon.jpg', $content);
    }
}
