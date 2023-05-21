<?php

namespace App\Commands;

use App\Connection;
use LaravelZero\Framework\Commands\Command;

class AddCommand extends Command
{
    protected $signature = 'add';

    protected $description = 'Save database connection';

    public function handle()
    {
        $host = $this->ask('What is the host name?');
        $username = $this->ask('What is your user name?');
        $password = $this->secret('What is your password?');

        Connection::create([
            'host' => $host,
            'password' => $password,
            'username' => $username,
        ]);
    }
}
