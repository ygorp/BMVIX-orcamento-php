<?php
include "banco.php";

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Receber dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha

// Inserir dados no banco de dados
$sql = "INSERT INTO cadastro (nome, email, senha) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $senha);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php");
} else {
    echo "Erro no cadastro: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
