<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description'];


    // Una categoría puede tener muchos foros
    public function forums()
    {
        return $this->hasMany(Forum::class);
    }
}
