<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Services\UserService;

class AuthUserController extends Controller
{
    /**
     * @param Request[$request]
     * @return void
     */
    public function authenticate(Request $request){

        $credentials = $request->validate([
            'login' => ['required'],
            'password' => ['required']
        ]);

        $auth = Auth::attempt($credentials);

        if($auth) {
            $request->session()->regenerate();

            return [ 'auth' => $auth ];
        }

        return [ 'auth' => $auth ];
    }


    /**
     * @param Request[$request]
     * @return void
     *
     */
     public function logout(Request $request)
     {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
     }

    /**
     * @return void
     */
    public function create(){
        $template = view('cliente.forms.cadastro_user');

        return $template;
    }
    /**
     * @param Request[$request]
     * @return void
     */
    public function store(Request $request) {
        $informacoesForm = $request->except(['_token']);
        $informacoesForm['is_super_user'] = 0;

        if((new UserService)->storeUser($informacoesForm)){

            $auth = Auth::attempt([
                'login' => $informacoesForm['login'],
                'password' => $informacoesForm['password'],
            ]);

            if($auth) {
                $request->session()->regenerate();

                return redirect('/');
            }
        }

        return back()->withErrors([
            'message' => 'informações de cadastro incorretas'
        ]);
    }


}
