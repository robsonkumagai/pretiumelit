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
                    <a href="#suporteModal" id="#suporteBtn" data-target="#suporteModal" data-toggle="modal"><i class="fa fa-envelope-o fa-fw"></i> Contato</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Fim Sidebar -->

    <!-- Inicio Conteúdo -->

    <div class="content">
        {!! Charts::assets() !!}

        <div class="col-lg-12">
            <h1 class="titulo" style="font-family: 'Segoe UI Black'">Gráficos Comparativos</h1>
        </div>

        <div class="container-fluid">
            <div class="row col-md-12">
                {!! $buybox->render() !!}
                {!! $concorrentes->render() !!}
            </div>
        </div>

        <div class="container-fluid">
            <div class="row" style="margin-left: 192px">
                {!! $categoria->render() !!}
            </div>
            <div class="row" style="margin-left: 207px">
                {!! $marcas->render() !!}
            </div>
        </div>
    </div>

    <!-- Fim Conteúdo-->

    <!-- Início Modal-->

    <div class="modal fade" id="suporteModal" role="dialog" style="margin-top: 50px">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">

                    {!! Form::open(array('route' => 'portal_store', 'class' => 'form')) !!}

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
                                    <input name="SITE" placeholder="Empresa" class="form-control" type="text">
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

                        <div class="form-group">
                            <label class="col-md-4 control-label">A Pretium Elit te auxiliou em sua precificação?</label>
                            <div class="col-md-6">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="INVESTIR" value="yes" /> Sim
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="INVESTIR" value="no" /> Não
                                    </label>
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

</body>

</html>