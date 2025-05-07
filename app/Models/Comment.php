<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body', 'user_id', 'article_id'];

    // Un comentario pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un comentario pertenece a un artículo
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // Un comentario puede ser reportado
    public function reports()
    {
        return $this->morphMany(Report::class, 'reported');
    }
}
