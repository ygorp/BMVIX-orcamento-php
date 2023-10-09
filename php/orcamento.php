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

$sistemasDePonto = array(
    "secullum_web_pro" => array(
        "caracteristicas" => array("qualquer modelo de relógio", "aplicativo = sim"),
        "satisfaz" => true
    ),
    "secullum_web_ultimate" => array(
        "caracteristicas" => array("qualquer modelo de relógio", "facial = sim ou restrição = sim"),
        "satisfaz" => true
    ),
    "RHID" => array(
        "caracteristicas" => array("modelo = idflex, idface, idclass, rep idx, idacess"),
        "satisfaz" => true
    ),
    "secullum_offline" => array(
        "caracteristicas" => array("qualquer modelo de relógio", "não precisa de app, nem facial, nem restrição"),
        "satisfaz" => true
    )
);

// Verifique cada sistema de ponto
foreach ($sistemasDePonto as $sistema => $info) {
    $satisfaz = true;

    // Verifique cada característica do sistema
    foreach ($info["caracteristicas"] as $caracteristica) {
        // Verifique se a característica é satisfeita com base nos dados do formulário
        if ($caracteristica === "qualquer modelo de relógio" && $relogio === "nao") {
            $satisfaz = false;
            break;
        } elseif ($caracteristica === "aplicativo = sim" && $app === "Não") {
            $satisfaz = false;
            break;
        } elseif ($caracteristica === "facial = sim" && $facial === "Não") {
            $satisfaz = false;
            break;
        } elseif ($caracteristica === "restrição = sim" && $restricao === "Não") {
            $satisfaz = false;
            break;
        } elseif (strpos($caracteristica, "modelo =") === 0) {
            $modelo = substr($caracteristica, 8);
            if ($modelo !== $modelo) {
                $satisfaz = false;
                break;
            }
        }
    }

    // Se todas as características foram satisfeitas, adicione o sistema à lista de selecionados
    if ($satisfaz) {
        $sistemasSelecionados[] = $sistema;
    }
}

// Se não houver sistemas selecionados, indique Secullum Web Pro e RHID
if (empty($sistemasSelecionados)) {
    $sistemasSelecionados = array("secullum_web_pro", "RHID");
}

return $sistemasSelecionados;


// Inicialize um array para armazenar os sistemas que se encaixam nas características fornecidas
$sistemasSelecionados = array();

// Calcular o valor do orçamento com base no sistema e na quantidade de funcionários
$valorTotal = 0;
$valorTotalMensal = 0;
$valorTotalAnual = 0;

if ($sistemasSelecionados === "secullum_web_pro") {
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

if ($sistemasSelecionados === "secullum_web_ultimate") {
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

if ($sistemasSelecionados === "RHID") {
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

if ($sistemasSelecionados === "secullum_offline") {
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
if (in_array($sistemasSelecionados, ['RHID', 'secullum_web_pro', 'secullum_web_ultimate'])) {
    $data = [
        'Nome' => $nomeEmpresa,
        'CNPJ' => $cnpjEmpresa,
        'Sistema_de_ponto' => $sistemasSelecionados,
        'Valor_orcamento' => $valorTotal
    ];
} elseif ($sistemasSelecionados === 'secullum_offline') {
    $data = [
        'Nome' => $nomeEmpresa,
        'CNPJ' => $cnpjEmpresa,
        'Sistema_de_ponto' => $sistemasSelecionados,
        'Valor_orcamento_mensal' => $valorTotalMensal,
        'Valor_orcamento_anual' => $valorTotalAnual
    ];
}

echo json_encode($data);