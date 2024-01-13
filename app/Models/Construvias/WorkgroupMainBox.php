<?php

namespace App\Models\Construvias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkgroupMainBox extends Model
{
    use HasFactory;

    protected $connection = 'organization';

    protected $casts = [
        'command_status' => 'array',
    ];

    protected $fillable = [
        'id',
        'image',
        'code',
        'name',
        'description',
        'connection_type',
        'ip_address',
        'command_status',
        'address_country',
        'address_state',
        'address_city',
        'address_line1',
        'address_line2',
        'main',
        'status',
        'order',
        'delete_at',
    ];

}
