<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="Robson Kumagai">

    <title>Pretium Elit</title>

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/plugins.css" />
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/nexa-web-font.css" />
    <link rel="stylesheet" href="/css/opensans-web-font.css" />
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css" />

    <script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
<div class='preloader'><div class='loaded'>&nbsp;</div></div>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#home">Home</a></li>
                <li><a href="#sobre">Sobre Nós</a></li>
                <li><a href="#portfolio">Indicadores</a></li>
                <li><a href="#contact">Contato</a></li>
                <li><a href="#cadModal" id="#cadBtn" data-target="#cadModal" data-toggle="modal">Cadastrar</a></li>
                <li><a href="/login">Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<header id="home" class="home">
    <div class="overlay sections">
        <div class="container">
            <div class="row">
                <div class="wrapper">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="home-details text-center">
                            <div class="logo">
                                <img src="/images/logo.png" alt="Logo Image" />
                            </div>

                            <div class="home-title">
                                <h5>Soluções para e-commerce</h5>
                            </div>

                            <div class="scroll-down">
                                <h5 style="color: lightgrey">Saiba Mais</h5>
                                <a href="#sobre"><i class="fa fa-angle-double-down"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Sections -->
<section id="sobre" class="sobre sections">
    <div class="container">

        <div class="row">
            <div class="wrapper">
                <div class="col-md-6">
                    <div class="about-photo">
                        <img src="/images/extra.png" style="width: 450px; padding-left: 70px; padding-top: 50px"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="heading sobre-content">
                        <h3>Sobre Nós</h3>
                        <p>A <b>Pretium Elit</b> é uma plataforma que te auxiliará a tomar decisões mais <b>lucrativas</b> dentro de sua loja virtual.</p>
                        <p>Fornecemos uma visão detalhada do preço da concorrência, e a sua diferença (em Decimal e Porcentagem) apontando quais os produtos estão com valor abaixo ou acima em comparação aos produtos comercializados em seu e-commerce.</p>
                        <p>Atualmente realizamos a busca nos <strong>MarketPlaces</strong> que anunciam no portal do <strong>Extra</strong>, captando todas as informações de valores dos lojistas que anunciam neste site. </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="scroll-down">
            <h5 style="color: lightgrey">Mais Informações</h5>
            <a href="#portfolio"><i class="fa fa-angle-double-down"></i></a>
        </div>

    </div>
</section>


<!-- Sections -->
<section id="portfolio" class="portfolio">
    <div class="overlay sections">
        <div class="container">

            <div class="heading text-center">
                <div class="title">
                    <h3>Indicadores</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x" style="color: #00b3ee"></i>
                            <i class="fa fa-search-plus fa-stack-1x text-primary" style="color: white"></i>
                        </span>
                        <h4>
                            <strong style="text-align: center; color: #00b3ee">Monitoramento</strong>
                        </h4>
                        <p style="color: white; font-weight: bold">Monitoramos empresas líderes no mercado de E-Commerce para fornecer aos nossos clientes Sistemas de Apoio à Decisão.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x" style="color: #00b3ee"></i>
                            <i class="fa fa-pie-chart fa-stack-1x text-primary" style="color: white"></i>
                        </span>
                        <h4>
                            <strong style="text-align: center; color: #00b3ee">Indicadores</strong>
                        </h4>
                        <p style="color: white; font-weight: bold">Fornecemos uma visão detalhada de percentual de ganho e perca com base nos valores praticados pelos concorrentes.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x" style="color: #00b3ee"></i>
                            <i class="fa fa-line-chart  fa-stack-1x text-primary" style="color: white"></i>
                        </span>
                        <h4>
                            <strong style="text-align: center; color: #00b3ee">Buy box</strong>
                        </h4>
                        <p style="color: white; font-weight: bold">Fornecemos ao cliente uma visão de ganho e perca baseado em Buy Box.</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="service-item">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x" style="color: #00b3ee"></i>
                            <i class="fa fa-star fa-stack-1x text-primary" style="color: white"></i>
                        </span>
                        <h4>
                            <strong style="text-align: center; color: #00b3ee">Exclusividade</strong>
                        </h4>
                        <p style="color: white; font-weight: bold">Informamos ao cliente quais os produtos em que ele possui exclusividade de venda.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="portfolio-wrapper">
                    <div class="scroll-down">
                        <h5 style="color: lightgrey">Se interessou?</h5>
                        <a href="#contact"><i class="fa fa-angle-double-down"></i></a>
                    </div>
                </div>
            </div>
        </div> <!-- /container -->
    </div>
