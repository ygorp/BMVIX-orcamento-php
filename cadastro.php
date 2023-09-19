<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMVIX - Cadastro</title>

    <link rel="stylesheet" href="css/cadastro.css">

</head>
<body>
<div class="cadastro">
        <form action="processar_cadastro.php" method="post">
            <h2>Faça seu cadastro!</h2>
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
            <input type="email" name="email" id="email" placeholder="Digite seu email">
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha">

            <div class="btns-cadastro">
                <input type="submit" value="Cadastrar" id="btn-cadastro">
                <input type="submit" value="Cancelar" id="btn-cadastro">
            </div>
        </form>
    </div>
</body>
</html>