<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMVIX - Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css">

</head>
<body>
    <header class="topo">
        <img src="../img/logo.png" alt="Logo empresa bmvix">
        <ul class="menu">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Orçamentos</a></li>
        </ul>
        <a href="/php/logout.php" class="logout">Sair</a>
    </header>

    <main class="container">
        <form class="row g-3">
            <div class="col-md-8">
                <label for="nome" class="form-label">Nome da empresa:</label>
                <input type="text" class="form-control" id="nome">
            </div>
            <div class="col-md-4">
                <label for="cnpj" class="form-label">CNPJ da empresa:</label>
                <input type="text" class="form-control" id="cnpj">
            </div>
            <div class="col-4">
                <label for="funcionarios" class="form-label">Quantos funcionários:</label>
                <input type="text" class="form-control" id="funcionarios">
            </div>
            <div class="col-4">
                <label for="app" class="form-label">Precisa de aplicativo:</label>
                <input type="text" class="form-control" id="app">
            </div>
            <div class="col-md-4">
                <label for="inputCity" class="form-label">Precisa de Facial:</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="col-md-4">
                <label for="relogio" class="form-label">Possui algum relógio:</label>
                <select id="relogio" class="form-select">
                <option selected>Nenhum...</option>
                <option>Inmetro</option>
                <option>Não Inmetro</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="controlid" class="form-label">Possui ControlID:</label>
                <input type="text" class="form-control" id="controlid">
            </div>
            <div class="col-md-4">
                <label for="resticao" class="form-label">Precisa de restrição:</label>
                <input type="text" class="form-control" id="resticao">
            </div>
            <div class="col-md-4">
                <label for="resticao" class="form-label">Utiliza Banco de horas:</label>
                <input type="text" class="form-control" id="resticao">
            </div>
            <div class="col-md-4">
                <label for="resticao" class="form-label">Utiliza escala:</label>
                <input type="text" class="form-control" id="resticao">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Gerar orçamento</button>
            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>