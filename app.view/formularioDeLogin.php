<div class="janela login">
    <fieldset>
        <h3>Bem Vindo(a)!</h3>
        <p>Por favor, digite seu nome de usuário e senha.</p> <hr> <br/>
        <form method="post" action="app.controller/processarLogin.php">
            <label for="usuario">Nome: <br/><input type="text" name="usuario" size="30"><br/><br/>
            <label for="usuario">Senha: <br><input type="password" name="senha" size="30"><br/><br/>
            <input type="submit" value="Entrar" name="entrar">
        </form>
    </fieldset>
</div>
<?php

?>