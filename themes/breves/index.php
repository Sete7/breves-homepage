<?php
$produtosController = new ProdutoController();
$sliderController = new SliderController();
$helper = new Helper();
?>

<?php
$sliderController = new SliderController();
?>
<div class="slide container">
    <div class="content">        
        <!--banner rotativos -->        
        <div class="wrapper">            
            <div class="jcarousel-wrapper">
                <div class="jcarousel">
                    <ul>
                        <?php                        
                        $tamDesktop = "g";
                        $sliderDesktop = $sliderController->ListarTamanhoSlider($tamDesktop);                        
                        foreach ($sliderDesktop as $sli):
                            ?>
                            <li><a href="#"><img src="<?= HOME; ?>/upload/<?= $sli->getSlider_thumb(); ?>" alt="" title=""></a></li>                                    
                            <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
<!--                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                <a href="#" class="jcarousel-control-next">&rsaquo;</a>-->
                <p class="jcarousel-pagination"></p>
            </div>
        </div>            

        <!--banner rotativos -->
        <div class="clear"></div>
    </div>    
</div>

<!-- --------------------------------- INFO TOPO ---------------------------- -->
<div class="box-info container">
    <div class="pino-info content">
        <div class="pino">
            <img src="<?= REQUIRE_PATH; ?>/assets/image/pino-01.jpg" alt=""/>
        </div>
        <div class="pino">
            <img src="<?= REQUIRE_PATH; ?>/assets/image/pino-02.jpg" alt=""/>
        </div>
        <div class="pino">
            <img src="<?= REQUIRE_PATH; ?>/assets/image/pino-03.jpg" alt=""/>
        </div>
        <div class="pino">
            <img src="<?= REQUIRE_PATH; ?>/assets/image/pino-04.jpg" alt=""/>
        </div>
        <div class="clear"></div>
    </div>
</div>

<!-- --------------------------------- conteudo ---------------------------- -->
<main class="main-content container">
    <div class="content">
        <section class="sec-ofertass">
            <h1 class="font-zero">Breves Ofertas</h1>
            <article class="art-ofertas">
                <div class="titulo-ofertas">
                    <h2>PRINCIPAIS OFERTAS</h2>
                </div>
                <div class="box-produto">
                    <?php
                    $listarOferta = $produtosController->ListarTodosProdutos();
                    if ($listarOferta == null):
                        echo "No momento não temos produtos em Promoção ou oferta.";
                    else:
                        foreach ($listarOferta as $oferta):
                            ?>
                            <div class="produto">
                                <?php
                                if ($oferta->getDesconto() > 0):
                                    ?>
                                    <div class="thumb-desconto">
                                        <h3><?= $oferta->getDesconto(); ?>% de desconto</h3>
                                    </div>
                                    <?php
                                else:
                                    ?>
                                    <div class="thumb-desconto">
                                        <h3>0% de desconto</h3>
                                    </div>
                                <?php
                                endif;
                                ?>
                                <div class="thumb-produto">                              
                                    <img src="<?= HOME; ?>/tim.php?src=/upload/<?= $oferta->getThumb(); ?>&w=200&h=180&zc=0" alt=""/>
                                </div>
                                <div class="desc-pdt">
                                    <h4><?= $helper->limitarTexto($oferta->getTitulo(), 40); ?></h4>
                                    <span><?= $oferta->getMarca_do_produto(); ?></span>
                                    <p class="price-oferta"><strike>R$ <?= $oferta->getValor_antigo(); ?></strike></p>
                                    <p class="price"> R$ <?= $oferta->getValor(); ?><span class="unidade"><?= $oferta->getVariacao()->getTitulo_variavel() ?></span></p>
                                </div>

                            </div>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                <div class="clear"></div>
            </article>
        </section>


        <!-- --------------------------------- INFO FOOTER ---------------------------- -->
        <div class="box-info-footer container">
            <div class="pino-info-footer">
                <div class="pino-footer">
                    <img src="<?= REQUIRE_PATH; ?>/assets/image/pino-001.jpg" alt=""/>
                </div>
                <div class="pino-footer">
                    <img src="<?= REQUIRE_PATH; ?>/assets/image/pino-002.jpg" alt=""/>
                </div>
                <div class="pino-footer">
                    <img src="<?= REQUIRE_PATH; ?>/assets/image/pino-003.jpg" alt=""/>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <article class="art-ofertas">
            <h2 class="font-zero">Produtos Relacionados</h2>
            <div class="box-produto">
                <?php
                $todosPdr = $produtosController->ListarProduto(0, 50);
                foreach ($todosPdr as $listPdr):
                    ?>
                    <div class="produto">

                        <div class="thumb-desconto">
                            <h3><?= $listPdr->getDesconto(); ?>% de desconto</h3>
                        </div>
                        <div class="thumb-produto">                              
                            <img src="<?= HOME; ?>/tim.php?src=/upload/<?= $listPdr->getThumb(); ?>&w=200&h=180&zc=0" alt=""/>
                        </div>
                        <div class="desc-pdt">
                            <h4><?= $helper->Words($listPdr->getTitulo(), 2); ?></h4>
                            <span><?= $listPdr->getMarca_do_produto(); ?></span>
                            <p class="price-oferta"><strike>R$ <?= $listPdr->getValor_antigo(); ?></strike></p>
                            <p class="price"> R$ <?= $listPdr->getValor(); ?></p>
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>
            </div>
            <div class="clear"></div>
        </article>
        <section class="sec-quem container">                        
            <div class="titulo-quem">
                <h1>QUEM SOMOS</h1>
            </div>
            <article class="art-quem-somos">
                <div class="thumb-quem">
                    <img src="<?= REQUIRE_PATH; ?>/assets/image/banner-quem-somos.jpg" alt=""/>
                </div>

                <div class="box-desc-quem">
                    <div class="missao mis-one">
                        <h2>MISSÃO</h2>
                        <p>
                            Trabalhar com foco na satisfação do cliente, buscando atendê-lo
                            da melhor forma possível, com atenção, respeito e dedicação.
                        </p>
                    </div>
                    <div class="missao mis-two">
                        <h2>VISÃO</h2>
                        <p>
                            Ser referência no mercado farmacêutico de Brasília, crescendo junto
                            à cidade e fundamentar nossas raízes com base no bom relacionamento
                            com os clientes, funcionários e demais colaboradores.
                        </p>
                    </div>
                    <div class="missao mis-three">
                        <h2>VALORES</h2>
                        <p>
                            Respeito mútuo. O relacionamento entre funcionários, clientes,
                            fornecedores e parceiros sempre é pautado pelo respeito. Prestação
                            de serviços de qualidade, valorizando o atendimento ao cliente e
                            buscando suprir suas necessidades. Valorização dos funcionários e
                            do bom ambiente de trabalho. Valorizamos e praticamos a ética em
                            todo nosso trabalho.
                        </p>
                    </div>
                </div>
            </article>

            <div class="">
            </div>
        </section>
        <div class="clear"></div>
    </div>
</main>