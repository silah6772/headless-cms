<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class StoreDefaultPostImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $post_image_url;
    public function __construct($post_image_url)
    {
        $this->post_image_url = $post_image_url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $post_image_url = $this->post_image_url;
        $client = new \GuzzleHttp\Client();
        $res = $client->get($post_image_url);
        $content = (string) $res->getBody();

        Storage::disk('local')->put('downloads/default/post/default-post.jpg', $content);
    }
}
