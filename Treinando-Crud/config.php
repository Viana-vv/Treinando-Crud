<?php
$host = "localhost";
    $user = "root";
    $pass = "";
    $bank = "treinee"; 
    $conn = new mysqli($host, $user, $pass, $bank);
if (!$conn){
    echo 'Erro de conexão com o banco!';
}

?>