<?php


class Variacao {
    private $cod_variavel;
    private $titulo_variavel;
    private $status_variavel;
    
    function getCod_variavel() {
        return $this->cod_variavel;
    }

    function getTitulo_variavel() {
        return $this->titulo_variavel;
    }

    function getStatus_variavel() {
        return $this->status_variavel;
    }

    function setCod_variavel($cod_variavel) {
        $this->cod_variavel = $cod_variavel;
    }

    function setTitulo_variavel($titulo_variavel) {
        $this->titulo_variavel = $titulo_variavel;
    }

    function setStatus_variavel($status_variavel) {
        $this->status_variavel = $status_variavel;
    }
}
