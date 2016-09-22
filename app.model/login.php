<?php

include file_exists('../app.model/mysql.php');

function validarLogin(array $dados) {
    $erros = array();
    
    if (!trim($dados['usuario'])){
        $erros['usuario'] = 'vazio';
    }
    
    $senha = trim($dados['senha']);
    if (empty($senha)) {
        $erros['senha'] = 'vazio';
    }
    
    $sql = "SELECT * FROM usuarios WHERE usuario = '" . $dados['usuario'] . "'";
    $nomeExiste = executarSql($sql);
    if (mysqli_num_rows($nomeExiste) == 1) {
        $usuario = mysqli_fetch_array($nomeExiste);
        if (md5($dados['senha']) == $dados['senha']){
            session_start();
            $_SESSION['idUsuario'] = $usuario['id'];
            $_SESSION['usuario'] = $usuario['usuario'];
            $_SESSION['email'] = $usuario['email'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['perfil'] = $usuario['perfil'];
        } else {
            $erros['erro'] = 'invalido';
        }
    } else {
        $erros['erro'] = 'invalido';
    }
    return $erros;
}