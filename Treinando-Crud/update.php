<?php
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$cpf = $_POST['cpf'];
$senha = $_POST['senha'];
include 'config.php';
$sql = "SELECT cpf, senha  FROM usuario WHERE cpf  = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $cpf);
$stmt->execute();
$result = $stmt->get_result();
$dados = $result->fetch_assoc();
if ($dados && password_verify($senha, $dados['senha'])) {
    if (!empty($nome)) {
        $sql = "UPDATE usuario set nome = ? WHERE cpf = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss",$nome, $cpf);
        $stmt->execute();
    }
    if (!empty($idade)) {
        $sql = "UPDATE usuario set idade = ? WHERE cpf = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $idade, $cpf);
        $stmt->execute();
    }
    if ($stmt->affected_rows > 0) {
    echo "Atualizações feitas com sucesso!";
} else {
    echo 'Erro para fazer as atualizações!';
}
}else{
    echo 'Dados ou senha incorreta!';
}
