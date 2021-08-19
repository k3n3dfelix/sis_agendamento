@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">{{ __('Listagem  Aulas') }}</div>
                <!-- @dump(auth()->user()->tipo_id)
                @php 
                    $id = auth()->user()->tipo_id;
                    echo $id;
                @endphp -->
                <div class="card-body">
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Professor</th>
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
                                    <td>{{$aula->nome }} {{$aula->sobrenome }}</td>
                                    <td>{{$aula->materia}}</td>
                                    <td>{{$aula->data}}</td>
                                    <td>{{$aula->hora}}</td>
                                    <td>
                                  
                                    @can('vermenu',App\Models\Aulas::class)
                                        <a href="{{route('agenda.confirmar',$aula->id_aula)}}"class="btn btn-primary">Visualizar Alunos</a>  
                                    @endcan
                                    @can('viewbtnAgendar',App\Models\Aulas::class)
                                        <a href="{{route('agenda.agendar',$aula->id_aula)}}"class="btn btn-success">Agendar</a>
                                    @endcan
                                    @can('update',App\Models\Aulas::class)
                                        <a href="{{route('aula.editar',$aula->id_aula)}}"class="btn btn-warning">Editar</a>
                                    @endcan
                                    @can('delete',App\Models\Aulas::class)
                                        <a href="javascript: if(confirm('Realmente deseja deletar?')) { window.location.href = '{{ route ('aula.deletar',$aula->id_aula)}}'}"class="btn btn-danger">Excluir</a>
                                        @endcan
                   
                                        
                                        
                                        
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
