<?php
// Capturar os dados do formulário
$nomeEmpresa = $_POST['nome'];
$cnpjEmpresa = $_POST['cnpj'];
$relogio = $_POST['relogio'];
$modelo = $_POST['modelo'];
$app = $_POST['app'];
$facial = $_POST['facial'];
$restricao = $_POST['restricao'];
$funcionarios = intval($_POST['funcionarios']);

// Determinar o sistema adequado com base nas opções selecionadas
$sistemaPonto = "";

if (in_array($modelo, ['idclass', 'idflex', 'idface', 'idaccess']) || $app === 'Sim') {
    $sistemaPonto = "RHID";
} elseif ($modelo !== '' || $app === 'Sim') {
    $sistemaPonto = "Secullum Web Pro";
} elseif ($facial === 'Sim' && $restricao === 'Sim') {
    $sistemaPonto = "Secullum Web Ultimate";
} else {
    $sistemaPonto = "Secullum Offline";
}

// Calcular o valor do orçamento com base no sistema e na quantidade de funcionários
$valorTotal = 0;

if ($sistemaPonto === "Secullum Web Pro") {
    if ($funcionarios <= 10) {
        $valorTotal = 80.00;
    } elseif ($funcionarios >=11 && $funcionarios <= 20) {
        $valorTotal = $funcionarios * 89.00;
    } elseif ($funcionarios >=21 && $funcionarios <= 50) {
        $valorTotal = $funcionarios * 4.45;
    } elseif ($funcionarios >=51 && $funcionarios <= 100) {
        $valorTotal = $funcionarios * 4.12;
    } elseif ($funcionarios >=101 && $funcionarios <= 200) {
        $valorTotal = $funcionarios * 3.79;
    }
}

if ($sistemaPonto === "Secullum Web Ultimate") {
    if ($funcionarios <= 10) {
        $valorTotal = 89.00;
    } elseif ($funcionarios >=11 && $funcionarios <= 50) {
        $valorTotal = $funcionarios * 5.64;
    } elseif ($funcionarios >=51 && $funcionarios <= 100) {
        $valorTotal = $funcionarios * 5.19;
    } elseif ($funcionarios >=101 && $funcionarios <= 200) {
        $valorTotal = $funcionarios * 4.80;
    }
}

if ($sistemaPonto === "RHID") {
    if ($funcionarios <= 50) {
        $valorTotal = 80.00;
    } elseif ($funcionarios <= 100) {
        $valorTotal = 99.00;
    } elseif ($funcionarios <= 200) {
        $valorTotal = 120.00;
    } elseif ($funcionarios <= 300) {
        $valorTotal = 180.00;
    } elseif ($funcionarios <= 400) {
        $valorTotal = 230.00;
    }
}

if ($sistemaPonto === "Secullum Offline") {
    if ($funcionarios <= 30) {
        $valorTotal = 80.00;
    } elseif ($funcionarios > 30 && $funcionarios <= 50) {
        $valorTotal = 112.00;
    } elseif ($funcionarios >=51 && $funcionarios <= 100) {
        $valorTotal = 160.00;
    } elseif ($funcionarios >=101 && $funcionarios <= 200) {
        $valorTotal = 260.00;
    }
}

$data = [
    'Nome' => $nomeEmpresa,
    'CNPJ' => $cnpjEmpresa,
    'Sistema_de_ponto' => $sistemaPonto,
    'Valor_orcamento' => $valorTotal
];

echo json_encode($data);