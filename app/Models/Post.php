<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['body', 'user_id', 'thread_id', 'average_rating'];

    // Un post pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un post pertenece a un hilo
    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    // Un post puede ser reportado
    public function reports()
    {
        return $this->morphMany(Report::class, 'reported');
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
