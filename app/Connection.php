<?php

namespace App;

use Illuminate\Database\Connection as DatabaseConnection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PDO;

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
        return new DatabaseConnection(new PDO(
            "pgsql:host=$this->host;port=5432",
            $this->username,
            $this->password,
        ));
    }
}
