<?php require_once './app/config.php'; ?>
<!DOCTYPE html>
<html lang="pt-br" itemscope itemtype="http://schema.org/Article">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">		
        <title>Breves Drogaria</title>
        <meta name="robots" content="index, follow">        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="."/>
        <meta name="keywords" content="Produtos farmaceuticos, drograria, localização, mais barato."/>
        <meta name="author" content="Junio Santos"/>
        <meta name="publisher" href="https://www.kombi.com/novo"/>
        <link rel="canonical" href="https://drograria.com.br">       
        <link href="<?= INCLUDE_PATH; ?>/assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?= INCLUDE_PATH; ?>/assets/css/media.css" rel="stylesheet" type="text/css"/>
        <link href="<?= INCLUDE_PATH; ?>/assets/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="<?= INCLUDE_PATH; ?>/assets/css/jcarousel.responsive.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Nova+Slim" rel="stylesheet">



    </head>
    <body>       
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.2&appId=1627648397302267&autoLogAppEvents=1';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <header class="main-header container">
            <div class="content">
                <div class="main-logo">
                    <a href="#">
                        <img src="<?= INCLUDE_PATH; ?>/assets/image/logo.png" alt=""/>
                    </a>
                </div>
                <div class="box-menu">
                    <ul class="menu">
                        <li><a href="#" >Quem Somos</a></li>
                        <li><a href="#" >lojas <strong><i class="fa fa-angle-down"></i></strong></a>
                            <ul>
                                <li><a href="#" > Recanto das Emas (4) </a></li>
                                <li><a href="#" > Santa Maria (2) </a></li>
                                <li><a href="#" > Samambaia Norte </a></li>
                                <li><a href="#" >Taguatinga Norte </a></li>
                            </ul>
                        </li>
                        <li><a href="#" >contato</a></li>
                        <li><a href="#" >social</a></li>
                        <li>
                            <a href="#" ><i class="fa fa-instagram"></i></a>
                            <a href="#" >    <i class="fa fa-facebook-official"></i></a>
                            <a href="#" >  <i class="fa fa-whatsapp"></i></a>(61) 0000 0000</li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>                            
        </header>


        <?php
        $Url[1] = (empty($Url[1]) ? null : $Url[1]);

        if (file_exists(REQUIRE_PATH . '/' . $Url[0] . '.php')):
            require REQUIRE_PATH . '/' . $Url[0] . '.php';
        elseif (file_exists(REQUIRE_PATH . '/' . $Url[0] . '/' . $Url[1] . '.php')):
            require REQUIRE_PATH . '/' . $Url[0] . '/' . $Url[1] . '.php';
        else:
            require REQUIRE_PATH . '/404.php';
        endif;
        ?>
        <!-- --------------------------------- conteudo ---------------------------- -->       
        <footer class="main-footer container">
            <div class="bg-footer">
                <div class="box-footer content">
                    <div class="box-contato">
                        <h1>CONTATO</h1>
                        <div class="div-fone">
                            <p> <i class="icone-fone">
                                    <img src="<?= INCLUDE_PATH; ?>/assets/image/icon-fone.png" alt=""/>
                                </i> <span>  (61) 0000-0000 <i class="fa fa-whatsapp"></i> (61) 00000-0000 </span></p>
                        </div>
                        <div class="div-envelope">
                            <p> <i class="icone-envelope">
                                    <img src="<?= INCLUDE_PATH; ?>/assets/image/icon-envelope.png" alt=""/>
                                </i> <span>  contato@brevesdrogaria.com.br</span></p>
                        </div>
                        <div class="box-pagamento">
                            <h1>PAGAMENTO</h1>
                            <ul class="bandeira">                                
                                <li>
                                    <img src="<?= INCLUDE_PATH; ?>/assets/image/cart-visa.png" alt=""/>
                                </li>
                                <li>
                                    <img src="<?= INCLUDE_PATH; ?>/assets/image/cart-master.png" alt=""/>
                                </li>
                                <li>
                                    <img src="<?= INCLUDE_PATH; ?>/assets/image/cart-visa.png" alt=""/>
                                </li>
                                <li>
                                    <img src="<?= INCLUDE_PATH; ?>/assets/image/cart-ec.png" alt=""/>
                                </li>
                                <li>
                                    <img src="<?= INCLUDE_PATH; ?>/assets/image/cart-elo.png" alt=""/>
                                </li>
                                <li>
                                    <img src="<?= INCLUDE_PATH; ?>/assets/image/cart-bb.png" alt=""/>
                                </li>
                                <li>
                                    <img src="<?= INCLUDE_PATH; ?>/assets/image/cart-itau.png" alt=""/>
                                </li>
                                <li>
                                    <img src="<?= INCLUDE_PATH; ?>/assets/image/cart-boleto.png" alt=""/>
                                </li>
                            </ul>
                        </div>

                        <div class="thumb-farm-popular">
                            <img src="<?= INCLUDE_PATH; ?>/assets/image/band-farm.png" alt=""/>
                        </div>
                    </div>
                    <div class="face-footer">
                        <div class="fb-page" data-href="https://www.facebook.com/lapacdf" data-tabs="timeline" data-width="320px" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/lapacdf" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/lapacdf">LAPAC</a></blockquote></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="copy container">
                    <div class="desc-copy">
                        <p>&COPY; <?php date("Y") ?> Desenvolvido por KMB Digital</p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="<?= INCLUDE_PATH; ?>/assets/js/jquery.js"></script>        
        <script src="<?= INCLUDE_PATH; ?>/assets/js/jquery.jcarousel.min.js"></script>
        <script src="<?= INCLUDE_PATH; ?>/assets/js/jcarousel.responsive.js"></script>
    </body>
</html>
