<?php

namespace SharaCms\Font\App\Repositories;

use App\Jobs\FileStorage;
use App\Jobs\StoreDefaultPostImage;
use App\Jobs\StoreFavicon;
use App\Jobs\StoreLogo;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class HeadlessCmsRepository
{
    // public function listWorkspaces(){
    //     $url = 'fetch/workspaces/';
    //     return $this->guzzleFunction($url);
    // }

    public function updateWorkspace($request){
        if ($request['event_type'] == 'workspace'){
            Cache::put('workspaces', $request['event_data']);
            $workspace = Cache::get('workspaces');
            StoreFavicon::dispatch($workspace['favicon']);
            StoreLogo::dispatch($workspace['logo']);
            StoreDefaultPostImage::dispatch($workspace['default_post_image']);
        }

        return 0;
    }


    public function updateMenus($request){
        if ($request['event_type'] == 'menu'){
            Cache::put('menus', json_decode($request['event_data']));
        }

        return 0;
    }


    public function updatePosts($request){
        if ($request['event_type'] == 'post'){
            Cache::put('posts', $request['event_data']);
        }

        return 0;
    }


    public function updateWidgets($request){
        if ($request['event_type'] == 'widget'){
            Cache::put('widgets', $request['event_data']);
        }

        return 0;
    }

    public function guzzleFunction($url){

        $workspace_url = env('WORKSPACE_URL');
        $fetch_url =  $workspace_url.$url;
        $client = new \GuzzleHttp\Client();
        $res = $client->get($fetch_url);
        $content = (string) $res->getBody();

        return  json_decode($content);
    }

    public function getWidgets(){
        $widgets = Cache::get('widgets');
        if ($widgets){
            return (array) $widgets;
        } else {
            $workspace_security_key = env('WORKSPACE_SECURITY_KEY');

            $url = 'fetch/widgets/'.$workspace_security_key;
            Cache::put('widgets', $this->guzzleFunction($url));
            return (array) Cache::get('widgets');
        }
    }


    public function getMenus(){

        $workspace_security_key = env('WORKSPACE_SECURITY_KEY');
        $menus = Cache::get('menus');
        if ($menus){
            return $menus;
        } else {
            $url = 'fetch/menus/'.$workspace_security_key;
            Cache::put('menus', $this->guzzleFunction($url));
            return Cache::get('menus');
        }
    }

    public function getWorkspace(){

        $workspace = Cache::get('workspaces');
        $workspace_security_key = env('WORKSPACE_SECURITY_KEY');
        if ($workspace){
            return $workspace;
        } else {
            $url = 'fetch/workspaces/'.$workspace_security_key;
            Cache::put('workspaces', $this->guzzleFunction($url));
            $workspace = Cache::get('workspaces');
            StoreFavicon::dispatch($workspace->favicon);
            StoreLogo::dispatch($workspace->logo);
            StoreDefaultPostImage::dispatch($workspace->default_post_image);

            return $workspace;
        }
    }

    public function getPosts(){
        $posts = Cache::get('posts');
        $workspace_security_key = env('WORKSPACE_SECURITY_KEY');
        if ($posts){
            return $posts;
        } else {
            $url = 'fetch/posts/'.$workspace_security_key;
            Cache::put('posts', $this->guzzleFunction($url));
            $posts = Cache::get('posts');

            return $posts;
        }
    }

    public function getSlug($slug){

            $url = 'fetch/post/'.$slug;
            $data =  $this->guzzleFunction($url);
            return $data;
    }
}
