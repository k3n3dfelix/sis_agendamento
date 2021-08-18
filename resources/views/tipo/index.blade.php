@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listagem Tipos Usuários') }}</div>
                <!-- @dump(auth()->user()) -->
                <div class="card-body">
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descrição</th>
                                    <th>Opções</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tipos as $tipo)
                                <tr>
                                
                                    <td>{{$tipo->id}}</td>
                                    <td>{{$tipo->descricao}}</td>
                                   
                                    <td>
                                    @can('update',App\Models\Usuarios::class)
                                        <a href="{{route('tipo.editar',$tipo->id)}}"class="btn btn-warning">Editar</a>
                                        <a href="javascript: if(confirm('Realmente deseja deletar?')) { window.location.href = '{{ route ('tipo.deletar',$tipo->id)}}'}"class="btn btn-danger">Excluir</a>
                                    @endcan
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{route('tipo.adicionar')}}" class="btn btn-primary pull-left">Adicionar</a>
                        <div style="margin-top:10px;text-align: center ! important;"class="pull-right">
                            {!! $tipos->links()!!}
                        </div>
                        
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
