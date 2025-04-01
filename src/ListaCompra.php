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
        $palabrasDeInstruccion = count($partesInstruccion);
        $cantidad = $this->cantidadDeObjetoIndicada($palabrasDeInstruccion) ? (int)$partesInstruccion[2] : 1;
        if ($partesInstruccion[0] == "añadir"){
            if ($this->existeObjetoEnListaCompra($objeto)) {
                $this->listaCompra[$objeto] += $cantidad;
            } else {
                $this->listaCompra[$objeto] = $cantidad;
            }
        } else if ($partesInstruccion[0] == "eliminar") {
            if ($this->existeObjetoEnListaCompra($objeto)) {
                unset($this->listaCompra[$objeto]);
            } else {
                return "El producto seleccionado no existe.";
            }
        } else if ($partesInstruccion[0] == "vaciar") {
            $this->listaCompra = [];
        }

        return $this->imprimirListaCompra();
    }

    private function existeObjetoEnListaCompra($objeto): bool {
        return array_key_exists($objeto, $this->listaCompra);
    }

    private function cantidadDeObjetoIndicada($palabrasDeInstruccion): bool {
        return !($palabrasDeInstruccion == 2);
    }

    private function imprimirListaCompra(): string {
        $listaCompraAImprimir = "";
        foreach ($this->listaCompra as $objeto => $cantidad) {
            $listaCompraAImprimir = $listaCompraAImprimir . "$objeto x$cantidad,";
        }

        return $listaCompraAImprimir;
    }
}
