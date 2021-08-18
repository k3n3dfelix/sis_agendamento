@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Editar Tipo') }}</div> -->

                <ol class="breadcrumb card-header ">
                    <li class="breadcrumb-item "><a href="{{ route('aula') }}"> Aulas</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>

                <div class="card-body">
                    <form action="{{route('aula.atualizar',$aulas->id_aula)}}" method="post">
                        {{csrf_field()}}
                        @method('PUT')
                        <div class="form-row">
                        
                            <div class="form-group col-md-12 ">
                                
                                <input type="hidden" class="form-control" id="tipo_id" name="usuario_id" value="{{ isset($aulas->usuario_id) ? $aulas->usuario_id : ''}}">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="nome">Materia</label>
                                <input type="text" class="form-control" id="materia" name="materia" value="{{ isset($aulas->materia) ? $aulas->materia : ''}}">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="sobrenome">Data</label>
                                <input type="text" class="form-control" id="data" name="data" value="{{ isset($aulas->data) ? $aulas->data : ''}}">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="login">Hora</label>
                                <input type="text" class="form-control" id="hora" name="hora" value="{{ isset($aulas->hora) ? $aulas->hora : ''}}">
                            </div>
                            
                        </div>
 
                        <button type="submit" class="btn btn-success float-right">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
