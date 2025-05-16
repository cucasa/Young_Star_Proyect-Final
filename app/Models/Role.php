<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Usa el nombre de columna correcto
    protected $fillable = ['nombre'];

    // Relación: un rol puede tener muchos usuarios
    public function users()
    {
        return $this->hasMany(User::class, 'roles_id');
    }
}
