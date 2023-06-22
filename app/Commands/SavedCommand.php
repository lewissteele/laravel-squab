<?php

namespace App\Commands;

use App\Connection;
use LaravelZero\Framework\Commands\Command;

class SavedCommand extends Command
{
    protected $signature = 'saved';

    protected $description = 'List saved database connections';

    public function handle(): void
    {
        if (Connection::doesntExist()) {
            $this->error('No database connections have been saved');
            return;
        }

        $this->table(
            ['Host', 'Username'],
            Connection::all('host', 'username')->toArray(),
        );
    }
}
