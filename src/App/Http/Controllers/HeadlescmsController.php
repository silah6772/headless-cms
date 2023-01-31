<?php

namespace SharaCms\font\App\Http\Controllers;

use App\Jobs\FileStorage;
use SharaCms\App\Repositories\HeadlesCmsRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HeadlescmsController extends Controller
{
    // public function getWorkspace(){
    //     $workspaces = Cache::get('workspaces');

    //     if($workspaces){
    //         return $workspaces;
    //     } else {
    //         $menu_repo = new HeadlesCmsRepository();
    //         Cache::put('workspaces', $menu_repo->listWorkspaces());
    //         return  Cache::get('workspaces');
    //     }
    // }


    public function notifyMenu(Request $request){
        $menu_repo = new HeadlesCmsRepository();
        Log::info($request->all());
        $menu_repo->updateMenus($request->all());
    }

    public function notifyWorkspace(Request $request){
        $menu_repo = new HeadlesCmsRepository();
        $menu_repo->updateWorkspace($request->all());
    }

    public function notifyWidget(Request $request){
        $menu_repo = new HeadlesCmsRepository();
        $menu_repo->updateWidgets($request->all());
    }

    public function notifyPost(Request $request){
        Log::info($request->all());
        $menu_repo = new HeadlesCmsRepository();
        $menu_repo->updatePosts($request->all());
    }
}
