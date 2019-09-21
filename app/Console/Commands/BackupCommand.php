<?php

namespace App\Console\Commands;

use Hyn\Tenancy\Models\Website;
use Illuminate\Console\Command;
use Hyn\Tenancy\Database\Connection;

class BackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:backup {uuid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup all the tenants and system';

    /**
     * Execute the console command.
     *
     * @throws \Hyn\Tenancy\Exceptions\ConnectionException
     * @return mixed
     */
    public function handle()
    {
        $uuid = $this->argument('uuid');
        $website = Website::where('uuid', '=', $uuid)->first();
        $connection = app(Connection::class);
        $connection->set($website);

        \Config::set('backup.backup.source.databases', ['tenant']);
        \Config::set('backup.backup.name', 'tenant-'.$website->uuid);
        \Config::set('backup.backup.source.files.include', storage_path('app/tenancy/tenants/'.$website->uuid));

        $this->call('backup:run', ['--only-db' => true]);
    }
}
