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

        $id_aluno = $_POST['ida'];
        $id_instrutor = $_POST['idi'];
        $data_aula = $_POST['dtaula'];
        $saida = $_POST['hrsaida'];
        $chegada = $_POST['hrchegada'];
        $parecer = $_POST['txtMsg'];


        $condicaosql = "SELECT id_aluno
        FROM tb_alunos
        WHERE id_aluno = '$id_aluno'";

        $condicaosql2 = "SELECT id_formacao
        FROM tb_formacao
        WHERE id_formacao = '$id_instrutor'";

        $sql = "INSERT INTO tb_aula (id_aluno, dt_aula, id_formacao, hr_saida_aula, hr_chegada_aula, parecer_inst_aula) 
        VALUES ('$id_aluno', '$data_aula', '$id_instrutor', '$saida', '$chegada', '$parecer' )";


        if ($_POST['ida'] == '' && $_POST['idi'] == '' || $_POST['dtaula'] == '' || $_POST['hrsaida'] == '' || $_POST['hrchegada'] == '' || $_POST['txtMsg'] == '') {

            echo "<script>alert('Insira todos os dados para concluir o cadastro')</script> ";

            echo "<script> location.href= '../regaulas.php'; </script>";

        } else if (!mysqli_query($conn, $condicaosql2)){

            echo "<script>alert('Nº de Matrícula não encontrado')</script> ";

            echo "<script> location.href= '../regaulas.php'; </script>";

            die("Erro ao inserir os dados: " . mysqli_error($conn));

        } else if (!mysqli_query($conn, $condicaosql)){

            echo "<script>alert('ID do Instrutor não encontrado')</script> ";

            echo "<script> location.href= '../regaulas.php'; </script>";

            die("Erro ao inserir os dados: " . mysqli_error($conn));

        }else if (!mysqli_query($conn, $sql)) {

            echo "<script> location.href= '../regaulas.php'; </script>";

            die("Erro ao inserir os dados: " . mysqli_error($conn));
        } else {

            echo "<script>alert('Dados inseridos com sucesso!');</script>";

            echo "<script> location.href= '../regaulas.php'; </script>";
        }
        mysqli_close($conn);

        break;


        //Montar
    case 'montar':

        $id = $_GET['id'];
        $sql = "SELECT * FROM tb_aula WHERE id_aula=" . $id;

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
            echo "<form method='post' name='dados' action='crudaulas.php?acao=atualizar' onSubmit='return enviardados();'>";
            echo "<h3>Atualização de Dados</h3>";
            echo "<div class='form-group'>";
            echo "<input type='text' name='id' class='form-control' placeholder='Nome' id='id' size='2' maxlength='150' value=" . $id . " readonly/>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<div class='col-md-6'>";
            echo "<div class='form-group'>";
            echo "<input type='date' name='dtaula' class='form-control' placeholder='Data da Aula' id='dtaula' size='54' maxlength='150' value='" . $registro['dt_aula'] . "'/>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<input type='text' name='hrsaida' class='form-control' placeholder='Horário de Saída' id='hrsaida' size='54' maxlength='150' value='" . $registro['hr_saida_aula'] . "'/>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<input type='text' name='hrchegada' class='form-control' placeholder='Horário de Chegada' id='hrchegada' size='70' maxlength='150' value='" . $registro['hr_chegada_aula'] . "'/>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<input name='submit' type='submit' class='btnContact' value='Atualizar Dados'/>";
            echo "</div>";
            echo "</div>";

            echo "<div class='col-md-6'>";
            echo "<div class='form-group'>";
            echo "<textarea name='txtMsg' id='txtMsg' class='form-control txtbox' cols='50' rows='10' placeholder='Parecer Instrutor'  >" . $registro['parecer_inst_aula'] . "</textarea>";
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
        $data_aula = $_POST['dtaula'];
        $saida = $_POST['hrsaida'];
        $chegada = $_POST['hrchegada'];
        $parecer = $_POST['txtMsg'];

        $sql = "UPDATE tb_aula 
        SET dt_aula = '" . $data_aula . "', hr_saida_aula = '" . $saida . "', hr_chegada_aula = '" . $chegada . "', parecer_inst_aula = '" . $parecer . "' 
        WHERE id_aula = '" . $id . "'";

        if (!mysqli_query($conn, $sql)) {

            die("</br> Erro ao atualizar os dados: " . mysqli_error($conn));
        } else {

            echo "<script>alert('Dados atualizados com sucesso!');</script>";

            echo "<script> location.href= 'crudaulas.php?acao=selecionar'; </script>";
        }
        mysqli_close($conn);

        break;


        //Deletar
    case 'deletar':

        $id = $_GET['id'];
        $sql = "DELETE FROM tb_aula WHERE id_aula ='" . $id . "'";


        if (!mysqli_query($conn, $sql)) {

            die("Erro ao deletar os dados: " . mysqli_error($conn));
        } else {

            echo "<script>alert('Dados excluidos com sucesso!');</script>";

            echo "<script> location.href= 'crudaulas.php?acao=selecionar'; </script>";
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
        echo "<h1>Relatórios de Aulas</h1>";
        echo "</div>";
        echo "<div class='container mt-4'>";
        echo "<div class='card mb-4'>";
        echo "<div class='card-body'>";
        echo "<table class='table table-hover'>";
        echo "<tr class=''>";
        echo "<th>ID Aula</th>";
        echo "<th>Nº Matrícula Aluno</th>";
        echo "<thData da Aula</th>";
        echo "<th>ID Instrutor</th>";
        echo "<th>Data da Aula</th>";
        echo "<th>Horário de Saída</th>";
        echo "<th>Horário de Chegada</th>";
        echo "<th>Parecer Instrutor</th>";
        echo "<th>Ações</th>";
        echo "</tr>";
        echo "</thead>";

        echo "<center><a href='../dashboardcrud.php' class='btn btn-danger mb-2' role='button'>Voltar ao Dashboard</a></center>";

        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>";
        echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1'
        crossorigin='anonymous'></script>";
        echo "<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>";
        echo "</body>";
        echo "</html>";


        $sql = "SELECT * FROM tb_aula as a  
        INNER JOIN tb_formacao as p on a.id_formacao = p.id_formacao";

        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar o valor do banco de dados");

        while ($registro = mysqli_fetch_array($resultado)) {

            $id = $registro['id_aula'];
            $id_aluno = $registro['id_aluno'];
            $id_instrutor = $registro['id_formacao'];
            $dt_aula = $registro['dt_aula'];
            $saida = $registro['hr_saida_aula'];
            $chegada = $registro['hr_chegada_aula'];
            $parecer = $registro['parecer_inst_aula'];

            echo "<tr>";
            echo "<th>" . $id . "</th>";
            echo "<td>" . $id_aluno . "</td>";
            echo "<td>" . $id_instrutor . "</td>";
            echo "<td>" .date("d/m/Y", strtotime($dt_aula))."</td>";
            echo "<td>" . $saida . "</td>";
            echo "<td>" . $chegada . "</td>";
            echo "<td>" . $parecer . "</td>";


            echo "<td>
                <a href='crudaulas.php?acao=deletar&id=$id'><img src = '../../imgs/delete_crud.png' alt='Deletar' title='Deletar registro'></a>

                <a href='crudaulas.php?acao=montar&id=$id'><img src ='../../imgs/update_crud.png' alt='Atualizar' title='Atualizar registro'></a>

                <a href='../regaulas.php'><img src = '../../imgs/insert_crud.png' alt='Inserir' title='Inserir registro'></a>";

            echo "</tr>";
            echo "</tbody>";
            echo "</div>";
            echo "</main>";
        }

        break;
}
