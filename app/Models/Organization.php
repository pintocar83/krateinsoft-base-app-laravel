<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'identification_number',
        'name',
        'address',
        'phone',
        'timezone',
        'language',
        'image',
        'db_driver',
        'db_url',
        'db_host',
        'db_port',
        'db_socket',
        'db_name',
        'db_user',
        'db_password',
        'status',
    ];
}