</section>

<section id="contact" class="contact sections">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="contact-details text-center">

                    <div class="contact-category">
                        <div class="formulario">
                            <h4>Se interessou? Cadastre-se e solicite um demo de nosso sistema!</h4>
                            <button type="button" class="btn btn-info btn-lg" id="cadBtn">Cadastrar</button>
                        </div>
                    </div>

                    <!-- Início Modal-->

                    <div class="modal fade" id="cadModal" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">

                                    {!! Form::open(array('route' => 'cadastro_email', 'class' => 'form')) !!}

                                        <fieldset>
                                            <legend>Cadastre-se!</legend>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Nome Completo</label>
                                                <div class="col-md-6 inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                        <input  name="NOME" placeholder="Nome" class="form-control"  type="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Cidade</label>
                                                <div class="col-md-6 inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                                        <input name="CIDADE" placeholder="Cidade" class="form-control"  type="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">E-mail</label>
                                                <div class="col-md-6 inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                        <input name="EMAIL" placeholder="E-mail" class="form-control"  type="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Telefone</label>
                                                <div class="col-md-6 inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                                        <input name="TELEFONE" placeholder="(14)99700-2802" class="form-control" type="text">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Site</label>
                                                <div class="col-md-6 inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                                        <input name="SITE" placeholder="Site" class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Sugestão</label>
                                                <div class="col-md-6 inputGroupContainer">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                                        <textarea class="form-control" name="SUGESTAO" placeholder="Deixe sua sugestão ou mensagem."></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Receber newsletter?</label>
                                                <div class="col-md-6">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="NEWS" value="Sim" /> Sim
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="NEWS" value="Não" /> Não
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Possui interesse em investir na empresa?</label>
                                                <div class="col-md-6">
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="INVESTIR" value="Sim" /> Sim
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="INVESTIR" value="Não" /> Não
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>
                                </div>
                                <div class="modal-footer">
                                    {!! Form::submit('Cadastrar',  array('class'=>'btn btn-success')) !!}
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                                </div>

                                {!! Form::close() !!}

                            </div>
                        </div>
                    </div>
                    <!-- Fim Modal -->

                    <div class="contact-category">
                        <div class="mail">
                            <br><h4>Ou entre em contato através de: </h4>

                            <h3>E-mail :</h3>
                            <h4>pretiumelit@gmail.com</h4>
                        </div>
                    </div>

                    <div class="contact-category">
                        <div class="phone">
                            <h3>Telefone :</h3>
                            <h4>(14) 99700-2802</h4>
                        </div>
                    </div>

                    <div class="contact-category">
                        <div class="social">
                            <h3>Mídias Sociais :</h3>
                            <a target="_blank" href="https://www.facebook.com/Pretium-Elit-Solu%C3%A7%C3%B5es-para-e-commerce-122319878474958/?ref=br_rs"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="https://twitter.com/pretiumelit"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="https://www.instagram.com/pretiumelit/"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<footer id="footer" class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="copyright text-center">
                    <p style="color: darkgray">Pretium Elit 2017 - Adaptado de <a target="_blank" style="color: darkgray" href="http://bootstrapthemes.co"> Bootstrap Themes </a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="/js/vendor/jquery-1.11.2.min.js"></script>
<script src="/js/vendor/bootstrap.min.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/jquery.magnific-popup.js"></script>
<script src="/js/main.js"></script>
<script src="/js/admin/index.js"></script>

</body>
</html>