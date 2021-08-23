<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Aulas;
use App\Models\Usuarios;
use App\Models\Agenda;
use App\Notifications\NotificaUsuario;
use App\Notifications\NotificaAluno;
use Illuminate\Support\Facades\Notification;




class AgendaController extends Controller
{
    public function index()
    {   
        $id_usuario = auth()->user()->id_usuario;
        $agendas = DB::table('agendas')
        ->join('usuarios', 'agendas.usuario_id', '=', 'usuarios.id_usuario')
        ->join('aulas', 'agendas.aula_id', '=', 'aulas.id_aula')
        ->where('aulas.usuario_id', $id_usuario)
        ->paginate(50);
        //var_dump($agendas);exit;
        
        return view('agenda.index',compact('agendas'));

       
    }

    public function agendageral()
    {   
        $id_usuario = auth()->user()->id_usuario;
        $agendas = DB::table('agendas')
        ->join('usuarios', 'agendas.usuario_id', '=', 'usuarios.id_usuario')
        ->join('aulas', 'agendas.aula_id', '=', 'aulas.id_aula')
        ->paginate(100);
        //var_dump($agendas);exit;
        
        return view('agenda.agendageral',compact('agendas'));

       
    }

    public function agendaaluno()
    {   
        $id_usuario = auth()->user()->id_usuario;
        $agendas = DB::table('agendas')
        ->join('usuarios', 'agendas.usuario_id', '=', 'usuarios.id_usuario')
        ->join('aulas', 'agendas.aula_id', '=', 'aulas.id_aula')
        ->where('id_usuario', $id_usuario)
        ->paginate(50);
        //var_dump($agendas);exit;
        
        return view('agenda.indexaluno',compact('agendas'));

       
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
        $id_aluno = $agenda->usuario_id;
        $usuario =   $usuarios = Usuarios::find($id_aluno);
        
        $usuario->notify(new NotificaUsuario($usuario, $agenda));
        
        $agendas = DB::table('agendas')
        ->join('usuarios', 'agendas.usuario_id', '=', 'usuarios.id_usuario')
        ->join('aulas', 'agendas.aula_id', '=', 'aulas.id_aula')
        ->paginate(100);
        return view('agenda.indexaluno',compact('agendas'));
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
    return view('agenda.editar', compact('agendas'));
    }

    public function editaraluno($id){
        
        $agendas = Agenda::find($id);
        
    //     $agendadados = DB::table('agendas')
    //     ->join('usuarios', 'agendas.usuario_id', '=', 'usuarios.id_usuario')
    //     ->join('aulas', 'agendas.aula_id', '=', 'aulas.id_aula')
    //     >where('id_agenda', $id)
    //     ->paginate(50);
    //    $materia = $agendadados->materia;
    //    var_dump($agendadados->status);exit;
    return view('agenda.editaraluno', compact('agendas'));
    }
    
    
        
 public function atualizar(Request $request, $id){
        
        $agendas = Agenda::find($id);
     
        $dados = $request->all();
       
       $agendas->update($dados);

       $id_usuario = auth()->user()->id_usuario;
       $id_aula = $agendas->aula_id;
        $aulas = Aulas::find($id_aula);
        $id_professor = $aulas->usuario_id;
        $usuario =   $usuarios = Usuarios::find($id_professor);
        
        $usuario->notify(new NotificaAluno($usuario, $agendas));

        \Session::flash('flash_message',[
            'msg'=>"Registro atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('agenda');
      
       
    }

    public function atualizaraluno(Request $request, $id){
        
        $agendas = Agenda::find($id);
     
        $dados = $request->all();
       
       $agendas->update($dados);

        \Session::flash('flash_message',[
            'msg'=>"Registro atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('agendaaluno');
      
       
    }

    public function deletar($id){
        Agenda::find($id)->delete();

        \Session::flash('flash_message',[
            'msg'=>"Registro excluido com sucesso!",
            'class'=>"alert-success"
        ]);        return redirect()->route('agenda');
    }
}
