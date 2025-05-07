<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['titulo', 'user_id', 'forum_id', 'category_id'];

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

    // Un hilo pertenece a una categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Un hilo puede tener muchos posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

