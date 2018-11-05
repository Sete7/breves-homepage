<?php
require_once 'Banco.php';

class SubcategoriaDAO {

    private $debug;
    private $pdo;

    public function __construct() {
        $this->pdo = new Banco();
        $this->debug = true;
    }

    public function Cadastrar(Subcategoria $subcategoria) {
        try {
            $sql = "INSERT INTO subcategoria (sub_titulo,sub_url,sub_descricao,sub_status,categoria) VALUES (:titulo,:url,:descricao,:status,:cod_categoria)";
//            $sql = "INSERT INTO subcategoria (titulo,url,descricao,status,cod_categoria) VALUES (:titulo,:url,:descricao,:status,:cod_categoria)";;
            $param = array(
                ":titulo" => $subcategoria->getSub_titulo(),
                ":url" => $subcategoria->getSub_url(),
                ":descricao" => $subcategoria->getSub_descricao(),
                ":status" => $subcategoria->getSub_status(),
                ":cod_categoria" => $subcategoria->getCategoria()
//                        
            );
            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    public function Atualizar(Subcategoria $subcategoria) {
        try {
            $sql = "UPDATE subcategoria SET sub_titulo = :titulo, sub_url = :url, sub_descricao = :descricao, sub_status = :status, categoria = :categoria WHERE sub_cod = :cod";
            $param = array(
                ":cod" => $subcategoria->getSub_cod(),
                ":titulo" => $subcategoria->getSub_titulo(),
                ":url" => $subcategoria->getSub_url(),
                ":descricao" => $subcategoria->getSub_descricao(),
                ":status" => $subcategoria->getSub_status(),                
                ":categoria" => $subcategoria->getCategoria()
            );

            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    public function ListarSubcategoria($inicio = null, $quantidade = null) {
        try {
            $sql = "SELECT c.cod, c.titulo, s.sub_cod, s.sub_titulo, s.sub_status, s.sub_descricao, s.sub_url, s.categoria "
                    . "FROM categoria c INNER JOIN subcategoria s ON c.cod = s.categoria ORDER BY s.sub_cod DESC LIMIT :inicio, :quantidade";
            $param = array(
                ":inicio" =>  $inicio,
                ":quantidade" => $quantidade                
            );
            
            $dt = $this->pdo->ExecuteQuery($sql, $param);
            $listarSubCategoria = [];
            foreach ($dt as $pt) {
                $subCategoria = new Subcategoria();
                $subCategoria->setSub_cod($pt['sub_cod']);
                $subCategoria->setSub_titulo($pt['sub_titulo']);
                $subCategoria->setSub_status($pt['sub_status']);
                $subCategoria->setSub_descricao($pt['sub_descricao']);
                $subCategoria->setSub_url($pt['sub_url']);
                $subCategoria->getCategoria()->setTitulo($pt['titulo']);

                $listarSubCategoria[] = $subCategoria;
            }
            return $listarSubCategoria;
        } catch (Exception $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    public function ListarTodasSubcategorias() {
        try {
            $sql = "SELECT c.cod, c.titulo, s.sub_cod, s.sub_titulo, s.sub_status, s.sub_descricao, s.sub_url, s.categoria "
                    . "FROM categoria c INNER JOIN subcategoria s ON c.cod = s.categoria WHERE status = 1 ORDER BY s.sub_cod DESC";
            $dt = $this->pdo->ExecuteQuery($sql);
            $listarSubCategoria = [];
            foreach ($dt as $pt) {
                $subCategoria = new Subcategoria();
                $subCategoria->setSub_cod($pt['sub_cod']);
                $subCategoria->setSub_titulo($pt['sub_titulo']);
                $subCategoria->setSub_status($pt['sub_status']);
                $subCategoria->setSub_descricao($pt['sub_descricao']);
                $subCategoria->setSub_url($pt['sub_url']);
                $subCategoria->getCategoria()->setCod($pt['cod']);
                $subCategoria->getCategoria()->setTitulo($pt['titulo']);

                $listarSubCategoria[] = $subCategoria;
            }
            return $listarSubCategoria;
        } catch (Exception $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //retorna um registro de subcategoria
    public function retornaSubcategoria($cod){
        try {
            
            $sql = "SELECT s.sub_cod, s.sub_titulo, s.sub_url, s.sub_descricao, s.sub_status, s.categoria, c.cod, c.titulo FROM subcategoria s INNER JOIN categoria c ON s.categoria = c.cod WHERE sub_cod = :cod";
            $param = array(":cod" => $cod);
            
            $dt = $this->pdo->ExecuteQueryOneRow($sql, $param);
            
            $subcategoria = new Subcategoria();
            $subcategoria->setSub_cod($dt['sub_cod']);
            $subcategoria->setSub_titulo($dt['sub_titulo']);
            $subcategoria->setSub_url($dt['sub_url']);
            $subcategoria->setSub_descricao($dt['sub_descricao']);
            $subcategoria->setSub_status($dt['sub_status']);                           
            
            $subcategoria->getCategoria()->setCod($dt['cod']);  
            $subcategoria->getCategoria()->setTitulo($dt['titulo']);  
            
            return $subcategoria;
            
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    public function Excluir($cod) {
        try {
            $sql = "DELETE FROM subcategoria WHERE sub_cod = :cod";
            $param = array(":cod" => $cod);
            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (Exception $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    //retorna uma lista de subcategoria quando existe $cod
    public function listarSub($cod){
        try {
            //$sql = "SELECT s.sub_cod, s.sub_titulo, s.sub_url, s.sub_descricao, s.sub_status, s.sub_data, s.categoria_cod, c.categoria_cod, c.categoria_nome FROM tb_subcategorias s INNER JOIN tb_categorias c ON s.categoria_cod = c.categoria_cod WHERE s.categoria_cod = :cod";
            $sql = "SELECT * FROM subcategoria WHERE categoria = :cod";
            $param = array(":cod" => $cod);            
            $dt = $this->pdo->ExecuteQuery($sql, $param);       
            
            $listaSubcategoria = [];
            
            foreach ($dt as $sb):
                $subcategoria = new Subcategoria();
                $subcategoria->setSub_cod($sb['sub_cod']);
                $subcategoria->setSub_titulo($sb['sub_titulo']);
                $subcategoria->setSub_url($sb['sub_url']);
                $subcategoria->setSub_descricao($sb['sub_descricao']);
                $subcategoria->setSub_status($sb['sub_status']);                        
                $subcategoria->setCategoria($sb['categoria']);          
                $listaSubcategoria[] = $subcategoria;
            endforeach;
            
            return $listaSubcategoria;
            
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    public function RetornaQtdSubcategoria() {
        try {
            $sql = "SELECT count(s.sub_cod) as total FROM subcategoria s";
            $dr = $this->pdo->ExecuteQueryOneRow($sql);
            if ($dr["total"] != null):
                return $dr["total"];
            else:
                return 0;
            endif;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

}
