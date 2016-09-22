<?php
function estaLogado() {
    if (isset($_SESSION['idUsuario']) && isset($_SESSION['nome']) && isset($_SESSION['email']) && isset($_SESSION['perfil'])) {
        return true;
    } else {
        return false;
    }
}

function recuperarPerfil() {
    switch ($_SESSION['perfil']) {
        case 1:
            $perfil = "Administrador(a)";
            return $perfil;
            break;

        case 2:
            $perfil = "Sócio(a)";
            return $perfil;
            break;

        case 3:
            $perfil = "Assistente Administrativo(a)";
            return $perfil;
            break;

        case 4:
            $perfil = "Auxiliar Administrativo(a)";
            return $perfil;
            break;

        default:
            break;
    }
}
?>