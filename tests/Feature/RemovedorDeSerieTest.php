<?php

namespace Tests\Feature;

use App\Services\CriadordeSerie;
use App\Services\ExclusorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemovedorDeSerieTest extends TestCase
{
    use RefreshDatabase;
    private $serie;

    protected function setUp(): void
    {
        parent::setUp();
        $criadorDeSerie = new CriadordeSerie();
        $this->serie = $criadorDeSerie->criarSerie('Nome da Serie', 1, 1);

    }

    public function testeRemoverUmaSerie()
    {
        $this->assertDatabaseHas('series', ['id'=>$this->serie->id]);
        $exclusorDeSerie = new ExclusorDeSerie();
        $nomeSerie = $exclusorDeSerie->excluirSerie($this->serie->id);

        $this->assertIsString($nomeSerie);
        $this->assertEquals('Nome da Serie', $this->serie->nome);

        $this->assertDatabaseMissing('series', ['id'=> $this->serie->id]);
    }
}
