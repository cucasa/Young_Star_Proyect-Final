<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'user_id', 'category_id'];

    // Un artículo pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un artículo pertenece a una categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Un artículo puede tener muchos comentarios
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Un artículo puede tener muchas valoraciones
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    // Un artículo puede ser reportado (relación polimórfica)
    public function reports()
    {
        return $this->morphMany(Report::class, 'reported');
    }
}
