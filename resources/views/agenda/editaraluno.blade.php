@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Editar Tipo') }}</div> -->

                <ol class="breadcrumb card-header ">
                    <li class="breadcrumb-item "><a href="{{ route('agenda') }}"> Agendas</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>

                <div class="card-body">
                    <form action="{{route('agenda.atualizaraluno',$agendas->id_agenda)}}" method="post">
                        {{csrf_field()}}
                        @method('PUT')
                        <div class="form-row">
                        
                            <!-- <div class="form-group col-md-12 ">
                                <label for="tipo_id">ID Aula</label>
                                <input type="text" class="form-control" id="aula_id" name="aula_id" value="">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="nome">ID Usuario</label>
                                <input type="text" class="form-control" id="usuario_id" name="usuario_id" value="{{ isset($agendas->usuario_id) ? $agendas->usuario_id : ''}}">
                            </div> -->

                            <div class="form-group col-md-12 ">
                            <label for="status">Status Agendamento</label>
                            <select class="form-control" name="status">
                            @can('viewbtnConfirmAgend',App\Models\Agenda::class)
                                    <option value="1" {{(isset($agendas->status) && $agendas->status == 1 ? 'selected' : '')}}>Aguardando Aprovação</option>
                                    <option value="2" {{(isset($agendas->status) && $agendas->status == 2 ? 'selected' : '')}}>Aprovado</option>
                                    <option value="3" {{(isset($agendas->status) && $agendas->status == 3 ? 'selected' : '')}}>Cancelar Aprovação</option>
                            @endcan
                                    @can('viewbtnCanAgend',App\Models\Agenda::class)
                                        <option value="4" {{(isset($agendas->status) && $agendas->status == 4? 'selected' : '')}}>Cancelar Agendamento</option>
                                    @endcan
                            </select>
                            </div>
                              
                        </div>
 
                        <button type="submit" class="btn btn-success float-right">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
