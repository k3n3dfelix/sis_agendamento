<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    use HasFactory;

    protected $fillable = ['descricao'];
    protected $primaryKey = 'id_tipo';
    protected $table = "tipos";

    public function Tipos(Tipos $tip){
        return $this->tipo->save($tip);
    }
    public function usuarios(){
        return $this->hasOne('App\Models\Usuarios');
    }

}
