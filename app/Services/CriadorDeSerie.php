<?php

namespace App\Services;

use App\Serie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CriadordeSerie{
    public function criarSerie(
        string $nomeSerie,
        int $qtdTemporadas,
        int $epPorTemporadas
    ): Serie{
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie]);
        $this->criarTemporadas($serie, $qtdTemporadas, $epPorTemporadas);
        DB::commit();
        return $serie;
    }

    private function criarTemporadas(Serie $serie, int $qtdTemporadas, int $epPorTemporadas)
    {
        for($i = 1; $i <= $qtdTemporadas; $i++){
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criarEpisodios($epPorTemporadas, $temporada);
        }

    }

    private function criarEpisodios(int $epPorTemporadas, Model $temporada):void{
        for($j = 1; $j <= $epPorTemporadas; $j++){
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
