<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationAction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'action',
        'name',
    ];

}
