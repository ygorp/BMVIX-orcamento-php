<?php
// Conecte-se ao seu banco de dados MySQL
include "/php/banco.php";

if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

// Receba os dados do formulário
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$relogio = $_POST['relogio'];
$facial = $_POST['facial'];
$resticao = $_POST['resticao'];
$app = $_POST['app'];
$controlid = $_POST['controlid'];
$escala = $_POST['escala'];
$funcionarios = $_POST['funcionarios'];

// Execute a consulta no banco de dados
$sql = "SELECT * FROM sua_tabela WHERE nome = '$nome' AND email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Encontrei registros correspondentes, retorne os dados
    $row = $result->fetch_assoc();
    $data = [
        'nome' => $row['nome'],
        'email' => $row['email']
    ];

    echo json_encode($data);
} else {
    // Não encontrou registros correspondentes
    echo "Nenhum resultado encontrado.";
}

$conn->close();
?>
