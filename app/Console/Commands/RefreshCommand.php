<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use File;

class RefreshCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh project';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if(app()->isProduction()){
            return Command::FAILURE;
        }
        $this->call('cache:clear');
        Storage::deleteDirectory('public/files/');
        Storage::deleteDirectory('public/images/landfill');
        Storage::deleteDirectory('public/images/hero');
        Storage::deleteDirectory('public/images/article');
        Storage::deleteDirectory('public/images/hero');
        Storage::deleteDirectory('public/images/landfill-category');
        Storage::deleteDirectory('public/images/meeting');
        Storage::deleteDirectory('public/images/page');
        Storage::deleteDirectory('public/images/question');

        File::copyDirectory( storage_path('fixtures'), storage_path('app/public'));
        $this->call('migrate:fresh',[
            '--seed' => true
        ]);

        //$this->call('moonshine-rbac:install');

        $this->call('moonshine:user',[
            '--username' => env('ADMIN_EMAIL'),
            '--name' => env('ADMIN_NAME'),
            '--password' => env('ADMIN_PASSWORD')

        ]);
        
        return Command::SUCCESS;
    }
}
