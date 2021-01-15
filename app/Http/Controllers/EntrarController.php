<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('entrar.index');
    }

    public function enter(Request $request)
    {
        if(!Auth::attempt($request->only(['email', 'password'])))
        {
            return redirect()
                    ->back()
                    ->withErrors('Usuário e/ou senha incorretos');
        }
        return redirect()->route('listar_series');
    }
}