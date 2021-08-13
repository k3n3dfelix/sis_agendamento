@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">{{ __('Editar Tipo') }}</div> -->

                <ol class="breadcrumb card-header ">
                    <li class="breadcrumb-item "><a href="{{ route('tipo') }}">Tipos Usuários</a></li>
                    <li class="breadcrumb-item active">Editar</li>
                </ol>

                <div class="card-body">
                    <form action="{{route('tipo.atualizar',$tipos->id)}}" method="post">
                        {{csrf_field()}}
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-12 ">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao" value="{{ isset($tipos->descricao) ? $tipos->descricao : ''}}">
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
