<?php

  session_start();

  $login = "admin";
  $senha = "admin";

  if(isset($_POST["login"])){

    if($_POST["login"] == $login and $_POST["senha"] == $senha){

      $_SESSION['login'] = $login;
      $_SESSION['senha'] = $senha;
      
      echo "<script>alert('Login efetuado com sucesso!')</script>";
      echo "<script> location.href= '../cadastros/dashboardcrud.php'; </script>";

    }else{
      
      echo "<script>alert('Usuário ou senha inválidos')</script>";
      echo "<script> location.href= 'login.php'; </script>";
             
    }
  }
    
?>