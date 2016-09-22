<?php

function executarSql($sql) {
    $conexao = mysql_connect('localhost', 'root', '1q2w3e', 'sssmto_bd');
    
    mysqli_set_charset($conexao, 'utf8');
    if (!$conexao) {
        header('Location: ?pagina=500');
        exit;
    }
    
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado) {
        return $resultado;
    }
}
?>