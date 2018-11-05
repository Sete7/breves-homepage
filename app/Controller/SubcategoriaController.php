<?php

//if (file_exists('../../DAL/SubcategoriaDAO.php')):
//    require_once '../../DAL/SubcategoriaDAO.php';
//elseif (file_exists('../DAL/SubcategoriaDAO.php')):
//    require_once '../DAL/SubcategoriaDAO.php';
//else:
//    require_once 'DAL/SubcategoriaDAO.php';
//endif;

class SubcategoriaController {
    private $subcategoriaDAO;
    
    public function __construct() {
        $this->subcategoriaDAO = new SubcategoriaDAO();
    }
    
    public function Cadastrar(Subcategoria $subcategoria){
        
        if(strlen($subcategoria->getSub_titulo()) > 3 && strlen($subcategoria->getSub_status()) > 0 && strlen($subcategoria->getSub_status()) <=3):
            return $this->subcategoriaDAO->Cadastrar($subcategoria);
        else:
            return false;
        endif;
    }
    public function Atualizar(Subcategoria $subcategoria) {
        if(strlen($subcategoria->getSub_titulo()) > 3 && strlen($subcategoria->getSub_status()) > 0 && strlen($subcategoria->getSub_status()) <=3):
            return $this->subcategoriaDAO->Atualizar($subcategoria);
        else:
            return false;
        endif;
    }
    
    public function ListarSubcategoria($inicio = null, $quantidade = null) {
        return $this->subcategoriaDAO->ListarSubcategoria($inicio, $quantidade);
    }
    public function ListarTodasSubcategorias() {
        return $this->subcategoriaDAO->ListarTodasSubcategorias();
    }
    
    public function retornaSubcategoria($cod){
        return $this->subcategoriaDAO->retornaSubcategoria($cod);
    }
    
    public function Excluir($cod){
        return $this->subcategoriaDAO->Excluir($cod);
    } 
    
    //retorna uma lista de subcategoria quando existe $cod
    public function listarSub($cod){
        return $this->subcategoriaDAO->listarSub($cod);
    }
    
    public function RetornaQtdSubcategoria() {
        return $this->subcategoriaDAO->RetornaQtdSubcategoria();
    }
}
