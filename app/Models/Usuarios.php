<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuarios extends Model
{
    use HasFactory;

    protected $fillable = ['descricao','tipo_id','nome','sobrenome','login','senha'];
    protected $primaryKey = 'id';

    //protected $table = "tipos";
    //protected $table = "aulas";

    public function tipos()
    {
        return $this->belongsTo('App\Models\Tipos', 'tipo_id');
    }

    public function aulas(){
        return $this->hasMany('App\Models\Aulas', 'usuario_id');
    }
}