@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Listagem Tipos Usuários') }}</div>

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
                                
                                    <td>{{$tipo->id_tipo}}</td>
                                    <td>{{$tipo->descricao}}</td>
                                   
                                    <td>
                                        <a href="#"class="btn btn-info">Visualizar</a>
                                        <a href="#"class="btn btn-warning">Editar</a>
                                        <a href="#"class="btn btn-danger">Excluir</a>
                                        
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
