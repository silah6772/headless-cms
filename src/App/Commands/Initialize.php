<?php

namespace HeadlessCms\font\App\Commands;

use Illuminate\Console\Command;

class Initialize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'headlesscms:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->warn('Creating routes directory');
        $routes_dir  = app_path().'-';
        $routes_dir = str_replace('/app-','/routes/cms',$routes_dir);
        if(!file_exists($routes_dir)) {
            mkdir($routes_dir);
            $copyCommand = 'cp -r '.__DIR__.'/../Routes/* '.$routes_dir.'/';
            exec($copyCommand);
            $this->info("success");
        } else {
            $this->info("Exists already!");
        }
        $this->warn("Copying controllers");
        $controllers_dir = app_path('Http/Controllers');
        $app_dir = app_path();
        if(!file_exists($controllers_dir.'/Cms')){
            mkdir($controllers_dir.'/Cms');
            $command = 'cp -r '.__DIR__.'/../Http/Controllers/* '.$controllers_dir.'/Cms/';
            exec($command);
            $this->info('Created controller directory');
        }
       $repositories_dir = str_replace('/app','/',$app_dir).'app/Repositories';
       if(!file_exists($repositories_dir.'/HeadlessCmsRepository.php')){
           if(!file_exists($repositories_dir)){
               exec('mkdir '.$repositories_dir);
           }
           $command = 'cp -r '.__DIR__.'/../Repositories/* '.$repositories_dir.'/';
           exec($command);
           $this->info("Copied default repositories");
       } else {
           $this->warn('Repositories exist already');
       }
        return Command::SUCCESS;
    }
}
