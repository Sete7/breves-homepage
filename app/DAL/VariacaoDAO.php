<?php
require_once 'Banco.php';

class VariacaoDAO {

    private $debug;
    private $pdo;

    public function __construct() {
        $this->pdo = new Banco();
        $this->debug = true;
    }

    public function Cadastrar(Variacao $variacao) {
        try {
            $sql = "INSERT INTO variacao (nome_variacao, status_variacao) VALUES(:titulo, :status)";
            $param = array(
                ":titulo" => $variacao->getTitulo_variavel(),                
                ":status" => $variacao->getStatus_variavel()
               
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

    public function ListarVariacao($inicio = null, $quantidade = null) {
        try {
            $sql = "SELECT * FROM variacao ORDER BY id_variacao DESC LIMIT :inicio, :quantidade";
            $param = array(
                ":inicio" =>  $inicio,
                ":quantidade" => $quantidade                
            );
            $dt = $this->pdo->ExecuteQuery($sql, $param);
            
            $listaVar = [];
            
            foreach ($dt as $pts) {
                $variacao = new Variacao();
                $variacao->setCod_variavel($pts['id_variacao']);
                $variacao->setTitulo_variavel($pts['nome_variacao']);                
                $variacao->setStatus_variavel($pts['status_variacao']);                              

                $listaVar[] = $variacao;
            }
            return $listaVar;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }    
    
    public function todasVariacao() {
        try {
            $sql = "SELECT * FROM variacao WHERE status_variacao = 1 ORDER BY id_variacao DESC";
            
            $dt = $this->pdo->ExecuteQuery($sql);
            
            $listaVar = [];
            
            foreach ($dt as $pts) {
                $variacao = new Variacao();
                $variacao->setCod_variavel($pts['id_variacao']);
                $variacao->setTitulo_variavel($pts['nome_variacao']);                
                $variacao->setStatus_variavel($pts['status_variacao']);                              

                $listaVar[] = $variacao;
            }
            return $listaVar;
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
            $sql = "DELETE FROM variacao WHERE id_variacao = :cod";
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

    public function Atualizar(Variacao $variacao) {
        try {
            $sql = "UPDATE variacao SET nome_variacao = :nome, status_variacao = :status WHERE id_variacao = :cod";
            $param = array(
                ":cod" => $variacao->getCod_variavel(),
                ":nome" => $variacao->getTitulo_variavel(),                
                ":status" => $variacao->getStatus_variavel()
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

    public function retornaVariacao($cod) {
        try {
            $sql = "SELECT * FROM variacao WHERE id_variacao = :cod";
            $param = array(":cod" => $cod);

            $dt = $this->pdo->ExecuteQueryOneRow($sql, $param);

            $variacao = new Variacao();
            $variacao->setCod_variavel($dt['id_variacao']);
            $variacao->setTitulo_variavel($dt['nome_variacao']);
            $variacao->setStatus_variavel($dt['status_variacao']);            
            return $variacao;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }  

    
    public function RetornaQtdVariacao() {
        try {
            $sql = "SELECT count(v.id_variacao) as total FROM variacao v";
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
