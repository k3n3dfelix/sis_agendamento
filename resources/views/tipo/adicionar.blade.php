@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!--<div class="card-header">{{ __('Adicionar Tipo Usuário') }}</div> -->
                
                <ol class="breadcrumb card-header ">
                    <li class="breadcrumb-item "><a href="{{ route('tipo') }}">Tipos Usuários</a></li>
                    <li class="breadcrumb-item active">Adicionar</li>
                </ol>

                <div class="card-body">
                    <form action="{{route('tipo.salvar')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-row">
                            <div class="form-group col-md-12 ">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao">
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
