<?php

class VariacaoController {

    private $variacaoDAO;

    public function __construct() {
        $this->variacaoDAO = new VariacaoDAO();
    }

    public function Cadastrar(Variacao $variacao) {
        return $this->variacaoDAO->Cadastrar($variacao);
    }

    public function Atualizar(Variacao $variacao) {
        return $this->variacaoDAO->Atualizar($variacao);
    }

    public function ListarVariacao($inicio = null, $quantidade = null) {
        return $this->variacaoDAO->ListarVariacao($inicio, $quantidade);
    }
    
    public function todasVariacao() {
        return $this->variacaoDAO->todasVariacao();
    }

    public function Excluir($cod){
        return $this->variacaoDAO->Excluir($cod);
    }   
   
    
    public function retornaVariacao($cod) {
        return $this->variacaoDAO->retornaVariacao($cod);
    }

    public function RetornaQtdVariacao() {
        return $this->variacaoDAO->RetornaQtdVariacao();
    }

}
