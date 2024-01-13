<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryBox extends Model
{
    use HasFactory;

    protected $connection = 'organization';

    protected $casts = [
        'command_status' => 'array',
    ];

    protected $fillable = [
        'id',
        'code',
        'name',
        'description',
        'ip_address',
        'command_status',
        'status',
        'order',
        'delete_at',
    ];

}
