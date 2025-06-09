<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RunLegacySeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-legacy-seeder {seeder : The name of the seeder class to run}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run a specific seeder from the legacy seeds directory';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $seederName = $this->argument('seeder');
        $seederPath = database_path('seeds/' . $seederName . '.php');
        
        if (!file_exists($seederPath)) {
            $this->error("Seeder file not found: {$seederPath}");
            return 1;
        }
        
        // Include the seeder file
        require_once $seederPath;
        
        // Create an instance of the seeder and run it
        $seederClass = new $seederName();
        $seederClass->run();
        
        $this->info("Seeder {$seederName} executed successfully");
        return 0;
    }
}
