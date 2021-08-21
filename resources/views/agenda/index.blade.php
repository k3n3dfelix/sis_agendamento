@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Listagem  Agendas') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>        
                                    <th>Matéria</th>        
                                    <th>Hora</th>
                                    <th>Data</th>
                                    <th>Aluno</th>
                                    <th>Status</th>
                                   
                                    @can('viewbtnConfirmAgend',App\Models\Agenda::class)
                                    <th>Opções</th>
                                    @endcan

                                    @can('viewbtnCancelAgend',App\Models\Agenda::class)
                                    <th>Opções</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agendas as $agenda)
                               
                                
                                <tr class="text-center">
                                
                                    <td>{{$agenda->id_agenda}}</td>
                                    <td>{{$agenda->materia}}</td>
                                    <td>{{$agenda->hora}}</td>
                                    <td>{{$agenda->data}}</td>
                                    <td>{{$agenda->nome}}</td>
                                    <td>{{($agenda->status == 1 ? 'Aguardando Aprovação' : '')}}
                                        {{($agenda->status == 2 ? 'Aprovado' : '')}}
                                        {{($agenda->status == 3 ? 'Cancelado Professor' : '')}}
                                        {{($agenda->status == 4 ? 'Cancelado Aluno' : '')}}
                                    </td>
                                    
                                    @can('viewbtnConfirmAgend',App\Models\Agenda::class)
                                    <td>
                                        <a href="{{route('agenda.editar',$agenda->id_agenda)}}"class="btn btn-success">Confirmar Agendamento</a>
                                    </td>
                                    @endcan 
                                    
                                    @can('viewbtnCancelAgend',App\Models\Agenda::class)
                                    <td>
                                        <a href="javascript: if(confirm('Realmente deseja deletar?')) { window.location.href = '{{ route ('agenda.deletar',$agenda->id_agenda)}}'}"class="btn btn-danger">Cancelar Agendamento</a>
                                    </td>
                                    @endcan 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{route('agenda.adicionar')}}" class="btn btn-primary pull-left">Adicionar</a>
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
