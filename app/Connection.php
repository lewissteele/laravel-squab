<?php

namespace App;

use Illuminate\Database\Connection as DatabaseConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property string $host
 * @property string $password
 * @property string $password
 */
class Connection extends Model
{
    use HasFactory;

    protected $fillable = [
        'host',
        'password',
        'username',
    ];

    public function getSavedDatabaseConnection(): DatabaseConnection
    {
        config()->set('database.connections.user', [
            'database' => null,
            'driver' => 'pgsql',
            'host' => $this->host,
            'password' => $this->password,
            'port' => 5432,
            'username' => $this->username,
        ]);

        return DB::connection('user');
    }
}
