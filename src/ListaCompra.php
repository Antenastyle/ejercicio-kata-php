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
        if ($partesInstruccion[0] == "añadir"){
            if (array_key_exists(strtolower($partesInstruccion[1]), $this->listaCompra)) {
                if (count($partesInstruccion) == 2) {
                    $this->listaCompra[strtolower($partesInstruccion[1])] += 1;
                } else {
                    $this->listaCompra[strtolower($partesInstruccion[1])] += (int)$partesInstruccion[2];
                }
            } else {
                if (count($partesInstruccion) == 2) {
                    $this->listaCompra[strtolower($partesInstruccion[1])] = 1;
                } else {
                    $this->listaCompra[strtolower($partesInstruccion[1])] = (int)$partesInstruccion[2];
                }
            }
        } else if ($partesInstruccion[0] == "eliminar") {
            if (array_key_exists(strtolower($partesInstruccion[1]), $this->listaCompra)) {
                unset($this->listaCompra[strtolower($partesInstruccion[1])]);
            } else {
                return "El producto seleccionado no existe.";
            }
        } else if ($partesInstruccion[0] == "vaciar") {
            $this->listaCompra = [];
        }
        $lista = "";
        foreach ($this->listaCompra as $item => $value) {
            $lista = $lista . "$item x$value,";
        }
        return $lista;
    }
}
