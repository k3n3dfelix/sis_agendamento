<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuarios;

class UsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $usuarios = DB::table('usuarios')->paginate(10);;
        
        return view('usuario.index',compact('usuarios'));

       
    }

    public function adicionar(){
        
      
      
        return view('usuario.adicionar');
    }

    public function salvar(Request $request){
        
        $dados = $request->all();
        $usuarios = Usuarios::create($dados);
         \Session::flash('flash_message',[
            'msg'=>"Registro adicionado com sucesso!",
            'class'=>"alert-success"
        ]);
        return redirect()->route('usuario.adicionar');
      
       
    }

    public function editar($id){
        
        $usuarios = Usuarios::find($id);
        
        return view('usuario.editar', compact('usuarios'));
      
       
    }

    public function atualizar(Request $request, $id){
        
        $usuarios = Usuarios::find($id);
      
        $dados = $request->all();
       
       $usuarios->update($dados);

        \Session::flash('flash_message',[
            'msg'=>"Registro atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('tipo');
      
       
    }

    public function deletar($id){
        Usuarios::find($id)->delete();

        \Session::flash('flash_message',[
            'msg'=>"Registro excluido com sucesso!",
            'class'=>"alert-success"
        ]);        return redirect()->route('usuario');
    }
}
