<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $fillable = ['descricao','tipo_id','nome','sobrenome','login','senha'];
    protected $primaryKey = 'id';

    protected $table = "tipos";

    public function tipos()
    {
        return $this->belongsTo('App\Models\Tipos');
    }
}