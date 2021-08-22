<?php

namespace App\Policies;

use App\Models\Agenda;
use App\Models\Usuarios;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgendaPolicy
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

    public function viewMenusAdm(Usuarios $usuarios)
    {
        if($usuarios->tipo_id === 1){
            return true;
        }else{
        return false ;
        }
    }
    public function viewbtnCancelAgend(Usuarios $usuarios)
    {
        if($usuarios->tipo_id === 3){
            return true;
        }else{
        return false ;
        }
    }

    public function viewbtnConfirmAgend(Usuarios $usuarios)
    {
        if($usuarios->tipo_id === 1 ||$usuarios->tipo_id === 2){
            return true;
        }else{
        return false ;
        }
    }
    public function viewbtnCanAgend(Usuarios $usuarios)
    {
        if($usuarios->tipo_id === 3){
            return true;
        }else{
        return false ;
        }
    }

    public function viewMenuPro(Usuarios $usuarios)
    {
        if($usuarios->tipo_id === 1 || $usuarios->tipo_id === 2){
            return true;
        }else{
        return false ;
        }
    }

    public function viewMenuAlun(Usuarios $usuarios)
    {
        if($usuarios->tipo_id === 1 || $usuarios->tipo_id === 3){
            return true;
        }else{
        return false ;
        }
    }

    

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Usuarios $usuarios, Agenda $agenda)
    {
        //
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
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Usuarios $usuarios, Agenda $agenda)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Usuarios $usuarios, Agenda $agenda)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Usuarios $usuarios, Agenda $agenda)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Usuarios  $usuarios
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Usuarios $usuarios, Agenda $agenda)
    {
        //
    }
}
