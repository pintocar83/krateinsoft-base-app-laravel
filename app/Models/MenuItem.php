<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'menu_section_id',
        'menu_item_id',
        'name',
        'description',
        'link',
        'icon',
        'order',
        'actions',
        'status',
    ];

    public function subItems(): HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
