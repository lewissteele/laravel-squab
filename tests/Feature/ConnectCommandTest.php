<?php

namespace Tests\Feature;

use App\Connection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Exception\RuntimeException;
use Tests\TestCase;

class ConnectCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_fails_with_missing_argument(): void
    {
        $this->expectException(RuntimeException::class);
        $this->artisan('connect')->assertFailed();
    }

    public function test_it_runs_query(): void
    {
        $connection = Connection::factory()->create();

        $this->artisan("connect $connection->host")
            ->expectsQuestion(
                'What query would you like to run?',
                'select * from connections',
            )
            ->expectsTable(
                ['id', 'host', 'username', 'password', 'created_at', 'updated_at'],
                $connection->values(),
            )
            ->assertSuccessful();
    }
}
