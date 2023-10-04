<?php
// Substitua 'SUA_CHAVE_DE_API' pela sua chave de API da OpenAI.
$api_key = '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';

// Função para enviar uma solicitação para a API do ChatGPT.
function enviarSolicitacaoAPI($mensagem) {
    global $api_key;
    
    $url = 'https://api.openai.com/v1/engines/davinci-codex/completions';
    $data = json_encode([
        'prompt' => $mensagem,
        'max_tokens' => 50, // Ajuste o número de tokens conforme necessário.
    ]);

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $api_key,
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

// Verificar se o formulário foi enviado.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter informações do formulário.
    $nomeEmpresa = $_POST['nome'];
    $cnpjEmpresa = $_POST['cnpj'];
    $relogio = $_POST['relogio'];
    $modelo = $_POST['modelo'];
    $app = $_POST['app'];
    $facial = $_POST['facial'];
    $restricao = $_POST['restricao'];
    $funcionarios = intval($_POST['funcionarios']);

    // Montar uma mensagem para enviar à API.
    $mensagem = "Quero um orçamento para $quantidade unidades do serviço de $tipoServico com prazo de entrega em $prazoEntrega dias.";

    // Enviar a mensagem à API para gerar o orçamento.
    $respostaAPI = enviarSolicitacaoAPI($mensagem);

    // Extrair o orçamento da resposta da API.
    $orcamento = $respostaAPI['choices'][0]['text'];

    // Apresentar o orçamento ao usuário.
    echo json_encode($orcamento);
}
?>