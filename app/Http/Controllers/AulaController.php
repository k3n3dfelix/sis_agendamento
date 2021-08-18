<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Aulas;
use App\Models\Usuarios;
use App\Models\Agenda;

class AulaController extends Controller
{
    public function index()
    {   
       
        $aulas = DB::table('aulas')
        ->join('usuarios', 'aulas.usuario_id', '=', 'usuarios.id_usuario')
        
        ->paginate(10);;
        
        return view('aula.index',compact('aulas'));

       
    }

    public function professor()
    {   
        $id_usuario = auth()->user()->id_usuario;
        
        $aulas = DB::table('aulas')
        ->join('usuarios', 'aulas.usuario_id', '=', 'usuarios.id_usuario')
        ->where('usuario_id', $id_usuario)
        ->paginate(10);;
        
        return view('aula.index',compact('aulas'));

       
    }

    public function adicionar(){
        
        $tipos = DB::table('tipos')->paginate(10);;
        //dd($tipos);
      
        return view('aula.adicionar');
    }

    public function salvar(Request $request){
        
        $dados = $request->all();
        $aulas = Aulas::create($dados);
         \Session::flash('flash_message',[
            'msg'=>"Registro adicionado com sucesso!",
            'class'=>"alert-success"
        ]);
        return redirect()->route('aula.adicionar');
      
       
    }

    public function editar($id){
        
        $aulas = Aulas::find($id);
        
        
        return view('aula.editar', compact('aulas'));
      
       
    }

    public function atualizar(Request $request, $id){
        
        $aulas = Aulas::find($id);
     
        $dados = $request->all();
       
       $aulas->update($dados);

        \Session::flash('flash_message',[
            'msg'=>"Registro atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('aula');
      
       
    }

    public function deletar($id){
        Aulas::find($id)->delete();

        \Session::flash('flash_message',[
            'msg'=>"Registro excluido com sucesso!",
            'class'=>"alert-success"
        ]);        return redirect()->route('aula');
    }
}
