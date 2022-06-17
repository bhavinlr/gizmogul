<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'address2',
        'phone',
        'city',
        'state',
        'zip',
        'hours_of_opration',
        'active',
        'geo_lat',
        'geo_lng',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_location_assigns');
    }
}
