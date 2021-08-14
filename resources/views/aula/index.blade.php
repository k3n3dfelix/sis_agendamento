@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Listagem  Aulas') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID Usuário</th>
                                    <th>Materia</th>
                                    <th>Data</th>
                                    <th>Hora</th>
                                   
                                    <th>Opções</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aulas as $aula)
                                <tr>
                                
                                    <td>{{$aula->id_aula}}</td>
                                    <td>{{$aula->usuario_id}}</td>
                                    <td>{{$aula->materia}}</td>
                                    <td>{{$aula->data}}</td>
                                    <td>{{$aula->hora}}</td>
                                    <td>
                                        <a href="{{route('aula.editar',$aula->id_aula)}}"class="btn btn-primary">Visualizar Alunos</a>
                                        <a href="{{route('aula.editar',$aula->id_aula)}}"class="btn btn-success">Agendar</a>
                                        <a href="{{route('aula.editar',$aula->id_aula)}}"class="btn btn-warning">Editar</a>
                                        <a href="javascript: if(confirm('Realmente deseja deletar?')) { window.location.href = '{{ route ('aula.deletar',$aula->id_aula)}}'}"class="btn btn-danger">Excluir</a>
                                        
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{route('aula.adicionar')}}" class="btn btn-primary pull-left">Adicionar</a>
                </div>

                @if(Session::has('flash_message'))
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div  class="alert {{Session::get('flash_message')['class']}} text-center">
                                {{Session::get('flash_message')['msg']}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </div>
</div>
@endsection
