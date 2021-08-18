@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!--<div class="card-header">{{ __('Adicionar Tipo Usuário') }}</div> -->
                
                <ol class="breadcrumb card-header ">
                    <li class="breadcrumb-item "><a href="{{ route('aula') }}"> Aulas</a></li>
                    <li class="breadcrumb-item active">Adicionar</li>
                </ol>
                @php
                $usuario_id = auth()->user()->id_usuario;
                @endphp
                <div class="card-body">
                    <form action="{{route('aula.salvar')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-row">
                            <!-- <div class="form-group col-md-12 ">
                                <label for="descricao">Descrição</label>
                                <input type="text" class="form-control" id="descricao" name="descricao">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="id_tipo_usuario">Tipo Usuário</label>
                                <input type="text" class="form-control" id="id_tipo_usuario" name="id_tipo_usuario">
                            </div> -->
                            <div class="form-group col-md-12 ">
                                
                                <input type="hidden" class="form-control" id="usuario_id" name="usuario_id" value="{{$usuario_id}}">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="nome">Materia</label>
                                <input type="text" class="form-control" id="materia" name="materia">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="descricao">Data</label>
                                <input type="text" class="form-control" id="data" name="data">
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="login">Hora</label>
                                <input type="text" class="form-control" id="hora" name="hora">
                            </div>
                            
                            
                        </div>
 
                        <button type="submit" class="btn btn-success float-right">Cadastrar</button>
                    </form>

                   
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
