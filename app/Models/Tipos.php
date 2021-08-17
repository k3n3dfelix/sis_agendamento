<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos extends Model
{
    use HasFactory;

    protected $fillable = ['descricao'];
    protected $primaryKey = 'id';
    
    //protected $table = "usuarios";

    public function Tipos(Tipos $tip){
        return $this->tipo->save($tip);
    }
    public function usuarios(){
        return $this->hasMany('App\Models\Usuarios', 'tipo_id');
    }

}
