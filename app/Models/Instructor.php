<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $fillable = [
        'major_id',
        'name',
        'phone',
        'user_id'
    ];

    // belongsTo
    public function major()
    {
        return $this->belongsTo(Majors::class, 'major_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
