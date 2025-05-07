<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];

    // Una categoría puede tener muchos artículos
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    // Una categoría puede tener muchos hilos
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    // Una categoría puede tener muchos posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Una categoría puede tener muchos foros
    public function forums()
    {
        return $this->hasMany(Forum::class);
    }
}
