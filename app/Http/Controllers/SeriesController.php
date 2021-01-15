<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\CriadordeSerie;
use App\Services\ExclusorDeSerie;
use App\Temporada;
use Illuminate\Http\Request;

class SeriesController extends Controller{   
    public function index(Request $request){
        $series = Serie::query()
        ->orderBy('nome')
        ->get();
        
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create(){
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadordeSerie $criadordeSerie){
        $serie = $criadordeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

        $request->session()
        ->flash(
            'mensagem',
            "A serie {$serie->nome} e suas temporadas e episódios criadas com sucesso"
        );
        return redirect()->route('listar_series');
    }

    public function destroy(Request $request, ExclusorDeSerie $exclusorDeSerie){
        $nomeSerie = $exclusorDeSerie->excluirSerie($request->id);        

        $request->session()
        ->flash(
            'mensagem',
            "Serie \"$nomeSerie\" removida com sucesso"
        );
        return redirect()->route('listar_series');
    }

    public function update(int $id, Request $request){
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;

        $serie->save();
    }
}