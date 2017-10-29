<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

{!! Charts::assets() !!}

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="RobsonK">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pretium Elit</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/css/home.css" rel="stylesheet" type="text/css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">

            <li class="dropdown">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Sair
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

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
                                <a href="flot.html">Buybox</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{ url('/relatorio') }}"><i class="fa fa-table fa-fw"></i> Relatório</a>
                    </li>
                    <li>
                        <a href="{{ url('/relatorio') }}"><i class="fa fa-envelope-o fa-fw"></i> Suporte</a>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div class="content">
        <div class="">
            <div class="col-lg-12">
                <h1 class="titulo" style="font-family: 'Segoe UI Black'">Gráficos Comparativos</h1>
            </div>
        </div>

        <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12" style="">
                    {!! $buybox->render() !!}
                    {!! $concorrentes->render() !!}
                </div>
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