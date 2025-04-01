<?php

namespace Deg540\EjercicioKataPHP\Test;

use Deg540\EjercicioKataPHP\ListaCompra;
use PHPUnit\Framework\TestCase;

class ListaCompraTest extends TestCase
{
    private ListaCompra $listaCompra;

    protected function setUp(): void
    {
        parent::setUp();
        $this->listaCompra = new ListaCompra();
    }

    /**
     * @test
     */
    public function givenAñadirPanReturnsTheItemInTheList(): void
    {
        $this->assertEquals('pan x1,', $this->listaCompra->ejecutarInstruccion("añadir pan"));
    }

    /**
     * @test
     */
    public function givenAñadirPan2ReturnsTheItemInTheList(): void
    {
        $this->assertEquals('pan x2,', $this->listaCompra->ejecutarInstruccion("añadir pan 2"));
    }
}
