<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $fillable = ['descricao','tipo_id','nome','sobrenome','login','senha'];
    protected $primaryKey = 'id_usuario';

    //protected $table = "tipos";

    public function tipos()
    {
        return $this->belongsTo('App\Models\Tipos', 'tipo_id');
    }

    public function aulas(){
        return $this->hasMany('App\Models\Aulas', 'usuario_id');
    }

    public function agendas(){
        return $this->hasMany('App\Models\Agenda', 'usuario_id');
    }
}