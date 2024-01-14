<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureFlag extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;

    protected $keyType = 'string';

    protected $casts = [
        'config' => 'array',
    ];

    protected $fillable = [
        'id',
        'name',
        'description',
        'config',
        'status',
        'order',
    ];

}
