<?php
// Receber os dados do JavaScript
$data = json_decode(file_get_contents("php://input"));

// Simular uma consulta ao banco de dados usando os dados recebidos
// Substitua isso com a lógica real do seu banco de dados
$valor = 1000 + $data->funcionarios * 50;

// Criar um array com os dados do orçamento
$orcamento = [
    "nomeEmpresa" => $data->nome,
    "cnpj" => $data->cnpj,
    "sistemaPonto" => $data->sistemaPonto,
    "funcionarios" => $data->funcionarios,
    "valor" => $valor,
];

// Retornar os dados do orçamento como JSON
header("Content-Type: application/json");
echo json_encode($orcamento);
?>
