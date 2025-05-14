<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category_id', 'user_id', 'average_rating'];

    // Un foro pertenece a una categoría
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Un foro puede tener muchos hilos
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    // Un foro pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
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
