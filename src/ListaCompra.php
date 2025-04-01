<?php

namespace Deg540\EjercicioKataPHP;

class ListaCompra
{
    private array $listaCompra = [];

    public function __construct() {
        $this->listaCompra = array();
    }

    public function ejecutarInstruccion(string $instruccion): string {
        $partesInstruccion = explode(" ", $instruccion);
        $objeto = strtolower($partesInstruccion[1]);
        if ($partesInstruccion[0] == "añadir"){
            if (array_key_exists($objeto, $this->listaCompra)) {
                if (count($partesInstruccion) == 2) {
                    $this->listaCompra[$objeto] += 1;
                } else {
                    $this->listaCompra[$objeto] += (int)$partesInstruccion[2];
                }
            } else {
                if (count($partesInstruccion) == 2) {
                    $this->listaCompra[$objeto] = 1;
                } else {
                    $this->listaCompra[$objeto] = (int)$partesInstruccion[2];
                }
            }
        } else if ($partesInstruccion[0] == "eliminar") {
            if (array_key_exists($objeto, $this->listaCompra)) {
                unset($this->listaCompra[$objeto]);
            } else {
                return "El producto seleccionado no existe.";
            }
        } else if ($partesInstruccion[0] == "vaciar") {
            $this->listaCompra = [];
        }

        return $this->imprimirListaCompra();
    }

    private function imprimirListaCompra(): string {
        $listaCompraAImprimir = "";
        foreach ($this->listaCompra as $objeto => $cantidad) {
            $listaCompraAImprimir = $listaCompraAImprimir . "$objeto x$cantidad,";
        }

        return $listaCompraAImprimir;
    }
}
