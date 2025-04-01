<?php

namespace Deg540\EjercicioKataPHP;

class ListaCompra
{
    private array $listaCompra = [];

    public function __construct() {
        $this->listaCompra = array();
    }

    public function ejecutarInstruccion(string $instruccion): string {
        $items = explode(" ", $instruccion);
        if ($items[0] == "añadir"){
            if (array_key_exists(strtolower($items[1]), $this->listaCompra)) {
                if (count($items) == 2) {
                    $this->listaCompra[strtolower($items[1])] += 1;
                } else {
                    $this->listaCompra[strtolower($items[1])] += (int)$items[2];
                }
            } else {
                if (count($items) == 2) {
                    $this->listaCompra[strtolower($items[1])] = 1;
                } else {
                    $this->listaCompra[strtolower($items[1])] = (int)$items[2];
                }
            }
        } else if ($items[0] == "eliminar") {
            if (array_key_exists(strtolower($items[1]), $this->listaCompra)) {
                unset($this->listaCompra[strtolower($items[1])]);
            } else {
                return "El producto seleccionado no existe.";
            }
        } else if ($items[0] == "vaciar") {
            $this->listaCompra = [];
        }
        $lista = "";
        foreach ($this->listaCompra as $item => $value) {
            $lista = $lista . "$item x$value,";
        }
        return $lista;
    }
}
