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
    <link href="/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="/css/dataTables.responsive.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />


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
            <h1 class="titulo" style="font-family: 'Segoe UI Black'">Relatório</h1>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table id="dataRelatorio" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <td style="width: 300px">Produto</td>
                        <td>Categoria</td>
                        <td>Data Atualização</td>
                        <td style="width: 160px">Valores</td>
                        <td style="width: 140px">Diferenças</td>
                        <td style="width: 140px">Status</td>
                    </tr>
                    </thead>

                    <?php
                        use App\Produtos;

                        $produtos = Produtos::get();

                        foreach ($produtos as $produto)
                        {
                            //Cálculo de porcentagem

                            if($produto['preco'] == $produto['preco_maximo']){
                                $diferencaPorc = 0;
                            }

                            if(($produto['preco'] > $produto['preco_minimo'])){
                                $diferencaPorc = 100 / ($produto['preco'] / ($produto['preco'] - $produto['preco_minimo']));
                                //$diferencaPorc = (($produto['preco_maximo'] - $produto['preco']) / $produto['preco'] * 100);
                                $produto['diffPorc'] = '<span style="color:red;">+ '.number_format($diferencaPorc, 2, ',', ' ').'%</span>';
                            } else {
                                //$diferencaPorc = (100 / ($produto['preco'] - $produto['preco_maximo']));
                                $diferencaPorc = (($produto['preco_maximo'] - $produto['preco']) / $produto['preco'] * 100);

                                if ($diferencaPorc != 0) {
                                    $produto['diffPorc'] = '<span style="color:green;">'.number_format($diferencaPorc, 2, ',', ' ').'%</span>';
                                } else {
                                    $produto['diffPorc'] = '<span>'.number_format($diferencaPorc, 2, ',', ' ').'%</span>';
                                }
                            }

                            //Cálculo de valor

                            if(($produto['preco'] > $produto['preco_minimo'])){
                                $diferencaValor = $produto['preco'] - $produto['preco_minimo'];
                                $produto['diffReais'] = '<span style="color:red;">R$'.number_format($diferencaValor, 2, ',', ' ').'</span>';
                            } else {
                                $diferencaValor = $produto['preco'] - $produto['preco_maximo'];

                                if ($diferencaValor != 0){
                                    $produto['diffReais'] = '<span style="color:green;">R$'.number_format($diferencaValor, 2, ',', ' ').'</span>';
                                } else {
                                    $produto['diffReais'] = '<span>R$'.number_format($diferencaValor, 2, ',', ' ').'</span>';
                                }
                            }

                            $produto['preco'] = '<span>R$ '.number_format($produto['preco'], 2, ',', ' ').'</span>';
                            $produto['preco_minimo'] = '<span>R$ '.number_format($produto['preco_minimo'], 2, ',', ' ').'</span>';
                            $produto['preco_maximo'] = '<span>R$ '.number_format($produto['preco_maximo'], 2, ',', ' ').'</span>';

                            if($produto['status'] == 'Ganhando Buybox') {
                                $produto['status'] = '<span style="color:green;">Ganhando Buybox</span>';
                            }

                            if($produto['status'] == 'Perdendo Buybox') {
                                $produto['status'] = '<span style="color:red;">Perdendo Buybox</span>';
                            }

                            echo '
                                   <tr>
                                        <td><strong>Produto: </strong>'.$produto["nome"].' <br><strong>Marca: </strong>'.$produto["marca"].'<br><a style="color: #00b3ee" href="'.$produto['anuncio'].'" target="_blank">Link</a> </td>
                                        <td>'.$produto["categoria"].'</td>
                                        <td>'.$produto["data_atualizacao"].'</td>
                                        <td><strong>Valor:</strong> '.$produto["preco"].' <br><strong>Valor Mínimo:</strong> '.$produto["preco_minimo"].'<br><strong>Valor Máximo:</strong> '.$produto["preco_maximo"].'</td>
                                        <td><strong>Porcentagem:</strong> '.$produto["diffPorc"].' <br><strong>Reais:</strong> '.$produto["diffReais"].'</td>
                                        <td><strong>Vencedor: </strong>'.$produto["vencedor"].'<br><strong>Status: </strong>'.$produto["status"].'</td>
                                   </tr>
                                   ';
                        }
                    ?>
                </table>
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
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>
<script src="/js/dataTables.responsive.js"></script>
<script src="/js/sb-admin-2.js"></script>
<script src="/js/home.js"></script>

</body>

</html>
