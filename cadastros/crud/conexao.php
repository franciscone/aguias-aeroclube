<?php

$servidor = "localhost";
$banco = "db_aeroclube";
$usuario = "matheusXAMPP";
$senha = "fapamajo1120";
$porta = "3306";

$conn = mysqli_connect($servidor, $usuario, $senha, $banco, $porta);

if(!$conn){
    die("Erro ao se conectar ao banco de dados". mysqli_connect_error());
}
echo "<script>alert('Conexão bem sucedida!')</script>"

?>