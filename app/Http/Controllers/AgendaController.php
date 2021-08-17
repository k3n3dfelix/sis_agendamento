<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Aulas;
use App\Models\Usuarios;
use App\Models\Agenda;



class AgendaController extends Controller
{
    public function index()
    {   
        $agendas = DB::table('agendas')->paginate(10);;
        
        return view('agenda.index',compact('agendas'));

       
    }

    public function adicionar(){
        
        return view('agenda.adicionar');
    }

    public function agendar($id){
        
        $aulas = Aulas::find($id);
        
        return view('agenda.agendarconf',compact('aulas'));
    }

    public function salvar(Request $request){
        
        $dados = $request->all();
        $agendas = Agenda::create($dados);
         \Session::flash('flash_message',[
            'msg'=>"Registro adicionado com sucesso!",
            'class'=>"alert-success"
        ]);
        return redirect()->route('agenda.adicionar');
      
       
    }

    public function editar($id){
        
        $agendas = Agenda::find($id);
        
        
        return view('agenda.editar', compact('agendas'));
      
       
    }

    public function atualizar(Request $request, $id){
        
        $agendas = Agenda::find($id);
     
        $dados = $request->all();
       
       $agendas->update($dados);

        \Session::flash('flash_message',[
            'msg'=>"Registro atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('agenda');
      
       
    }

    public function deletar($id){
        Agenda::find($id)->delete();

        \Session::flash('flash_message',[
            'msg'=>"Registro excluido com sucesso!",
            'class'=>"alert-success"
        ]);        return redirect()->route('agenda');
    }
}
