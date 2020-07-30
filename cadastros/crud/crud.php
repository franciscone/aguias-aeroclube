<?php


session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);

  echo "<script>alert('Esteja logado para entrar na Área do Funcionário')</script> ";
  echo "<script> location.href= '../../login/login.php'; </script>";
  }

$logado = $_SESSION['login'];


include_once "conexao.php";

$acao = $_GET['acao'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

switch ($acao) {

    case 'deletar':

        $id = $_GET['id'];

        $sql = "DELETE FROM tb_socio WHERE id_socio = '" . $id . "'";

        if (!mysqli_query($conn, $sql)) {

            die("Erro ao insereseir os dados: " . mysqli_error($conn));

        } else {

            echo "<script>alert('Dados excluidos com sucesso!');</script>";

            echo "<script> location.href= 'crud.php?acao=selecionar'; </script>";
        }
        mysqli_close($conn);

        break;

        //selecionar
    case 'selecionar':

        echo "<!DOCTYPE html>";
        echo "<html lang='pt-br'>";
        echo "<head>";
        echo "<meta charset='utf-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>";
        echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css' integrity='sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk' crossorigin='anonymous'>";
        echo "<link rel='stylesheet' href='../../styles/style.css'>";
        echo "<link rel='eagle icon' href='../../imgs/eagle.ico' type='image/x-icon'>";
        echo "<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>";
        echo "<title>Águias Aeroclube</title>";
        echo "</head>";
        echo "<body>";
        echo "<div class='container-fluid nav-cont'>";
        echo "<nav class='navbar navbar-expand-lg main-nav px-0'>";
        echo "<a class='navbar-brand ml-5' href='#'>";
        echo "<img src='../../imgs/eagle.png' alt='Águias Aeroclube'>";
        echo "</a>";
        echo "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#mainMenu' aria-controls='mainMenu' aria-expanded='false' aria-label='Toggle navigation'>";
        echo "<span class='icon-bar icon-bar-1'></span>";
        echo "<span class='icon-bar icon-bar-2'></span>";
        echo "<span class='icon-bar icon-bar-3'></span>";
        echo "</button>";
        echo "<div class='collapse navbar-collapse color-gray' id='mainMenu'>";
        echo "<h3>Águias Aeroclube</h3>";
        echo " </div>";
        echo " </nav>";
        echo " </div>";

        echo "<main>";
        echo "<div class='col-12 text-center mt-2 title-color-trilha'>";
        echo "<h1>Nossos Sócios</h1>";
        echo "</div>";
        echo "<div class='container mt-4'>";
        echo "<div class='card mb-4'>";
        echo "<div class='card-body'>";

        echo "<table class='table table-hover'>";
        echo "<tr class=''>";
        echo "<th>N° Matrícula Sócio</th>";
        echo "<th>Nome</th>";
        echo "<th>E-mail</th>";
        echo "<th>Endereço</th>";
        echo "<th>Idade</th>";
        echo "<th>DDD</th>";
        echo "<th>Telefone</th>";
        echo "<th>Ação</th>";
        echo "</tr>";
        echo "</thead>";

        echo "<center><a href='../dashboardcrud.php' class='btn btn-danger mb-2' role='button'>Voltar ao Dashboard</a></center>";

        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>";
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1'
        crossorigin='anonymous'></script>";
        echo "<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>";

        echo "</body>";



        $sql = "SELECT * FROM tb_socio as s 
        INNER JOIN tb_telefone as t on s.id_socio = t.id_socio";

        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar o valor do banco de dados");

        while ($registro = mysqli_fetch_array($resultado)) {

            $id = $registro['id_socio'];
            $nome = $registro['nome_socio'];
            $email = $registro['email_socio'];
            $endereco = $registro['end_socio'];
            $idade = $registro['idade_socio'];
            $ddd = $registro['ddd_telefone'];
            $telefone = $registro['nm_telefone'];

            echo "<tr>";
            echo "<th>" . $id . "</th>";
            echo "<td>" . $nome . "</td>";
            echo "<td>" . $email . "</td>";
            echo "<td>" . $endereco . "</td>";
            echo "<td>" . $idade . "</td>";
            echo "<td>" . $ddd . "</td>";
            echo "<td>" . $telefone . "</td>";

            echo "<td>
            <a href='crud.php?acao=deletar&id=$id'><img src = '../../imgs/delete_crud.png' alt='Deletar' title='Deletar registro'></a>";

            echo "</tr>";


            echo "</tbody>";

            echo "</div>";

            echo "</main>";

            echo "</html>";
        }

        break;
}
