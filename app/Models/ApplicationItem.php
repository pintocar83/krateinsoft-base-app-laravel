<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class ApplicationItem extends Model
{
    use HasFactory;

    protected $casts = [
        'inside' => 'array',
        'actions' => 'array',
    ];

    protected $fillable = [
        'id',
        'application_section_id',
        'application_item_id',
        'name',
        'description',
        'link',
        'icon',
        'inside',
        'order',
        'actions',
        'status',
    ];

    public function subItems(): HasMany
    {
        return $this->hasMany(self::class);
    }

    public function parent(): belongsTo
    {
        return $this->belongsTo(self::class, 'application_item_id');
    }
}
