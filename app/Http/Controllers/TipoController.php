<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Ferragem;

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
        $tipos = DB::table('tipos')->paginate(10);;
        return view('tipo.index',compact('tipos'));

       
    }

    public function adicionar(){
        
      
      
        return view('tipo.adicionar');
    }

  

    public function salvar(Request $request){
        
        $dados = $request->all();
        $tipos = Tipos::create($dados);
         \Session::flash('flash_message',[
            'msg'=>"Tipo adicionado com sucesso!",
            'class'=>"alert-success"
        ]);
        return redirect()->route('tipo.adicionar');
      
       
    }
}
