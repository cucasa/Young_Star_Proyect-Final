<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['titulo', 'body', 'user_id', 'forum_id', 'average_rating'];

    // Un hilo pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un hilo pertenece a un foro
    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }

    // Un hilo puede tener muchos posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }

    public function updateAverageRating()
    {
        $this->average_rating = $this->ratings()->avg('rating') ?? 0;
        $this->save();
    }
}
