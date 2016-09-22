<?php
    session_start();
    include_once 'app.model/funcoes.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Sistema Médico de Especialidades Online</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="app.public/img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="app.public/css/estilos.css">
        <script type="text/javascript" src="app.public/plugins/jquery310.min.js"></script>
        <script type="text/javascript" src="app.public/js/scripts.js"></script>
    </head>
    <body>
        <div id="main">
            <header class="cabecalho">
                <!-- Logo da Empresa -->
                <img src="app.public/img/cab_logotipo.png" alt="SEMESE - Serviços Médicos Sepetiba LTDA"/>
                <!-- Título da Empresa -->
                <p class="titulo"><span>S</span>ISTEMA <span>S</span>emese de <span>S</span>egurança e <span>M</span>edicina do <span>T</span>rabalho</p>
                
                <?php if (estaLogado()) : ?>
                    <p class="boasvindas">Olá Fulano, seja bem vindo!</p>
                <?php endif; ?>
                <!-- Menu -->
                <nav class="menu">
                    <ul>
                    <!-- fica convencionado que o nome do parâmetro passado pela URL é tela -->
                    <?php if (estaLogado()) :
                        $perfil = recuperarPerfil();?>
                        <!-- peril administrador -->
                        <?php if ($perfil == 1) : ?>
                        <li><a href="?tela=listaDeAdmnistradores">Cadastrar Administrador</a></li>
                        <li><a href="?tela=listaDeSocios">Cadastrar Sócio</a></li>
                        <li><a href="?tela=listaDeAssistentes">Cadastrar Assistente Adm</a></li>
                        <li><a href="?tela=listaDeAuxiliares">Cadastrar Auxiliar Adm</a></li>
                        <?php endif; ?>
                    <?php endif ?>
                    </ul>
                </nav>
            </header>
            <div class="content">
                <?php
                    if (estaLogado()) {
                        if (isset($_GET['pagina']) && $_GET['pagina']) {
                            if (temPermissao($_GET['pagina'])) {
                                $view = "app.view/".$_GET['pagina'].".php";
                                if (file_exists($view)) {
                                    include $view;
                                } else {
                                    include "app.view/404.php";
                                }
                            } else {
                                include "app.view/403.php";
                            }
                        } else {
                            include "app.view/home.php";
                        }
                    } else {
                        include "app.view/formularioDeLogin.php";
                    }
                ?>
            <!--- <footer class="rodape">
                <p>&copyDesenvolvido por: jccp74 - Tecnologia da Informação Ltda. - Autor: Claudio</p>
            </footer> -->
        </div>
    </body>
</html>