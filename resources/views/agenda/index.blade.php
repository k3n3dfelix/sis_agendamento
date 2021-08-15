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
                                <tr>
                                    <th>ID</th>
                                    <th>ID Aula</th>
                                    <th>Professor</th>
                                    <th>Status</th>
                                   
                                   
                                    <th>Opções</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agendas as $agenda)
                               
                                
                                <tr>
                                
                                    <td>{{$agenda->id_agenda}}</td>
                                    <td>{{$agenda->aula_id}}</td>
                                    <td>{{$agenda->usuario_id}}</td>
                                    <td>{{($agenda->status == 1 ? 'Aguardando Aprovação' : '')}}
                                        {{($agenda->status == 2 ? 'Aprovado' : '')}}
                                        {{($agenda->status == 3 ? 'Cancelado Professor' : '')}}
                                        {{($agenda->status == 4 ? 'Cancelado Aluno' : '')}}
                                    </td>
                                    <td>
                                      
                                    <a href="{{route('agenda.editar',$agenda->id_agenda)}}"class="btn btn-primary">Visualizar Alunos</a>
                                    <a href="{{route('agenda.editar',$agenda->id_agenda)}}"class="btn btn-success">Confirmar Agendamento</a>
                                    <a href="javascript: if(confirm('Realmente deseja deletar?')) { window.location.href = '{{ route ('agenda.deletar',$agenda->id_agenda)}}'}"class="btn btn-danger">Cancelar Agendamento</a>
                                        
                                        
                                    </td>
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
