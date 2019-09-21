<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FlushSessionsCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'session:flush';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush all users sessions.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::table('sessions')->truncate();

        $files = glob(storage_path('framework/sessions/').'*');

        if ($files != false) {
            array_map('unlink', $files);
            $this->info('Sessions Cleared!');
        }
    }
}
