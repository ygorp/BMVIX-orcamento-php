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
        <form class="row g-3" id="form">
            <div class="col-md-8">
                <label for="nome" class="form-label">Nome da empresa:</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>
            <div class="col-md-4">
                <label for="cnpj" class="form-label">CNPJ da empresa:</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj">
            </div>
            <div class="col-md-4">
                <label for="relogio" class="form-label">Possui algum relógio?</label>
                <select id="relogio" name="relogio" class="form-select">
                    <option selected>selecione uma opção</option>
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="modelo" class="form-label">Qual modelo?</label>
                <select class="form-select" name="modelo" id="modelo" disabled>
                    <option value="" selected ></option>
                    <option value="idclass">IDCLASS</option>
                    <option value="idface">IDFACE</option>
                    <option value="idflex">IDFLEX</option>
                    <option value="idacces">IDACCES</option>
                    <option value="repidx">REP IDX</option>
                    <option value="rwipointline">RW IPOINTLINE</option>
                    <option value="henryprisma">HENRY - PRISMA</option>
                    <option value="henryprismasuperfacil">HENRY - PRISMA SUPER FÁCIL</option>
                    <option value="henryhexa">HENRY - HEXA</option>
                    <option value="henryprimmeponto">HENRY - PRIMME PONTO</option>
                    <option value="henryprimmepontosuperfacil">HENRY - PRIMME PONTO SUPER FÁCIL</option>
                    <option value="henryhexaadvanced">HENRY - HEXA ADVANCED</option>
                    <option value="henryprismasuperfaciladvanced">HENRY - PRISMA SUPER FÁCIL ADVANCED</option>
                    <option value="henrypontoeadvanced">HENRY - PONTO E ADVANCED</option>
                    <option value="henryprimmeacessoargosprimmesf">HENRY - PRIMME ACESSO/ARGOS/PRIMME SF</option>
                    <option value="henryprismasuperfaciladvanced671">HENRY - PRISMA SUPER FÁCIL ADVANCED 671</option>
                    <option value="henryhexaadvanced671">HENRY - HEXA ADVANCED 671</option>
                    <option value="topdatainnerrep">TOPDATA - INNER REP</option>
                    <option value="topdatainnerrepplus">TOPDATA - INNER REP PLUS</option>
                    <option value="topdatainnerponto">TOPDATA - INNER PONTO</option>
                    <option value="proveukurumim373ii">PROVEU - KURUMIM 373 II</option>
                    <option value="proveukurumimrep2">PROVEU - KURUMIM REP 2</option>
                    <option value="proveukurumimrep3">PROVEU - KURUMIM REP 3</option>
                    <option value="madisrodbelmdrep">MADIS RODBEL - MD REP</option>
                    <option value="madisrodbelmdrepevo">MADIS RODBEL - MD REP EVO</option>
                    <option value="madisrodbelrep0705">MADIS RODBEL - REP 0705</option>
                    <option value="madisrodbelmdevoii">MADIS RODBEL - MD EVO II</option>
                    <option value="madisrodbelrep0706">MADIS RODBEL - REP 0706</option>
                    <option value="dimepprintpointii">DIMEP - PRINTPOINT II</option>
                    <option value="dimepprintpointiii">DIMEP - PRINTPOINT III</option>
                    <option value="dimepminiprint">DIMEP - MINIPRINT</option>
                    <option value="dimepsmartprint">DIMEP - SMART PRINT</option>
                    <option value="dimepsmartpoint">DIMEP - SMART POINT</option>
                    <option value="trixxrep520">TRIX - XREP 520</option>
                    <option value="outros">OUTROS</option>
                </select>
            </div>            
            <div class="col-md-4">
                <label for="app" class="form-label">Precisa de aplicativo?</label>
                <select name="app" id="app" class="form-select">
                <option>Sim</option>
                <option>Não</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="facial" class="form-label">Precisa de Facial?</label>
                <select name="facial" id="facial" class="form-select">
                <option>Sim</option>
                <option>Não</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="resticao" class="form-label">Precisa de restrição?</label>
                <select name="restricao" id="restricao" class="form-select">
                <option>sim</option>
                <option>Não</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="funcionarios" class="form-label">Quantos funcionários?</label>
                <input name="funcionarios" id="funcionarios" class="form-control">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" id="btnModal" data-toggle="modal" data-target="#ExemploModalCentralizado">Gerar orçamento</button>
            </div>
        </form>

        <!--<div id="exibir_orcamento" class="hidden">-->
        <div id="modal-body" class="hidden">

        </div>
    </main>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
    <script src="../js/select.js"></script>
</body>
</html>