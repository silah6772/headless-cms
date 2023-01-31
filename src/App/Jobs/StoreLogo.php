<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class StoreLogo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $logo_url;
    public function __construct($logo_url)
    {
        $this->logo_url = $logo_url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $logo_url = $this->logo_url;

        $client = new \GuzzleHttp\Client();
        $res = $client->get($logo_url);
        $content = (string) $res->getBody();
        Storage::disk('local')->put('downloads/logo/logo.jpg', $content);
    }
}
