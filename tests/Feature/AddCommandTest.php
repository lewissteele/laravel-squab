<?php

namespace Tests\Feature;

use Illuminate\Console\Command;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_saving_connection(): void
    {
        $host = fake()->domainName();
        $password = fake()->password();
        $username = fake()->userName();

        $this->artisan('add')
            ->expectsQuestion('What is the host name?', $host)
            ->expectsQuestion('What is your user name?', $username)
            ->expectsQuestion('What is your password?', $password)
            ->assertExitCode(Command::SUCCESS);

        $this->assertDatabaseHas('connections', [
            'host' => $host,
            'password' => $password,
            'username' => $username,
        ]);
    }
}
