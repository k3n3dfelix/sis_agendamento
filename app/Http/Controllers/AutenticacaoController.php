<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Contracts\Auth\Authenticatable;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use App\Models\Agenda;
use App\Models\Usuarios;
use App\Models\User;

class AutenticacaoController extends Controller

 /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

{
    public function index(){

    // public const HOME = '/admin';
    //$user = Auth::user();dd($user);
    
   

      $agenda = Agenda::find(32);
      //$agenda = DB::table('agendas')->get();
    
       foreach($agenda->unreadNotifications as $notification){
           echo $notification;
       }

        return view('paineladm');
    
        return redirect()->route('login');   
    }

    public function login(){
            return view('login'); 
    }

    public function logindo(Request $request){

    

       
        $dados = $request->all();
     
        //dd($dados);
       /* $credentials = ([
            'login' => $request->login,
            'senha' => $request->password
        ]);*/

       
       // $user = Auth::attempt($request->only("login","senha"));
        //dd($user);exit;
            
        

        $login = $dados['login'];
        $senha = $dados['senha'];
        
        $usuario = Usuarios::where('login',$login)->first(); 
       
        if(Auth::check() || ($usuario && Hash::check($senha,$usuario->senha))){
            //echo "ok";exit;
            //$usuarios = Usuarios::find($id);

            //$id = Auth::id($usuario->id_usuario);
            //dd($id);
            Auth::login($usuario);
            $request->session()->regenerate();
            return redirect()->intended('paineladm'); 
           
        }else{
             return redirect()->route('login');  
        };
        
        
        //if(Auth::attempt($request->only("email","password")))
        //if(Auth::attempt($credentials))

        //{

            //$request->session()->regenerate();
            //dd($request);
       // $_SESSION = $usuario;  
       // dd($_SESSION);
        //$id= $_SESSION->id;
        //$usuario = Usuarios::find($id);
        //$user = Auth::login($usuario);
        //return redirect()->intended('paineladm');
          // return view('paineladm');
        
          //}else{
            //return redirect()->route('login');  
        //}

       
       //Auth::attempt($dados);
        //return view('paineladm');
        
            
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');  

}
}