<!DOCTYPE html>
<html lang="pt-br">

<?php

session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);

  echo "<script>alert('Esteja logado para entrar na Área do Funcionário')</script> ";
  echo "<script> location.href= '../login/login.php'; </script>";
  }

$logado = $_SESSION['login'];

?>

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- CSS Styles -->
    <link rel="stylesheet" href="../styles/style.css">

    <!--Links icon-->
    <link rel="eagle icon" href="../imgs/eagle.ico" type="image/x-icon">

    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Title -->
    <title>Águias Aeroclube</title>
</head>

<body>



    <!-- Container Navbar -->
    <div class="container-fluid nav-cont">
        <nav class="navbar navbar-expand-lg main-nav px-0">
            <a class="navbar-brand ml-5" href="#">
                <img src="../imgs/eagle.png" alt="Águias Aeroclube">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar icon-bar-1"></span>
                <span class="icon-bar icon-bar-2"></span>
                <span class="icon-bar icon-bar-3"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainMenu">
                <ul class="navbar-nav ml-auto text-uppercase f1 mr-3">
                <li>
                        <a href="dashboardcrud.php" class="active-first">Dashboard Geral</a>
                    </li>
                    <li>
                        <a href="cadastraralunos.php">Cadastro Aluno</a>
                    </li>
                    <li>
                        <a href="cadastrarpilot.php">Cadastro Piloto</a>
                    </li>
                    <li>
                        <a href="cadastrarinst.php">Cadastro Instrutor</a>
                    </li>
                    <li>
                        <a href="regaulas.php">Registro de Aulas</a>
                    </li>
                    <li>
                        <a href="../index.php">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Container Navbar -->

    <!-- Container Contact Form -->
    <div class="container contact-form">
        <div class="contact-image">
            <img src="../imgs/eaglemd.png" alt="rocket_contact" />
        </div>
        <form method="post" name="dados" action="crud/crudaulas.php?acao=inserir" onSubmit="return enviardados();">
            <h3>Registro de Aulas<br>Dê o melhor de si para a conquista do Brevê!</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" name="ida" class="form-control" placeholder="Nº Matrícula Aluno" id="ida" size="54" maxlength="150" />
                    </div>
                    <div class="form-group">
                        <div class="color-gray text-center">
                            <p>Data da aula:</p>
                        </div>
                        <input type="date" name="dtaula" class="form-control" id="dtaula" />
                    </div>
                    <div class="form-group">
                        <input type="number" name="idi" class="form-control" placeholder="ID Instrutor" id="idi" size="70" maxlength="150" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="hrsaida" id="hrsaida" class="form-control" placeholder="Horário de Saída" id="hrsaida" size="70" maxlength="150" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Horário de Chegada" id="hrchegada"  name="hrchegada" size="70" maxlength="150" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" class="btnContact" value="Registrar" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="txtMsg" id="txtMsg" class="form-control txtbox" cols="56" rows="12" placeholder="Parecer Instrutor"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End Contact Form -->

    <!-- Scripts Necessários -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
</body>

</html>