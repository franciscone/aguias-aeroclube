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

        //Inserir
    case 'inserir':

        $id = $_POST['id'];
        $formacao = $_POST['formacao'];
        $diploma = $_POST['diploma'];
        $instituicao = $_POST['instituicao'];


        $condicaosql = "SELECT id_piloto
        FROM tb_pilotos
        WHERE id_piloto = '$id'";


        $sql2 = "INSERT INTO tb_formacao(id_piloto, nome_curso_formacao, dt_diploma_formacao, instituicao_formacao)
            VALUES ('$id','$formacao', '$diploma', '$instituicao')";

        if ($_POST['id'] == '' || $_POST['formacao'] == '' || $_POST['diploma'] == '' || $_POST['instituicao'] == '') {

            echo "<script>alert('Insira todos os dados para concluir o cadastro')</script> ";

            echo "<script> location.href= '../cadastrarinst.php'; </script>";

        } else if (!mysqli_query($conn, $condicaosql)) {

            echo "<script>alert('ID do Piloto não encontrado!')</script> ";

            echo "<script> location.href= '../cadastrarinst.php'; </script>";

            die("Erro ao inserir os dados: " . mysqli_error($conn));
        } else if (!mysqli_query($conn, $sql2)) {

            echo "<script>alert('ID do Piloto não encontrado!')</script> ";

            echo "<script> location.href= '../cadastrarinst.php'; </script>";

            die("Erro ao inserir os dados: " . mysqli_error($conn));
        } else {

            echo "<script>alert('Dados inseridos com sucesso!');</script>";

            echo "<script> location.href= '../cadastrarinst.php'; </script>";
        }
        mysqli_close($conn);

        break;


        //Montar
    case 'montar':

        $id = $_GET['id'];

        $sql = "SELECT * FROM tb_formacao as f  
        INNER JOIN tb_pilotos as p on f.id_piloto = p.id_piloto
        WHERE f.id_formacao =" . $id;

        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar o valor do banco de dados");

        //navbar
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

        while ($registro = mysqli_fetch_array($resultado)) {

            //form
            echo "<div class='container contact-form'>";
            echo "<div class='contact-image'>";
            echo "<img src='../../imgs/eaglemd.png' alt='rocket_contact' />";
            echo "</div>";
            echo "<form method='post' name='dados' action='crudinstrutor.php?acao=atualizar' onSubmit='return enviardados();'>";
            echo "<h3>Atualização de Dados</h3>";
            echo "<div class='form-group'>";
            echo "<input type='text' name='id' class='form-control' placeholder='ID Piloto' id='id' size='70' maxlength='150' value=" . $id . " readonly/>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<div class='col-md-6'>";
            echo "<div class='form-group'>";
            echo "<input type='text' name='formacao' class='form-control' placeholder='Curso de Formação' id='formacao' size='70' maxlength='150' value='" . $registro['nome_curso_formacao'] . "'/>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<input type='date' name='diploma' class='form-control' placeholder='Data de Obtenção do Diploma' id='diploma' size='75' maxlength='150' value='" . $registro['dt_diploma_formacao'] . "' />";
            echo "</div>";
            echo "</div>";

            echo "<div class='col-md-6'>";
            echo "<div class='form-group'>";
            echo "<input type='text' name='instituicao' class='form-control' placeholder='Instituição' id='instituicao' size='70' maxlength='150' value='" . $registro['instituicao_formacao'] . "' />";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<input name='submit' type='submit' class='btnContact' value='Atualizar Dados'/>";
            echo "</div>";

            echo "</div>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
        }
        mysqli_close($conn);

        break;

        //Atualizar
    case 'atualizar':

        $id = $_POST['id'];
        $curso = $_POST['formacao'];
        $diploma = $_POST['diploma'];
        $instituicao = $_POST['instituicao'];

        $sql = "UPDATE tb_formacao 
        SET nome_curso_formacao = '" . $curso . "', dt_diploma_formacao = '" . $diploma . "', instituicao_formacao = '" . $instituicao . "'
        WHERE id_formacao = '" . $id . "'";

        if (!mysqli_query($conn, $sql)) {

            die("</br> Erro ao atualizar os dados: " . mysqli_error($conn));
        } else {

            echo "<script>alert('Dados atualizados com sucesso!');</script>";

            echo "<script> location.href= 'crudinstrutor.php?acao=selecionar'; </script>";
        }
        mysqli_close($conn);

        break;

        //Deletar
    case 'deletar':

        $id = $_GET['id'];
        $sql = "DELETE FROM tb_formacao WHERE id_formacao ='" . $id . "'";

        if (!mysqli_query($conn, $sql)) {

            die("Erro ao deletar os dados: " . mysqli_error($conn));
        } else {

            echo "<script>alert('Dados excluidos com sucesso!');</script>";

            echo "<script> location.href= 'crudinstrutor.php?acao=selecionar'; </script>";
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
        echo "<h1>Nossos Instrutores</h1>";
        echo "</div>";
        echo "<div class='container mt-4'>";
        echo "<div class='card mb-4'>";
        echo "<div class='card-body'>";
        echo "<table class='table table-hover'>";
        echo "<tr class=''>";
        echo "<th>ID Instrutor</th>";
        echo "<th>Nome</th>";
        echo "<th>Nº Brevê</th>";
        echo "<th>Curso de Formação</th>";
        echo "<th>Data de obtenção do Diploma</th>";
        echo "<th>Instituição</th>";
        echo "<th>Ações</th>";
        echo "</tr>";
        echo "</thead>";

        echo "<center><a href='../dashboardcrud.php' class='btn btn-danger mb-2' role='button' >Voltar ao Dashboard</a></center>";

        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>";
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1'
        crossorigin='anonymous'></script>";
        echo "<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>";
        echo "</body>";
        echo "</html>";


        $sql = "SELECT * FROM tb_socio as s  
        INNER JOIN tb_telefone as t on s.id_socio = t.id_socio
        INNER JOIN tb_pilotos as p  on s.id_socio = p.id_socio
        INNER JOIN tb_formacao as f on p.id_piloto = f.id_piloto";

        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar o valor do banco de dados");

        while ($registro = mysqli_fetch_array($resultado)) {

            $id = $registro['id_formacao'];
            $nome = $registro['nome_socio'];
            $breve = $registro['nm_breve_piloto'];
            $curso = $registro['nome_curso_formacao'];
            $diploma = $registro['dt_diploma_formacao'];
            $instituicao = $registro['instituicao_formacao'];

            echo "<tr>";
            echo "<th>" . $id . "</th>";
            echo "<td>" . $nome . "</td>";
            echo "<td>" . $breve . "</td>";
            echo "<td>" . $curso . "</td>";
            echo "<td>" . date("d/m/Y", strtotime($diploma)) . "</td>";
            echo "<td>" . $instituicao . "</td>";


            echo "<td>
                <a href='crudinstrutor.php?acao=deletar&id=$id'><img src = '../../imgs/delete_crud.png' alt='Deletar' title='Deletar registro'></a>

                <a href='crudinstrutor.php?acao=montar&id=$id'><img src ='../../imgs/update_crud.png' alt='Atualizar' title='Atualizar registro'></a>

                <a href='../cadastrarinst.php'><img src = '../../imgs/insert_crud.png' alt='Inserir' title='Inserir registro'></a>";

            echo "</tr>";
            echo "</tbody>";
            echo "</div>";
            echo "</main>";
        }

        break;
}
