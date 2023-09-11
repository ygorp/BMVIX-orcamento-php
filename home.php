<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMVIX - Home</title>

    <link rel="stylesheet" href="css/home.css">

</head>
<body>
    <header class="topo-menu">
        <img src="/img/logo.png" alt="Logo empresa BMVIX">
        <nav class="nav">
            <ul class="menu">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Orçamento</a></li>
            </ul>
        </nav>
        <div class="pesquisa">
            <input type="search" name="pesquisa" id="pesquisa" placeholder="Digite CNPJ do cliente">
            <button class="pesquisa">Pesquisar</button>
        </div>
    </header>

    <main>
        <form action="" method="post" id="form-orcamento">
            <input type="text" name="nome" id="nome" placeholder="Digite o nome do cliente">
            <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ cliente">
            <label for="relogio">Possui algum relógio:</label>
            <select name="relogio" id="relogio">
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
            </select>
            <input type="text" name="tipo-rep" id="tipo-rep" placeholder="Inmetro ou não">
            <input type="text" name="app" id="app" placeholder="Precisa de aplicativo">
            <input type="text" name="facial" id="facial" placeholder="Vai utilizar facial">
            <input type="text" name="funcionario" id="funcionario" placeholder="Quantos funcionários">

            <input type="submit" value="Gerar Orçamento">
        </form>
    </main>
</body>
</html>