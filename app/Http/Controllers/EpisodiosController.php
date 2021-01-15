<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Serie;
use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Temporada $temporada, Request $request)
    {
        $episodios = $temporada->episodios;
        $temporadaId = $temporada->id;
        $mensagem = $request->session()->get('mensagem');
        return view('episodios.index', compact('episodios', 'temporadaId', 'mensagem'));
    }

    public function store(Temporada $temporada, Request $request)
    {
        $episodiosAssistidos = $request->episodios;
        $temporada->episodios->each(function(Episodio $episodio) 
            use ($episodiosAssistidos){
                $episodio->assistido = in_array(
                    $episodio->id,
                    $episodiosAssistidos
                );
            }
        );

        $temporada->push();
        $request->session()->flash('mensagem', 'Episodios marcados com sucesso!');
        return redirect()->route('listar_series');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
