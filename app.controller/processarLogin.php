<?php
include "app.model/login.php";

if ($_SERVER['REQUEST_MODE'] == 'POST' && $_POST) {
    IF (isset($_POST['usuario']) && isset($_POST['senha'])){
        // executa a função que valida o login e coloca no vetor erros, informações caso haja algum erro na validação.
        $erros = validarLogin($_POST);
        if ($erros) {
            $parametros = "";
            foreach ($erros as $campo => $erro) {
                $parametros = "&$campo=$erro";
            }
            
            header ('Location: ../?tela=formularioDeLogin'.$parametros);
            exit;
        } else {
            header ('Location: ../.');
        }
    } else {
        header ('Location: ../.');
    }
}
?>