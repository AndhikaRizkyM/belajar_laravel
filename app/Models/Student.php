<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'major_id',
        'name',
        'phone'
    ];

    // ORM = Object Relation Model
    // One to One   : Jarang dipakai di industri, 
    // One to Many  : Satu ke Banyak, contoh seperti aplikasi POS dimana user/pembeli bisa membeli banyak produk 
    // Many to Many : Banyak ke Banyak, contoh banyak user/student bisa memiliki banyak major

    // belongsTo
    public function major()
    {
        return $this->belongsTo(Majors::class, 'major_id', 'id');
    }
}
