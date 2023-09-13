<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMVIX - Home</title>

    <link rel="stylesheet" href="css/home.css">

</head>
<body>
    <header class="topo">
        <img src="/img/logo.png" alt="Logo empresa bmvix">
        <ul class="menu">
            <li><a href="#">Inicio</a></li>
            <li><a href="#">Orçamentos</a></li>
        </ul>
    </header>

    <main>
        <form action="" method="post">
            <div>
                <label for="nome">Digite o nome do cliente</label>
                <input type="text" name="nome" id="nome"> 
            </div>
            <div>
                <label for="cnpj">Digite o CNPJ</label>
                <input type="text" name="cnpj" id="cnpj"> 
            </div>
            <div>
                <label for="funcionarios">Quantos funcionarios</label>
                <input type="text" name="funcionarios" id="funcionarios"> 
            </div>
            <div class="app-facial">
                <div class="app">
                    <label for="aplicativo">Vai utilizar aplicativo</label>
                    <select name="aplicativo" id="aplicativo">
                        <option value="sim">Sim</option>
                        <option value="nao">Não</option>
                    </select>
                </div>             
                <div class="facial">
                    <label for="facial">Vai utilizar Facial</label>
                    <select name="facial" id="facial">
                        <option value="sim">Sim</option>
                        <option value="nao">Não</option>
                    </select> 
                </div>
                
            </div>
            <div class="id-rep">
                <div class="controlid">
                    <label for="controlid">Possui control ID</label>
                    <select name="controlid" id="controlid">
                        <option value="sim">Sim</option>
                        <option value="nao">Não</option>
                    </select>
                </div>
                
                <div class="relogio">
                    <label for="relogio">Possui relógio de ponto</label>
                    <select name="relogio" id="relogio">
                        <option value="sim">Sim</option>
                        <option value="nao">Não</option>
                    </select> 
                </div>
            </div>
            
            <div class="tipo-rep">
                <label for="tipo">Qual tipo do relógio</label>
                <select name="tipo" id="tipo">
                    <option value="inmetro">Inmetro</option>
                    <option value="naoinmetro">Não Inmetro</option>
                </select> 
            </div>
            
           <div class="button">
                <input type="submit" value="Gerar orçamento">
           </div>
        </form>
    </main>
</body>
</html>