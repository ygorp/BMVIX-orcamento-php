<?php
// Conecte-se ao seu banco de dados MySQL
include "/php/banco.php";

if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

// Receba os dados do formulário
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$modelo = $_POST['modelo'];
$facial = $_POST['facial'];
$resticao = $_POST['resticao'];
$app = $_POST['app'];
$funcionarios = $_POST['funcionarios'];

$tipoSistema = '';

if ($modelo.value === 'idclass' || 'idface' || 'idflex') {
    $tipoSistema ='rhid';
} else {
    $tipoSistema = ['secullum web pro', 'secullum web ultimate', 'secullum offline'];
} if ($app.value === 'sim') {
    $tipoSistema = 'secullum web pro';
} elseif ($app.value === 'sim' && ($facial === 'sim' || $resticao === 'sim')) {
    $tipoSistema = 'secullum web ultimate';
} elseif ($modelo === 'outro') {
    $tipoSistema = 'Secullum offline';
}



// Execute a consulta no banco de dados
$sql = "SELECT * FROM $tipoSistema WHERE nome = '$nome' AND email = '$email'";
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
