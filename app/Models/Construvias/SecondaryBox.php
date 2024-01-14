<?php

namespace App\Models\Construvias;

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
        'workgroup_main_box_id',
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
