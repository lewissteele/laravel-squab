<?php

namespace Tests\Feature;

use App\Connection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SavedCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_lists_saved_connection(): void
    {
        $connections = Connection::factory(2)->create();
        $first = $connections->first();
        $second = $connections->last();

        $this->artisan('saved')->expectsTable(
            headers: [
                'Host',
                'Username',
            ],
            rows: [
                [$first->host, $first->username],
                [$second->host, $second->username],
            ],
        )->assertSuccessful();
    }

    public function test_it_prints_message_when_no_connections_exist(): void
    {
        $this->artisan('saved')
            ->expectsOutput('No database connections have been saved')
            ->assertSuccessful();
    }
}
