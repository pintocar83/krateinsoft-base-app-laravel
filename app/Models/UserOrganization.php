<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrganization extends Model
{
    use HasFactory;

    protected $table = 'user_organization';

    protected $fillable = [
        'user_id',
        'organization_id',
        'status',
    ];
}
