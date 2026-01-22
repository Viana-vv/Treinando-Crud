<?php
$nome = $_POST['nome'] ;
$idade = $_POST['idade'];
$cpf = $_POST['cpf'] ;
$senha = $_POST['senha'];
$passhash = password_hash($senha, PASSWORD_DEFAULT);
if ($nome === null ||  $idade === null || $cpf === null){
echo 'Por favor tente novamente, todos os dados devem ser preenchidos!';
}else{
include 'config.php';
if($idade >= 18 && $idade <=100 ){
$sql = "SELECT nome, idade, cpf FROM usuario WHERE nome = ? AND idade = ? AND cpf  = ?";
$stmt = $conn->prepare($sql);
$stmt ->bind_param("sis", $nome, $idade, $cpf);
$stmt ->execute();
$result = $stmt->get_result();
if($result->num_rows>0 ){
echo "Já existe um usuario!";
}else{
$sql = "INSERT INTO usuario (nome, idade, cpf,senha) VALUES (?,?,?,?)";
$stmt = $conn->prepare($sql);
$stmt ->bind_param("siss", $nome, $idade, $cpf,$passhash);
$stmt ->execute();
if(!$stmt){
    echo 'Erro ao inserir o questionario';
}else{
    echo 'Usuario está cadastrado!';
}
}
}
else 
{
echo "O usuario não tem idade minima para fazer cadastro!";
}
}

