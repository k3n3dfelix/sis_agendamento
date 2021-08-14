@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listagem  Usuários') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tipo Usuário</th>
                                    <th>Nome</th>
                                    <th>Sobrenome</th>
                                    <th>Login</th>
                                   
                                    <th>Opções</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                <tr>
                                
                                    <td>{{$usuario->id}}</td>
                                    <td>{{$usuario->tipo_id}}</td>
                                    <td>{{$usuario->nome}}</td>
                                    <td>{{$usuario->sobrenome}}</t••••••••
                                        <a href="{{route('usuario.editar',$usuario->id)}}"class="btn btn-warning">Editar</a>
                                        <a href="javascript: if(confirm('Realmente deseja deletar?')) { window.location.href = '{{ route ('usuario.deletar',$usuario->id)}}'}"class="btn btn-danger">Excluir</a>
                                        
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{route('usuario.adicionar')}}" class="btn btn-primary pull-left">Adicionar</a>
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
