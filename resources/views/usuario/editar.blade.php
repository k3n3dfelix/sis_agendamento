@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Editar Tipo') }}</div> -->

                <ol class="breadcrumb card-header ">
                    <li class="breadcrumb-item "><a href="{{ route('usuario') }}"> Usuários</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>

                <div class="card-body">
                    <form action="{{route('usuario.atualizar',$usuarios->id_usuario)}}" method="post">
                        {{csrf_field()}}
                        @method('PUT')
                        <div class="form-row">
                        <div class="form-group col-md-12 ">
                            <label for="nome">Tipo</label>
                            <select class="form-control" name="tipo_id">
                                @foreach($tipos as $tipo)
                                    <option value="{{$tipo->id}}" {{(isset($usuarios->tipo_id) && $usuarios->tipo_id == $tipo->id ? 'selected' : '')}} 
                                    > {{$tipo->descricao}}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="tipo_id">Tipo Usuário</label>
                                <input type="text" class="form-control" id="tipo_id" name="tipo_id" value="{{ isset($usuarios->tipo_id) ? $usuarios->tipo_id : ''}}">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="nome">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" value="{{ isset($usuarios->nome) ? $usuarios->nome : ''}}">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="sobrenome">Sobrenome</label>
                                <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="{{ isset($usuarios->sobrenome) ? $usuarios->sobrenome : ''}}">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="login">Login</label>
                                <input type="text" class="form-control" id="login" name="login" value="{{ isset($usuarios->login) ? $usuarios->login : ''}}">
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
