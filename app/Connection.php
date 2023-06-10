<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
