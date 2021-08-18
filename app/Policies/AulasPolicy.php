<?php

namespace App\Policies;

use App\Models\Aulas;
use App\Models\Usuarios;
use Illuminate\Auth\Access\HandlesAuthorization;

class AulasPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Usuarios $usuarios)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @param  \App\Models\Aulas  $aulas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Usuarios $usuarios, Aulas $aulas)
    {
        //
    }

    public function vermenu(Usuarios $usuarios)
    {
        if($usuarios->tipo_id === 1 || $usuarios->tipo_id === 2){
            return true;
        }else{
        return false ;
        }
    }

    public function viewBtnAlunosAgend(Usuarios $usuarios)
    {
        return $usuarios->tipo_id === 1;
    }

    

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Usuarios $usuarios)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @param  \App\Models\Aulas  $aulas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewbtnAgendar(Usuarios $usuarios)
    {
        if($usuarios->tipo_id === 1 || $usuarios->tipo_id === 3){
            return true;
        }else{
        return false ;
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @param  \App\Models\Aulas  $aulas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Usuarios $usuarios)
    {
        if($usuarios->tipo_id === 1 || $usuarios->tipo_id === 2){
            return true;
        }else{
        return false ;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @param  \App\Models\Aulas  $aulas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Usuarios $usuarios)
    {
        if($usuarios->tipo_id === 1 || $usuarios->tipo_id === 2){
            return true;
        }else{
        return false ;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @param  \App\Models\Aulas  $aulas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Usuarios $usuarios, Aulas $aulas)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @param  \App\Models\Aulas  $aulas
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Usuarios $usuarios, Aulas $aulas)
    {
        //
    }
}
