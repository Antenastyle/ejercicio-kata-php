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
}
