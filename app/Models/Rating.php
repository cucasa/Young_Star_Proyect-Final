<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['rating', 'user_id', 'rateable_id', 'rateable_type'];

    // Una valoración pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Una valoración puede aplicarse a diferentes modelos (foros, hilos, posts, artículos)
    public function rateable()
    {
        return $this->morphTo();
    }
}
