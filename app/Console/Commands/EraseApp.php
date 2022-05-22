<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EraseApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:erase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Erase application data.';

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
        $this->warn("WARNING: This operation will remigrate your database and erase all application data.");
        $this->warn("All files under '/storage' (including posts, media, etc.) will be removed!");
        if($this->confirm('Do you wish to continue?')) {
            $files = Storage::allFiles();
            $filesNum = count($files);
            $ignored = 0;

            $bar = $this->output->createProgressBar($filesNum);
            $bar->start();

            foreach($files as $file) {
                // ignore .gitignore
                if(Str::afterLast($file, '/') != '.gitignore') {
                    $bar->setMessage("Removing $file");
                    if(!Storage::delete($file)) {
                        $bar->finish();
                        $this->error(' Error!');
                        $this->newLine();
                        $this->error("Could not remove file $file");
                        return -1;
                    }
                } else $ignored++;
                $bar->advance();
            }

            $bar->finish();
            $this->info(' Done!');
            $this->newLine();
            $this->info(($filesNum - $ignored) . " file(s) removed. $ignored file(s) ignored.");
            $this->call('migrate:fresh');
        } else {
            $this->info('Aborted.');
        }
        return 0;
    }
}
