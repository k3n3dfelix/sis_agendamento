<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Contracts\Auth\Authenticatable;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\Usuarios;

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
    
    if(Auth::check() === true ){
        return view('paineladm');
    }
        return redirect()->route('login');   
    }

    public function login(){
            return view('login'); 
    }

    public function logindo(Request $request){

        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required'],
        ]);

       
        /*$dados = $request->all();
        
        $login = $dados['email'];
        $senha = $dados['password'];
        
        $usuario = Usuarios::where('login',$login)->first(); */

        //if(Auth::check() || ($usuario && Hash::check($senha,$usuario->senha)))
        //if(Auth::attempt($request->only("email","password")))
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            dd($request);
       // $_SESSION = $usuario;  
       // dd($_SESSION);
        //$id= $_SESSION->id;
        //$usuario = Usuarios::find($id);
        //$user = Auth::login($usuario);
        return redirect()->intended('paineladm');
           // return view('paineladm');
        }else{
            return redirect()->route('login');  
        }

       
       //Auth::attempt($dados);
        return view('paineladm');
        
            
    }
}
