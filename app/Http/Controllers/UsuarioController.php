<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    // public function register(Request $request){

    //     $request->validate([
    //         'name'=> 'required',
    //         'apellidos'=> 'required',
    //         'documento'=> 'required',
    //         'password'=> 'required',
    //     ]);

    //     $user = new User();
    //     $user->name = $request->get('name');
    //     $user->apellidos = $request->get('apellidos');
    //     $user->documento = $request->get('documento');
    //     $user->password = Hash::make($request->get('password'));

    //     $user->save();

    //     Auth::login($user);

    //     return redirect(route('inicioAdmin'));

    // }

    public function login(Request $request, SessionManager $sessionManager){

        $request->validate([
            'documento'=> 'required',
            'password'=> 'required'
        ]);

        $credentials = [
            'documento' => $request->documento,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){

            $request->session()->regenerate();
            return redirect()->intended(route('inicioAdmin'));

        }else{

	        return redirect(route('loginAdministrador'))->with('error', 'Este usuario no existe');

        }

    }

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect(route('loginAdministrador'));

    }

    public function desacarga()
    {
        return Storage::download('Formato_Compromiso_del_Aprendiz.docx');
    }
}
