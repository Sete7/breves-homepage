<?php

require_once 'Banco.php';

class ProdutoDAO {

    private $debug;
    private $pdo;

    public function __construct() {
        $this->pdo = new Banco();
        $this->debug = true;
    }

    /*     * ****************************** PAINEL ADMINISTRATIVO ********************************** */

    public function Cadastrar(Produto $produto) {
        try {
            $sql = "INSERT INTO produto (titulo, categoria, cod_ra,oferta,subcategoria,marca_do_produto,url, descricao, valor,valor_antigo,desconto,estoque, status, thumb, data, variacao) "
                    . "VALUES (:titulo, :categoria, :cod_ra, :oferta, :subcategoria, :marca_do_produto, :url, :descricao, :valor, :valor_antigo, :desconto, :estoque, :status, :thumb, :data, :variacao)";
            $param = array(
                ":titulo" => $produto->getTitulo(),
                ":categoria" => $produto->getCategoria(),
                ":cod_ra" => $produto->getCod_ra(),
                ":oferta" => $produto->getOferta(),
                ":subcategoria" => $produto->getSubcategoria(),
                ":marca_do_produto" => $produto->getMarca_do_produto(),
                ":url" => $produto->getUrl(),
                ":descricao" => $produto->getDescricao(),
                ":valor_antigo" => $produto->getValor(),
                ":valor" => $produto->getValor_antigo(),
                ":desconto" => $produto->getDesconto(),
                ":estoque" => $produto->getEstoque(),
                ":status" => $produto->getStatus(),
                ":thumb" => $produto->getThumb(),
                ":data" => $produto->getData(),
                ":variacao" => $produto->getVariacao(),
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

    public function Atualizar(Produto $produto) {
        try {

            $sql = "UPDATE produto SET titulo = :titulo, categoria = :categoria, cod_ra = :cod_ra, oferta = :oferta, subcategoria = :subcategoria, marca_do_produto = :marca_do_produto, 
                url = :url, descricao = :descricao, valor = :valor,valor_antigo = :valor_antigo,desconto = :desconto, estoque = :estoque, status = :status, data = :data, variacao = :variacao
                WHERE cod = :cod";

            $param = array(
                ":cod" => $produto->getCod(),
                ":titulo" => $produto->getTitulo(),
                ":cod_ra" => $produto->getCod_ra(),
                "oferta" => $produto->getOferta(),
                ":categoria" => $produto->getCategoria(),
                ":subcategoria" => $produto->getSubcategoria(),
                ":marca_do_produto" => $produto->getMarca_do_produto(),
                ":url" => $produto->getUrl(),
                ":descricao" => $produto->getDescricao(),
                ":valor" => $produto->getValor(),
                ":valor_antigo" => $produto->getValor_antigo(),
                ":desconto" => $produto->getDesconto(),
                ":estoque" => $produto->getEstoque(),
                ":status" => $produto->getStatus(),
                ":data" => $produto->getData(),
                ":variacao" => $produto->getVariacao()
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

    public function Excluir($cod) {
        try {
            $sql = "DELETE FROM produto WHERE cod = :cod";
            $param = array(":cod" => $cod);
            return $this->pdo->ExecuteNonQuery($sql, $param);
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    public function ListarProduto($inicio = null, $quantidade = null) {
        try {
            $sql = "SELECT p.cod, p.titulo, p.categoria, p.subcategoria,p.marca_do_produto, p.url, p.descricao, p.valor,p.valor_antigo,p.desconto,p.estoque, p.status, p.thumb, p.data, p.cod_ra,"
                    . " c.cod as codCat, c.titulo as tituloCat, s.sub_cod as subCod, s.sub_titulo as subTitulo FROM produto p "
                    . "INNER JOIN subcategoria s ON s.sub_cod = p.subcategoria "
                    . "INNER JOIN categoria c ON p.categoria = c.cod ORDER BY p.cod DESC LIMIT :inicio, :quantidade";
            

            $param = array(
                ":inicio" => $inicio,
                ":quantidade" => $quantidade
            );

            $dt = $this->pdo->ExecuteQuery($sql, $param);

            $listarProduto = [];

            foreach ($dt as $pts) {
                $produto = new Produto();
                $produto->setCod($pts['cod']);
                $produto->setTitulo($pts['titulo']);
                $produto->setUrl($pts['url']);
                $produto->setDescricao($pts['descricao']);
                $produto->setMarca_do_produto($pts['marca_do_produto']);
                $produto->setValor($pts['valor']);
                $produto->setValor_antigo($pts['valor_antigo']);
                $produto->setDesconto($pts['desconto']);
                $produto->setEstoque($pts['estoque']);
                $produto->setStatus($pts['status']);
                $produto->setThumb($pts['thumb']);
                $produto->setData($pts['data']);
                $produto->setCod_ra($pts['cod_ra']);
                $produto->getCategoria()->setCod($pts['codCat']);
                $produto->getCategoria()->setTitulo($pts['tituloCat']);
                $produto->getSubcategoria()->setSub_cod($pts['subCod']);
                $produto->getSubcategoria()->setSub_titulo($pts['subTitulo']);

                $listarProduto[] = $produto;
            }
            return $listarProduto;
        } catch (Exception $exc) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //quantidades de produtos
    public function RetornaQtdProduto() {
        try {
            $sql = "SELECT count(pr.cod) as total FROM produto pr";
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

    //retorno de produto com imagem
    public function retornaProdutoImagem($cod) {
        try {
            $sql = "SELECT cod, titulo, thumb FROM produto WHERE cod = :cod";
            $param = array(":cod" => $cod);
            //Data Table
            $dt = $this->pdo->ExecuteQueryOneRow($sql, $param);
            $produto = new Produto();
            $produto->setCod($dt['cod']);
            $produto->setTitulo($dt['titulo']);
            $produto->setThumb($dt['thumb']);
            return $produto;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //retorna dados do produto atraavés do cod
    public function retornaIdProduto($cod) {
        try {

            $sql = "SELECT 
                    c.cod as codCat, c.titulo as tituloCat, 
                    s.sub_cod as subCod, s.sub_titulo as subTitulo, 
                    v.id_variacao as codVar, v.nome_variacao as nomeVar, 
                    p.cod, p.titulo, p.categoria, p.subcategoria,p.marca_do_produto, p.url, p.descricao, p.valor,
                    p.valor_antigo,p.desconto,p.estoque, 
                    p.status, p.thumb, p.data,p.cod_ra, p.oferta, p.variacao FROM produto p 
                    INNER JOIN categoria c ON p.categoria = c.cod
                    INNER JOIN subcategoria s ON s.sub_cod = p.subcategoria 
                    INNER JOIN variacao v ON v.id_variacao = p.variacao                      
                    WHERE p.cod = :cod";

            $param = array(":cod" => $cod);
            //Data Table
            $pts = $this->pdo->ExecuteQueryOneRow($sql, $param);
            $produto = new Produto();
            $produto->setCod($pts['cod']);
            $produto->setTitulo($pts['titulo']);
            $produto->setUrl($pts['url']);
            $produto->setDescricao($pts['descricao']);
            $produto->setMarca_do_produto($pts['marca_do_produto']);
            $produto->setValor($pts['valor']);
            $produto->setValor_antigo($pts['valor_antigo']);
            $produto->setDesconto($pts['desconto']);
            $produto->setEstoque($pts['estoque']);
            $produto->setStatus($pts['status']);
            $produto->setThumb($pts['thumb']);
            $produto->setData($pts['data']);
            $produto->setCod_ra($pts['cod_ra']);
            $produto->setOferta($pts['oferta']);

            //retornando a variacao
            $produto->getVariacao()->setCod_variavel($pts['codVar']);
            $produto->getVariacao()->setTitulo_variavel($pts['nomeVar']);

            $produto->getCategoria()->setCod($pts['codCat']);
            $produto->getCategoria()->setTitulo($pts['tituloCat']);


            $produto->getSubcategoria()->setSub_cod($pts['subCod']);
            $produto->getSubcategoria()->setSub_titulo($pts['subTitulo']);


            return $produto;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    //retorna dados do produto atraavés do url
    public function retornaUrlProduto($url) {
        try {

            $sql = "SELECT 
                    c.cod as codCat, c.titulo as tituloCat, 
                    s.sub_cod as subCod, s.sub_titulo as subTitulo, 
                    v.id_variacao as codVar, v.nome_variacao as nomeVar, 
                    p.cod, p.titulo, p.categoria, p.subcategoria, p.marca_do_produto, p.url, p.descricao, p.valor,
                    p.valor_antigo,p.desconto,p.estoque, 
                    p.status, p.thumb, p.data,p.cod_ra, p.oferta, p.variacao FROM produto p 
                    INNER JOIN categoria c ON p.categoria = c.cod
                    INNER JOIN subcategoria s ON s.sub_cod = p.subcategoria 
                    INNER JOIN variacao v ON v.id_variacao = p.variacao 
                    WHERE p.url = :url AND p.status = 1";

            $param = array(":url" => $url);
            //Data Table
            $pts = $this->pdo->ExecuteQueryOneRow($sql, $param);
            $produto = new Produto();
            $produto->setCod($pts['cod']);
            $produto->setTitulo($pts['titulo']);
            $produto->setUrl($pts['url']);
            $produto->setDescricao($pts['descricao']);
            $produto->setMarca_do_produto($pts['marca_do_produto']);
            $produto->setValor($pts['valor']);
            $produto->setValor_antigo($pts['valor_antigo']);
            $produto->setDesconto($pts['desconto']);
            $produto->setEstoque($pts['estoque']);
            $produto->setStatus($pts['status']);
            $produto->setThumb($pts['thumb']);
            $produto->setData($pts['data']);
            
            //retornando a variacao
            $produto->getVariacao()->setCod_variavel($pts['codVar']);
            $produto->getVariacao()->setTitulo_variavel($pts['nomeVar']);

            $produto->getCategoria()->setCod($pts['codCat']);
            $produto->getCategoria()->setTitulo($pts['tituloCat']);

            $produto->getSubcategoria()->setSub_cod($pts['subCod']);
            $produto->getSubcategoria()->setSub_titulo($pts['subTitulo']);


            return $produto;
        } catch (PDOException $e) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    public function AlterarImagem($cod, $thumb) {
        try {
            $sql = "UPDATE produto SET thumb = :thumb WHERE cod = :cod";
            $param = array(
                ":cod" => $cod,
                ":thumb" => $thumb
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
    
    public function BuscarProduto($termo = null, $tipo = null) {
        try {
            $sql = "";            

            switch ($tipo) {
                case 1:
                    $sql = "SELECT 
                            c.cod as codCat, c.titulo as tituloCat, c.url as urlCat,
                            s.sub_cod as subCod, s.sub_titulo as subTitulo,
                            v.id_variacao as codVar, v.nome_variacao as nomeVar,
                            p.cod, p.titulo, p.categoria, p.subcategoria, p.marca_do_produto, p.url, p.descricao, p.valor,p.valor_antigo,p.desconto, p.estoque, 
                            p.status, p.thumb, p.data, p.oferta, p.variacao, p.cod_ra FROM produto p 
                            INNER JOIN subcategoria s ON s.sub_cod = p.subcategoria 
                            INNER JOIN categoria c ON p.categoria = c.cod  
                            INNER JOIN variacao v ON v.id_variacao = p.variacao                      
                            WHERE p.titulo LIKE :termo ORDER BY p.titulo ASC";
                    break;
                case 2:
                    $sql = "SELECT
                            c.cod as codCat, c.titulo as tituloCat, c.url as urlCat,
                            s.sub_cod as subCod, s.sub_titulo as subTitulo,
                            v.id_variacao as codVar, v.nome_variacao as nomeVar,
                            p.cod, p.titulo, p.categoria, p.subcategoria, p.url, p.descricao, p.valor,p.valor_antigo,p.desconto, p.estoque, 
                            p.status, p.thumb, p.data,p.marca_do_produto, p.oferta, p.variacao, p.cod_ra FROM produto p 
                            INNER JOIN subcategoria s ON s.sub_cod = p.subcategoria 
                            INNER JOIN categoria c ON p.categoria = c.cod  
                            INNER JOIN variacao v ON v.id_variacao = p.variacao
                            WHERE p.cod_ra LIKE :termo ORDER BY p.cod_ra ASC";
                    break;
            }

            $param = array(
                ":termo" => "%{$termo}%"
            );

            $dataTable = $this->pdo->ExecuteQuery($sql, $param);

            $listaProduto = [];

            foreach ($dataTable as $pts) {
                $produto = new Produto();
                $produto->setCod($pts['cod']);
                $produto->setTitulo($pts['titulo']);
                $produto->setUrl($pts['url']);
                $produto->setDescricao($pts['descricao']);
                $produto->setMarca_do_produto($pts['marca_do_produto']);
                $produto->setValor($pts['valor']);
                $produto->setValor_antigo($pts['valor_antigo']);
                $produto->setDesconto($pts['desconto']);
                $produto->setEstoque($pts['estoque']);
                $produto->setStatus($pts['status']);
                $produto->setThumb($pts['thumb']);
                $produto->setData($pts['data']);
                $produto->setCod_ra($pts['cod_ra']);

                $produto->getCategoria()->setCod($pts['codCat']);
                $produto->getCategoria()->setTitulo($pts['tituloCat']);
                $produto->getCategoria()->setUrl($pts['urlCat']);

                $produto->getSubcategoria()->setSub_cod($pts['subCod']);
                $produto->getSubcategoria()->setSub_titulo($pts['subTitulo']);

                //retornando a variacao
                $produto->getVariacao()->setCod_variavel($pts['codVar']);
                $produto->getVariacao()->setTitulo_variavel($pts['nomeVar']);;

                $listaProduto[] = $produto;
            }

            return $listaProduto;
        } catch (PDOException $ex) {
            if ($this->debug) {
                echo "ERRO: {$ex->getMessage()} LINE: {$ex->getLine()}";
            }
            return null;
        }
    }

    /*     * ****************************** SITE ********************************** */

    public function ListarTodosProdutos() {
        try {
            $sql = "SELECT                 
                    v.id_variacao as codVar, v.nome_variacao as nomeVar,
                    p.cod, p.titulo, p.categoria, p.subcategoria, p.marca_do_produto, p.url, p.descricao, p.valor,p.valor_antigo,p.desconto, p.estoque, 
                    p.status, p.thumb, p.data, p.oferta, p.variacao FROM produto p 
                    INNER JOIN variacao v ON v.id_variacao = p.variacao 
                    WHERE status = 1 AND oferta = 1 ORDER BY cod DESC ";

            $dt = $this->pdo->ExecuteQuery($sql);

            $listarProduto = [];

            foreach ($dt as $pts) {
                $produto = new Produto();
                $produto->setCod($pts['cod']);
                $produto->setTitulo($pts['titulo']);
                $produto->setUrl($pts['url']);
                $produto->setDescricao($pts['descricao']);
                $produto->setMarca_do_produto($pts['marca_do_produto']);
                $produto->setValor($pts['valor']);
                $produto->setValor_antigo($pts['valor_antigo']);
                $produto->setDesconto($pts['desconto']);
                $produto->setEstoque($pts['estoque']);
                $produto->setStatus($pts['status']);
                $produto->setThumb($pts['thumb']);
                $produto->setData($pts['data']);
                
                //retornando a variacao
                $produto->getVariacao()->setCod_variavel($pts['codVar']);
                $produto->getVariacao()->setTitulo_variavel($pts['nomeVar']);


                $listarProduto[] = $produto;
            }
            return $listarProduto;
        } catch (Exception $exc) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    public function ListaProdutoCategoria($categoria, $inicio = null, $quantidade = null) {
        try {
            $sql = "SELECT 
                    c.cod as codCat, c.titulo as tituloCat, c.url as urlCat,
                    s.sub_cod as subCod, s.sub_titulo as subTitulo,
                    v.id_variacao as codVar, v.nome_variacao as nomeVar,
                    p.cod, p.titulo, p.categoria, p.subcategoria, p.marca_do_produto, p.url, p.descricao, p.valor,p.valor_antigo,p.desconto, p.estoque, 
                    p.status, p.thumb, p.data, p.oferta, p.variacao FROM produto p 
                    INNER JOIN subcategoria s ON s.sub_cod = p.subcategoria 
                    INNER JOIN categoria c ON p.categoria = c.cod  
                    INNER JOIN variacao v ON v.id_variacao = p.variacao 
                    WHERE p.categoria = :categoria AND p.status = 1 ORDER BY p.cod DESC LIMIT :inicio, :quantidade";


            $param = array(
                ":categoria" => $categoria,
                ":inicio" => $inicio,
                ":quantidade" => $quantidade
            );

            $dt = $this->pdo->ExecuteQuery($sql, $param);

            $listarProduto = [];

            foreach ($dt as $pts) {
                $produto = new Produto();
                $produto->setCod($pts['cod']);
                $produto->setTitulo($pts['titulo']);
                $produto->setUrl($pts['url']);
                $produto->setDescricao($pts['descricao']);
                $produto->setMarca_do_produto($pts['marca_do_produto']);
                $produto->setValor($pts['valor']);
                $produto->setValor_antigo($pts['valor_antigo']);
                $produto->setDesconto($pts['desconto']);
                $produto->setEstoque($pts['estoque']);
                $produto->setStatus($pts['status']);
                $produto->setThumb($pts['thumb']);
                $produto->setData($pts['data']);

                $produto->getCategoria()->setCod($pts['codCat']);
                $produto->getCategoria()->setTitulo($pts['tituloCat']);
                $produto->getCategoria()->setUrl($pts['urlCat']);

                $produto->getSubcategoria()->setSub_cod($pts['subCod']);
                $produto->getSubcategoria()->setSub_titulo($pts['subTitulo']);

                //retornando a variacao
                $produto->getVariacao()->setCod_variavel($pts['codVar']);
                $produto->getVariacao()->setTitulo_variavel($pts['nomeVar']);

                $listarProduto[] = $produto;
            }
            return $listarProduto;
        } catch (Exception $exc) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

    public function ProdutoCategoria($categoria) {
        try {

            $sql = "SELECT 
                    c.cod as codCat, c.titulo as tituloCat, c.url as urlCat,
                    s.sub_cod as subCod, s.sub_titulo as subTitulo,
                    v.id_variacao as codVar, v.nome_variacao as nomeVar,
                    p.cod, p.titulo, p.categoria, p.subcategoria, p.marca_do_produto, p.url, p.descricao, p.valor,p.valor_antigo,p.desconto, p.estoque, 
                    p.status, p.thumb, p.data, p.oferta, p.variacao FROM produto p 
                    INNER JOIN subcategoria s ON s.sub_cod = p.subcategoria 
                    INNER JOIN categoria c ON p.categoria = c.cod  
                    INNER JOIN variacao v ON v.id_variacao = p.variacao 
                    WHERE p.categoria = :categoria AND p.status = 1 ORDER BY p.cod DESC";
           

            $param = array(
                ":categoria" => $categoria
            );

            $dt = $this->pdo->ExecuteQuery($sql, $param);

            $listarProduto = [];

            foreach ($dt as $pts) {
                $produto = new Produto();
                $produto->setCod($pts['cod']);
                $produto->setTitulo($pts['titulo']);
                $produto->setUrl($pts['url']);
                $produto->setDescricao($pts['descricao']);
                $produto->setMarca_do_produto($pts['marca_do_produto']);
                $produto->setValor($pts['valor']);
                $produto->setValor_antigo($pts['valor_antigo']);
                $produto->setDesconto($pts['desconto']);
                $produto->setEstoque($pts['estoque']);
                $produto->setStatus($pts['status']);
                $produto->setThumb($pts['thumb']);
                $produto->setData($pts['data']);

                $produto->getCategoria()->setCod($pts['codCat']);
                $produto->getCategoria()->setTitulo($pts['tituloCat']);
                $produto->getCategoria()->setUrl($pts['urlCat']);

                $produto->getSubcategoria()->setSub_cod($pts['subCod']);
                $produto->getSubcategoria()->setSub_titulo($pts['subTitulo']);

                //retornando a variacao
                $produto->getVariacao()->setCod_variavel($pts['codVar']);
                $produto->getVariacao()->setTitulo_variavel($pts['nomeVar']);

                $listarProduto[] = $produto;
               
            }
            return $listarProduto;
        } catch (Exception $exc) {
            if ($this->debug):
                echo "Erro {$e->getMessage()}, LINE {$e->getLine()}";
            else:
                return null;
            endif;
        }
    }

}
