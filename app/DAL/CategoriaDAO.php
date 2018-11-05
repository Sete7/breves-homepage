<?php
require_once 'Banco.php';

class CategoriaDAO {

    private $debug;
    private $pdo;

    public function __construct() {
        $this->pdo = new Banco();
        $this->debug = true;
    }

    public function Cadastrar(Categoria $categoria) {
        try {
            $sql = "INSERT INTO categoria (titulo, url, descricao, status, data) VALUES(:titulo, :url, :descricao, :status, :data)";
            $param = array(
                ":titulo" => $categoria->getTitulo(),
                ":url" => $categoria->getUrl(),
                ":descricao" => $categoria->getDescricao(),
                ":status" => $categoria->getStatus(),
                ":data" => $categoria->getData()
            );
            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (Exception $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    public function ListarCategoria($inicio = null, $quantidade = null) {
        try {
            $sql = "SELECT * FROM categoria ORDER BY cod DESC LIMIT :inicio, :quantidade";
            $param = array(
                ":inicio" =>  $inicio,
                ":quantidade" => $quantidade                
            );
            $dt = $this->pdo->ExecuteQuery($sql, $param);
            
            $listaCat = [];
            
            foreach ($dt as $pts) {
                $categoria = new Categoria();
                $categoria->setCod($pts['cod']);
                $categoria->setTitulo($pts['titulo']);
                $categoria->setDescricao($pts['descricao']);
                $categoria->setStatus($pts['status']);
                $categoria->setData($pts['data']);
                $categoria->setUrl($pts['url']);             

                $listaCat[] = $categoria;
            }
            return $listaCat;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    public function ListarTodasCategorias($inicio = null, $quantidade = null) {
        try {
            $sql = "SELECT * FROM categoria WHERE status = 1 ORDER BY cod ASC LIMIT :inicio, :quantidade";
            $param = array(
                ":inicio" =>  $inicio,
                ":quantidade" => $quantidade                
            );
            $dt = $this->pdo->ExecuteQuery($sql, $param);
            
            $listaCat = [];
            
            foreach ($dt as $pts) {
                $categoria = new Categoria();
                $categoria->setCod($pts['cod']);
                $categoria->setTitulo($pts['titulo']);
                $categoria->setDescricao($pts['descricao']);
                $categoria->setStatus($pts['status']);
                $categoria->setData($pts['data']);
                $categoria->setUrl($pts['url']);               

                $listaCat[] = $categoria;
            }
            return $listaCat;
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
            $sql = "DELETE FROM categoria WHERE cod = :cod";
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

    public function Atualizar(Categoria $categoria) {
        try {
            $sql = "UPDATE categoria SET titulo = :titulo, url = :url, descricao = :descricao, status = :status, data = :data WHERE cod = :cod";
            $param = array(
                ":cod" => $categoria->getCod(),
                ":titulo" => $categoria->getTitulo(),
                ":url" => $categoria->getUrl(),
                ":descricao" => $categoria->getDescricao(),
                ":status" => $categoria->getStatus(),
                ":data" => $categoria->getData()
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

    public function retornaCategoria($cod) {
        try {
            $sql = "SELECT * FROM categoria WHERE cod = :cod";
            $param = array(":cod" => $cod);

            $dt = $this->pdo->ExecuteQueryOneRow($sql, $param);

            $categoria = new Categoria();
            $categoria->setCod($dt['cod']);
            $categoria->setTitulo($dt['titulo']);
            $categoria->setStatus($dt['status']);
            $categoria->setDescricao($dt['descricao']);
            return $categoria;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    public function retornaCategoriaUrl($url) {
        try {
            $sql = "SELECT * FROM categoria WHERE url = :url";
            $param = array(":url" => $url);

            $dt = $this->pdo->ExecuteQueryOneRow($sql, $param);
            
            $categoria = new Categoria();
            $categoria->setCod($dt['cod']);
            $categoria->setTitulo($dt['titulo']);
            $categoria->setStatus($dt['status']);
            $categoria->setDescricao($dt['descricao']);
            $categoria->setData($dt['data']);
            return $categoria;            
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }
    
    public function RetornaQtdCategoria() {
        try {
            $sql = "SELECT count(c.cod) as total FROM categoria c";
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
