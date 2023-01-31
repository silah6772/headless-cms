<?php

namespace HeadlessCms\font\App\Http\Controllers;

use App\Jobs\FileStorage;
use App\Jobs\StoreFavicon;
use App\Jobs\StoreLogo;
use HeadlessCms\App\Repositories\HeadlessCmsRepository;
use HeadlessCms\App\Repositories\PaginationRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function landing()
    {

        $repo = new HeadlessCmsRepository();

        $space = $repo->getWorkspace();

        if(!is_array($space)){
            $workspace = (array)$space;
        } else {
            $workspace = $space;
        }

        $menu_id = env('MENU_ID');

        $menus = $repo->getMenus();

        $main_menus = [];
        foreach ($menus as $menu){
            if(!is_array($menu)){
                $menu = (array)$menu;
            }
            if ($menu['id'] == $menu_id){
                $parent_ids = [];

                foreach($menu['items'] as $menu_items){
                    array_push($main_menus, (array) $menu_items);
                }
            }
        }

        $all_posts = $repo->getPosts();

        $rposts = [];
        foreach ($all_posts as $post) {

            if(!is_array($post)){
                $rposts[] = (array)$post;
            } else{
                $rposts[] = $post;
            }
        }

        $posts = PaginationRepository::paginate($rposts);

        return view('headlessCms.landing.index', compact('menus', 'workspace','main_menus', 'posts'));
    }

    public function logo(){
        return Storage::disk('local')->get('downloads/logo/logo.jpg');
    }

    public function favicon(){
        return Storage::disk('local')->get('downloads/favicon/favicon.jpg');
    }

    public function defaultPostImage(){
        return Storage::disk('local')->get('downloads/default/post/default-post.jpg');
    }

    public function displayPost($slug){


        $repo = new HeadlessCmsRepository();

        $data = $repo->getSlug($slug);
        $data = (array) $data;

        $post = $data['posts'];
        $awidgets = $data['widgets'];
        $menus = $data['menus'];
         $space = $repo->getWorkspace();

        if(!is_array($space)){
            $workspace = (array)$space;
        } else {
            $workspace = $space;
        }
        $widgets = array_reduce($awidgets, function($carry, $item) {
            $carry[$item->section][] = $item;
            return $carry;
        }, []);
        $main_menus = [];
        foreach ($menus as $menu){
            if(!is_array($menu)){
                $menu = (array)$menu;
            }
            foreach($menu['items'] as $menu_items)
            {
                    array_push($main_menus, (array) $menu_items);
            }
        }
        return view('headlessCms.post.index', compact('post', 'menus', 'workspace','main_menus', 'widgets'));
    }
}
