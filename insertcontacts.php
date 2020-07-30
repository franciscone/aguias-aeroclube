<?php
include_once "cadastros/crud/conexao.php";

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $mensagem = $_POST['mensagem'];

    $sql = "INSERT INTO tb_contato (nome_contato , email_contato, nm_celular_contato, mensagem_contato) values ('$nome', '$email', '$celular', '$mensagem' )";


    if (!mysqli_query($conn, $sql)) {
        die("Erro ao inserir os dados: " . mysqli_error($conn));
    }else {
        echo "<script>alert('Dados enviados com sucesso!');</script>";

        echo "<script> location.href= 'contact.php'; </script>";
    }
    mysqli_close($conn);

?>