<?php
include 'config.php';
$cpf = $_POST['cpf'] ?? '';
$senha = $_POST['senha']?? '';
if ($cpf === null|| $senha === null){
echo 'Por favor tente novamente, todos os dados devem ser preenchidos!';
}else{
    $sql = "SELECT cpf, senha  FROM usuario WHERE cpf  = ?";
$stmt = $conn->prepare($sql);
$stmt ->bind_param("s", $cpf);
$stmt ->execute();
$result = $stmt->get_result();
$dados = $result->fetch_assoc();
if($dados && password_verify($senha, $dados['senha'])){
$sql = "DELETE FROM usuario WHERE cpf  = ?";
$stmt = $conn->prepare($sql);
$stmt ->bind_param("s", $cpf);
$stmt ->execute();
echo'Usuario foi excluido!';
$stmt->close();
}else{
    echo 'usuario não existe!';
    $stmt->close();
}
}
?>