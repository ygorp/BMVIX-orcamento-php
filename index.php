<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMVIX - Orçamento</title>

    <link rel="stylesheet" href="css/index.css">

</head>
<body>
    <div class="login">
        <form action="/php/processa_login.php" method="post">
            <h2>Faça Login no sistema!</h2>
            <input type="email" name="email" id="email" placeholder="Digite seu email">
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha">

            <div class="links">
                <a href="esqueceu_senha.php">Esqueceu sua senha?</a> | <a href="/php/cadastro.php">Cadastre-se</a>
            </div>

            <input type="submit" value="Entrar" id="btn-login">
        </form>
    </div>
</body>
</html>