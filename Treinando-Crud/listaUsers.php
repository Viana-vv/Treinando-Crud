<?php
include 'config.php';
$sql = "SELECT nome, idade, cpf FROM usuario";
$stmt = $conn->prepare($sql);
$stmt ->execute();
$result = $stmt->get_result();
while($lista = mysqli_fetch_assoc($result)){
echo "Nome: " . $lista['nome']. " Idade: ". $lista['idade']. " CPF: " . $lista['cpf']. "<br>";
}
echo 'Acabou a lista de usuarios!';
?>