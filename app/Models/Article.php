<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'image', 'user_id', 'average_rating'];

    // Un artículo pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un artículo puede tener muchos comentarios
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Un artículo puede tener valoraciones polimórficas
    public function ratings()
    {
        return $this->morphMany(Rating::class, 'rateable');
    }

    // Un artículo puede ser reportado (relación polimórfica)
    public function reports()
    {
        return $this->morphMany(Report::class, 'reported');
    }

    // Método para calcular el promedio de valoraciones
    public function updateAverageRating()
    {
        $this->average_rating = $this->ratings()->avg('rating') ?? 0;
        $this->save();
    }
}
