<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Robson Kumagai" content="Pretium Elit">

    <title>Pretium Elit</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/metisMenu.min.css" rel="stylesheet">
    <link href="/css/sb-admin-2.css" rel="stylesheet">
    <link href="/css/morris.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/home.css" rel="stylesheet" type="text/css">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>

<body>

<div id="wrapper">

    <!-- Inicio Navbar -->

    <nav class="navbar">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"> Sair
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Fim Navbar -->

    <!-- Inicio Sidebar -->

    <div class="sidebar">
        <img src="/images/logo.png" style="width: 80%; margin-left: 20px; margin-top: 10px; margin-bottom: 10px"/>
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{ url('/home') }}"><i class="fa fa-home fa-fw"></i> Home</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Gráficos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('buybox') }}"><i class="fa fa-trophy fa-fw"></i> Buybox</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('/relatorio') }}"><i class="fa fa-table fa-fw"></i> Relatório</a>
                    </li>
                    <li>
                        <a href="{{ url('/blog') }}"><i class="fa fa-newspaper-o fa-fw"></i> Blog</a>
                    </li>
                    <li>
                        <a href="#suporteModal" id="#suporteBtn" data-target="#suporteModal" data-toggle="modal"><i class="fa fa-envelope-o fa-fw"></i> Contato</a>
                    </li>
                </ul>
            </div>
    </div>

    <!-- Fim Sidebar -->

    <!-- Inicio Conteúdo -->

    <div class="content">
        <div class="col-lg-12">
            <h1 class="titulo" style="font-family: 'Segoe UI Black'">Portal - Pretium Elit</h1>
        </div>

        <div class="container-fluid">
            <div class="row col-md-12">
                <h3 style="text-align: justify; padding-left: 17px; padding-right: 17px">Seja bem-vindo ao seu Portal da Pretium Elit, acompanhe em tempo real a sua colocação no mercado comparado aos seus concorrentes.</h3><br><br>

                    <div class="col-lg-3 col-md-6" style="width: 500px">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"> {{$contadorProduto}} </div>
                                        <div>Produtos!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Produtos Analisados em seu E-Commerce.</span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" style="width: 500px;">
                        <div class="panel panel-blue">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{$valorTotal}}</div>
                                        <div>Reais!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">Valor total em produtos Anunciados</span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <h3 style="margin-left: 15px">Baixe já o eBook "<a target="_blank" href='http://materiais.rockcontent.com/e1t/c/*W1n5S4353vGK-W4FPzcS7fxXkh0/*W2XL5l21psY5mW1G4-6815LLY-0/5/f18dQhb0S1V27Bf-yvTCK4t1s_fYWW2Pg8yp1SJlktW1Mkfv64N4Cj5W2pyKn367ztDgW3sbL7k997CqMW6YjXW_8NR6GjW5KlVHn1LPpscW5QnVhg2XDpZPW31fr1V8Gwf0nW29n2v85SjYZJW7NpGjQ3psHrzW6NRwh07GNrFqW1FQqgM5nqxZZN8C_8X_LNBSSW55lhRD2xLD24W3nRpT11_VNYlW1wqpYM7nRlcKN1pGlPNPXSFhW31sx165vfbxZW3y14Pz7bq554W3TfJpv73BTqYN19GZ3XqX536N1SjlBrN9WSjW41TsWg4LYwGNW4LY6W18QCBlmW49nX4j4HZh7HW4XccGP95p-KpW8rkl-x71-j9jW36gJ1s5rJpXyW8WfK22311r2PVYbhmf6jwY46VjKM8V2CSdLtW26fPM882j_cGVRCHCm1dRp3MW4bBR8d2Mt63JW1cktYJ7-1Pw7W2cS3vZ3qS5JdW4xz9KS9gp_8JW3F_M9h953c35W8_vWKS20mZC_W3n6MLK1tkfl8W3jNxxy6DVW_qW3qqSX63xTHgTW2h2bXs4TnQ23N87Ssd6mms--W1y8fQ32S_ptDW5XvnjS3010P3W6n1Fjy3jx-x4W919MMB44-H1WW8CGv8z5KgDv1W8_8z9b8ZjryfN99LGnZr1rYqW3MMHDG1rtYxt111' style="color: deepskyblue">E-commerce: Da Criação à Fidelização de Clientes</a>" e aprenda a fidelizar clientes em sua loja.</h3>
            <h6 style="margin-left: 17px; margin-top: 157px ">eBook cedido por: Rock Content (https://rockcontent.com/) </h6>
        </div>
    </div>

    <!-- Início Modal-->

    <div class="modal fade" id="suporteModal" role="dialog" style="margin-top: 50px">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                    {!! Form::open(array('route' => 'contato_email', 'class' => 'form')) !!}

                    <fieldset>
                        <legend>Contato!</legend>

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
                                    <input name="TELEFONE" placeholder="(14)3333-3333" class="form-control" type="text">
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Empresa</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                    <input name="EMPRESA" placeholder="Empresa" class="form-control" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Dúvida</label>
                            <div class="col-md-6 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                                    <textarea class="form-control" name="SUGESTAO" placeholder="Deixe sua dúvida ou sugestão."></textarea>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Enviar',  array('class'=>'btn btn-success')) !!}
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

    <!-- Fim Modal -->

</div>

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/metisMenu.min.js"></script>
<script src="/js/raphael.min.js"></script>
<script src="/js/morris.min.js"></script>
<script src="/js/morris-data.js"></script>
<script src="/js/sb-admin-2.js"></script>
<script src="/js/home.js"></script>

</body>

</html>