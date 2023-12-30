<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Organization;
use App\Models\UserOrganization;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'timezone',
        'language',
        'image',
        'roles',
        'access_policy',
        'access_permissions',
        'last_login',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'roles' => 'array',
    ];

    /**
     * @return HasMany
     */
    public function providers()
    {
        return $this->hasMany(Provider::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function organizations()
    {
        return $this->hasManyThrough(
            Organization::class,
            UserOrganization::class,
            'user_id',//User.id = UserOrganization.user_id
            'id',//Organization.id=UserOrganization.organization_id
            'id',//User.id
            'organization_id'//UserOrganization.organization_id
        );
    }

    /**
     * @return Session Organization
     */
    public function organization()
    {
        return session('Auth::organization');
    }
}
