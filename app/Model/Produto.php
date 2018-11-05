<?php

require_once 'Categoria.php';
require_once 'Subcategoria.php';
require_once 'Variacao.php';

class Produto {

    private $cod;
    private $titulo;
    private $categoria;
    private $subcategoria;
    private $marca_do_produto;
    private $url;
    private $descricao;
    private $valor;
    private $valor_antigo;
    private $desconto;
    private $estoque;
    private $status;
    private $thumb;
    private $data;
    private $cod_ra;
    private $oferta;
    private $variacao;

    public function __construct() {
        $this->categoria = new Categoria();
        $this->subcategoria = new Subcategoria();
        $this->variacao = new Variacao();
    }

    function getCod() {
        return $this->cod;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getSubcategoria() {
        return $this->subcategoria;
    }

    function getUrl() {
        return $this->url;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getValor() {
        return $this->valor;
    }

    function getEstoque() {
        return $this->estoque;
    }

    function getStatus() {
        return $this->status;
    }

    function getThumb() {
        return $this->thumb;
    }

    function getData() {
        return $this->data;
    }

    function getCod_ra() {
        return $this->cod_ra;
    }

    function getOferta() {
        return $this->oferta;
    }

    function getVariacao() {
        return $this->variacao;
    }

    function getValor_antigo() {
        return $this->valor_antigo;
    }

    function getDesconto() {
        return $this->desconto;
    }

    function getMarca_do_produto() {
        return $this->marca_do_produto;
    }

    function setMarca_do_produto($marca_do_produto) {
        $this->marca_do_produto = $marca_do_produto;
    }

    function setValor_antigo($valor_antigo) {
        $this->valor_antigo = $valor_antigo;
    }

    function setDesconto($desconto) {
        $this->desconto = $desconto;
    }

    function setCod($cod) {
        $this->cod = $cod;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setSubcategoria($subcategoria) {
        $this->subcategoria = $subcategoria;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setEstoque($estoque) {
        $this->estoque = $estoque;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setThumb($thumb) {
        $this->thumb = $thumb;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setCod_ra($cod_ra) {
        $this->cod_ra = $cod_ra;
    }

    function setOferta($oferta) {
        $this->oferta = $oferta;
    }

    function setVariacao($variacao) {
        $this->variacao = $variacao;
    }

}
