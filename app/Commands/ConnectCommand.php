<?php

namespace App\Commands;

use App\Connection;
use LaravelZero\Framework\Commands\Command;
use PDO;

class ConnectCommand extends Command
{
    protected $signature = 'connect {connection}';

    protected $description = 'Connect to database';

    public function handle(): void
    {
        $connectionName = $this->argument('connection');

        /** @var Connection */
        $connection = Connection::where('host', $connectionName)->firstOrFail();
        $db = $connection->getSavedDatabaseConnection();

        //$answer = $this->ask('What query would you like to run?');
        $answer = 'select * from public.migrations limit 2';
        $result = $db->query($answer)->fetchAll(PDO::FETCH_ASSOC);

        $this->table(
            headers: collect(collect($result)->first())->keys()->toArray(),
            rows: $result,
        );
    }
}
