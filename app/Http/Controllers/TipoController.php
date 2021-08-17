<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tipos;

class TipoController extends Controller
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
        $tipos = DB::table('tipos')->paginate(5);;
        return view('tipo.index',compact('tipos'));

       
    }

    public function adicionar(){
        
      
      
        return view('tipo.adicionar');
    }

    public function salvar(Request $request){
        
        $dados = $request->all();
        $tipos = Tipos::create($dados);
         \Session::flash('flash_message',[
            'msg'=>"Registro adicionado com sucesso!",
            'class'=>"alert-success"
        ]);
        return redirect()->route('tipo.adicionar');
      
       
    }

    public function editar($id){
        
        $tipos = Tipos::find($id);
        
        return view('tipo.editar', compact('tipos'));
      
       
    }

    public function atualizar(Request $request, $id){
        
        $tipos = Tipos::find($id);
      
        $dados = $request->all();
       
       $tipos->update($dados);

        \Session::flash('flash_message',[
            'msg'=>"Registro atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('tipo');
      
       
    }

    public function deletar($id){
        Tipos::find($id)->delete();

        \Session::flash('flash_message',[
            'msg'=>"Registro excluido com sucesso!",
            'class'=>"alert-success"
        ]);        return redirect()->route('tipo');
    }
}
