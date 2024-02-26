<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{

    protected $table = 'servers';
    use HasFactory;

    protected $fillable = [
        'name',
        'ip',
        'port',
        'qwery'
    ];
}
