<?php

namespace App\Models;

use App\Permissions\HasPermissionsTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasPermissionsTrait;

    protected $guard = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'address2',
        'city',
        'state',
        'zip',
        'phone',
        'avatar',
        'active',
        'is_verified',
        'last_login_at',
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
    ];

    public function locations()
    {
        return $this->belongsToMany(Location::class, 'user_location_assigns');
    }

    public function getLastLoginAtAttribute($value)
    {

        return \Carbon\Carbon::parse($value)->diffForHumans();
    }

    public function getAvatarAttribute($value)
    {
        if ($value && \File::exists(public_path('/users/avatar/' . $value))) {
            return asset('/users/avatar/' . $value);
        } else {
            return asset('assets/images/users/avatar-4.jpg');
        }
    }

    public function getRoleAttribute($value)
    {
        return $this->roles()->first();
    }
}
