<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['content', 'user_id', 'thread_id', 'category_id'];

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

    // Un post pertenece a una categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Un post puede ser reportado
    public function reports()
    {
        return $this->morphMany(Report::class, 'reported');
    }
}



