<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Aulas;
use App\Models\Usuarios;
use App\Models\Agenda;
use App\Notifications\NotificaUsuario;
use Illuminate\Support\Facades\Notification;




class AgendaController extends Controller
{
    public function index()
    {   
        $agendas = DB::table('agendas')
        ->join('usuarios', 'agendas.usuario_id', '=', 'usuarios.id_usuario')
        ->join('aulas', 'agendas.aula_id', '=', 'aulas.id_aula')
        ->paginate(50);
        //var_dump($agendas);exit;
        
        return view('agenda.index',compact('agendas'));

       
    }

    public function confirmar($id)
    {   
        $agendas = DB::table('agendas')
        ->join('usuarios', 'agendas.usuario_id', '=', 'usuarios.id_usuario')
        ->join('aulas', 'agendas.aula_id', '=', 'aulas.id_aula')
        ->where('aula_id', $id)
        ->paginate(50);
        //var_dump($agendas);exit;
        
        return view('agenda.indexaula',compact('agendas'));

       
    }

    public function adicionar(){
        
        return view('agenda.adicionar');
    }

    public function agendar($id){
        
       
        $aulas = Aulas::find($id);  
        $id_usuario = auth()->user()->id_usuario;
        
        $dados = array(
            "aula_id" => $id,
            "usuario_id" =>$id_usuario,
            "status" => 1,
        );
        //$agenda = $dados['status'];
        //$agenda->notify(new NotificaUsuario ($agenda));
       // $agenda->notify(new NotificaUsuario($aulas));
        //Notification::send($agenda, new NotificaUsuario($agenda));
       
        $agenda = Agenda::create($dados);
        $id_aula = $agenda->aula_id;
        $aulas = Aulas::find($id_aula);
        $id_professor = $aulas->usuario_id;
        $usuario =   $usuarios = Usuarios::find($id_professor);
        
        $usuario->notify(new NotificaUsuario($usuario, $agenda));
        
        $agendas = DB::table('agendas')
        ->join('usuarios', 'agendas.usuario_id', '=', 'usuarios.id_usuario')
        ->join('aulas', 'agendas.aula_id', '=', 'aulas.id_aula')
        ->paginate(50);
        return view('agenda.index',compact('agendas'));
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
        
    //     $agendadados = DB::table('agendas')
    //     ->join('usuarios', 'agendas.usuario_id', '=', 'usuarios.id_usuario')
    //     ->join('aulas', 'agendas.aula_id', '=', 'aulas.id_aula')
    //     >where('id_agenda', $id)
    //     ->paginate(50);
    //    $materia = $agendadados->materia;
    //    var_dump($agendadados->status);exit;
        return view('agenda.agendarconf',compact('agendas'));
    
    
        
 function atualizar(Request $request, $id){
        
        $agendas = Agenda::find($id);
     
        $dados = $request->all();
       
       $agendas->update($dados);

        \Session::flash('flash_message',[
            'msg'=>"Registro atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('agenda');
      
       
    }

    function deletar($id){
        Agenda::find($id)->delete();

        \Session::flash('flash_message',[
            'msg'=>"Registro excluido com sucesso!",
            'class'=>"alert-success"
        ]);        return redirect()->route('agenda');
    }
}
}