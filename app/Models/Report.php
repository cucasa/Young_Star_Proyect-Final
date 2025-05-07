<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['reason', 'user_id'];

    // Un reporte pertenece a un usuario (quien lo hizo)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un reporte puede pertenecer a muchos tipos de contenido
    public function reported()
    {
        return $this->morphTo();
    }
}

