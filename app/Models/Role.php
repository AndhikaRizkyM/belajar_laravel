<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        'name',
        'is_active'
    ];

    // public +function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    // public function users()
    // {
    //     return $this->belongsToMany(User::class, 'user_roles');
    // }
}
