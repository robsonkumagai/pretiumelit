<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Pretium Elit</title>

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/plugins.css" />
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/nexa-web-font.css" />
    <link rel="stylesheet" href="/css/opensans-web-font.css" />
    <link rel="stylesheet" href="/css/responsive.css" />
    <link rel="stylesheet" href="/css/home.css" />

    <script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body>
<div class='preloader'><div class='loaded'>&nbsp;</div></div>

<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">

{!! Charts::assets() !!}
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://cijulenlinea.ucr.ac.cr/dev-users/">
                <img src="/images/logo.png" alt="LOGO" style="width: 55px">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <i class="fa fa-fw fa fa-user-o"></i>  {{ Auth::user()->name }} <span class="caret"></span>
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
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="faq"><i class="fa fa-fw fa fa-home"></i> Home</a>
                </li>

                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-bar-chart-o"></i> Relatórios <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="{{ url('/relatorio') }}"><i class="fa fa-arrow-circle-o-right"></i> Produtos</a></li>
                    </ul>
                </li>

                {!! $totalProdutos !!}


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <div class="col-md-6" style="background-color:white;">
                        {!! $buybox->render() !!}
                    </div>
                    <div class="col-md-6" style="background-color:white;">
                        {!! $concorrentes->render() !!}
                    </div>
                    <div class="col-md-6" style="background-color:white;">
                        {!! $categoria->render() !!}
                    </div>
                    <div class="col-sm-6" style="background-color:white;">
                        {!! $marcas->render() !!}
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <footer id="footer" class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright text-center">
                        <p>Pretium Elit 2017 - Todos os direitos reservados.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->



<script src="/js/vendor/jquery-1.11.2.min.js"></script>
<script src="/js/vendor/bootstrap.min.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/jquery.magnific-popup.js"></script>
<script src="/js/main.js"></script>
<script src="/js/admin/index.js"></script>
<script src="/js/home.js"></script>

</body>
</html>