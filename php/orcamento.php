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
$options = [
    'RHID' => "RHID",
    'Secullum Web Pro' => "Secullum Web Pro",
    'Secullum Web Ultimate' => "Secullum Web Ultimate",
    'Secullum Offline Mensal' => "Secullum Offline Mensal",
    'Secullum Offline Anual' => "Secullum Offline Anual",
];

// verificar as seleções
if (in_array($modelo, ['idclass', 'idflex', 'idface', 'idaccess', 'rep idx'])) {
    $options = [
        'RHID' => "RHID",
    ];
}

if ($app === 'sim') {
    $options = [
        'Secullum Web Pro' => "Secullum Web Pro",
    ];
}

if ($facial === 'Sim' || $restricao === 'Sim') {
    // Mantenha apenas a opção Secullum Web Ultimate
    $options = [
        'Secullum Web Ultimate' => "Secullum Web Ultimate",
    ];
}

if ($app === 'Não' && $facial === 'Não' && $restricao === 'Não') {
    $options = [
        'Secullum Offline' => "Secullum Offline",
    ];
}

$sistemaPonto = reset($options);

// Calcular o valor do orçamento com base no sistema e na quantidade de funcionários
$valorTotal = 0;
$valorTotalMensal = 0;
$valorTotalAnual = 0;

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
        $valorTotalMensal = 80.00;
        $valorTotalAnual = 620.00;
    } elseif ($funcionarios > 30 && $funcionarios <= 50) {
        $valorTotalMensal = 112.00;
        $valorTotalAnual = 860.00;
    } elseif ($funcionarios >=51 && $funcionarios <= 100) {
        $valorTotalMensal = 160.00;
        $valorTotalAnual = 1380.00;
    } elseif ($funcionarios >=101 && $funcionarios <= 200) {
        $valorTotalMensal = 260.00;
        $valorTotalAnual = 2380.00;
    }
}

$valorOrcamento = null;

// Determine a chave com base no sistema de ponto
if (in_array($sistemaPonto, ['RHID', 'Secullum Web Pro', 'Secullum Web Ultimate'])) {
    $data = [
        'Nome' => $nomeEmpresa,
        'CNPJ' => $cnpjEmpresa,
        'Sistema_de_ponto' => $sistemaPonto,
        'Valor_orcamento' => $valorTotal
    ];
} elseif ($sistemaPonto === 'Secullum Offline') {
    $data = [
        'Nome' => $nomeEmpresa,
        'CNPJ' => $cnpjEmpresa,
        'Sistema_de_ponto' => $sistemaPonto,
        'Valor_orcamento_mensal' => $valorTotalMensal,
        'Valor_orcamento_anual' => $valorTotalAnual
    ];
}

echo json_encode($data);