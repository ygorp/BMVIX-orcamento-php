<?php

// Receba os dados do formulário
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$modelo = $_POST['modelo'];
$facial = $_POST['facial'];
$restricao = $_POST['resticao'];
$app = $_POST['app'];
$funcionarios = $_POST['funcionarios'];

$tipoSistema = '';

if ($modelo === 'idclass' || 'idface' || 'idflex') {
    $tipoSistema ='rhid';
} else {
    $tipoSistema = ['secullum web pro', 'secullum web ultimate', 'secullum offline'];
} if ($app === 'sim') {
    $tipoSistema = 'secullum web pro';
} elseif ($app === 'sim' && ($facial === 'sim' || $resticao === 'sim')) {
    $tipoSistema = 'secullum web ultimate';
} elseif ($modelo === 'outro') {
    $tipoSistema = ['Secullum offline anual', 'secullum offline mensal'];
}


if($tipoSistema === 'secullum web pro' || 'secullum web ultimate' && $funcionarios <= 10) {
    $valor_por_funcionario = 4.75;

    $data = [
        'nome' => $nome,
        'cnpj' => $cnpj,
        'sistema_de_ponto' => $tipoSistema,
        'valor_orcamento' => $funcionarios * $valor_por_funcionario
    ];

    echo json_encode($data);
}
?>
