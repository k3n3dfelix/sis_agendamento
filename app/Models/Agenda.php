<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Agenda extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = ['aula_id','usuario_id','status'];
    protected $primaryKey = 'id_agenda';

    public function usuarios()
    {
        return $this->belongsTo('App\Models\Usuarios', 'usuario_id');
    }
    public function aulas()
    {
        return $this->belongsTo('App\Models\Aulas', 'aula_id');
    }
}
