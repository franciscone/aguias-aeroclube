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
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $idade = $_POST['idade'];
        $ddd = $_POST['ddd'];
        $telefone = $_POST['telefone'];
        $breve = $_POST['breve'];

        $sql = "INSERT INTO tb_socio (nome_socio, email_socio, end_socio, idade_socio) VALUES ('$nome', '$email', '$endereco', '$idade' )";

        $sql2 = "INSERT INTO tb_telefone (id_socio, ddd_telefone, nm_telefone) VALUES (LAST_INSERT_ID(), '$ddd', '$telefone')";

        $sql3 = "INSERT INTO tb_pilotos (id_socio, nm_breve_piloto) VALUES (LAST_INSERT_ID(), '$breve')";

        if ($_POST['nome'] == '' || $_POST['email'] == '' || $_POST['endereco'] == '' || $_POST['idade'] == '' || $_POST['ddd'] == '' || $_POST['telefone'] == '' || $_POST['breve'] == ''){

            echo "<script>alert('Insira todos os dados para concluir o cadastro')</script> ";

            echo "<script> location.href= '../cadastrarpilot.php'; </script>";

        }
        
        else if (!mysqli_query($conn, $sql)) {

            die("Erro ao inserir os dados: " . mysqli_error($conn));

        } else if (!mysqli_query($conn, $sql2)) {

            die("Erro ao inserir os dados: " . mysqli_error($conn));

        }else if (!mysqli_query($conn, $sql3)) {

            die("Erro ao inserir os dados: " . mysqli_error($conn)); 

        }else {

            echo "<script>alert('Dados inseridos com sucesso!');</script>";

            echo "<script> location.href= '../cadastrarpilot.php'; </script>";

        }
        mysqli_close($conn);

        break;

        //Montar
    case 'montar':

        $id = $_GET['id'];
        $sql = "SELECT * FROM tb_socio as f 
        INNER JOIN tb_telefone as t on f.id_socio = t.id_socio
        INNER JOIN tb_pilotos as p on f.id_Socio = p.id_socio 
        WHERE p.id_piloto=".$id ;

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
            echo "<form method='post' name='dados' action='crudpilotos.php?acao=atualizar' onSubmit='return enviardados();'>";
            echo "<h3>Atualização de Dados</h3>";
            echo "<div class='form-group'>";
            echo "<input type='text' name='id_piloto' class='form-control' placeholder='Nome' id='id_piloto' size='2' maxlength='150' value=" . $id . " readonly/>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<div class='col-md-6'>";
            echo "<div class='form-group'>";
            echo "<input type='text' name='nome' class='form-control' placeholder='Nome' id='nome' size='54' maxlength='150' value='" . $registro['nome_socio'] . "'/>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<input type='text' name='email' class='form-control' placeholder='E-mail' id='email' size='54' maxlength='150' value='" . $registro['email_socio'] . "'/>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<input type='text' name='endereco' class='form-control' placeholder='Endereço' id='endereco' size='70' maxlength='150' value='" . $registro['end_socio'] . "'/>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<input type='number' name='breve' class='form-control' placeholder='Numero Brevê' id='breve' size='10' maxlength='10' value='" . $registro['nm_breve_piloto'] . "' />";
            echo "</div>";
            echo "</div>";

            echo "<div class='col-md-6'>";
            echo "<div class='form-group'>";
            echo "<input type='text' name='idade' class='form-control' placeholder='Idade' id='endereco' size='3' maxlength='3' value='" . $registro['idade_socio'] . "' />";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<input type='number' name='ddd' class='form-control' placeholder='DDD' id='ddd' size='2' maxlength='2' value='" . $registro['ddd_telefone'] . "' />";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<input type='number' name='telefone' class='form-control' placeholder='Telefone' id='telefone' size='30' maxlength='9' value='" . $registro['nm_telefone'] . "'/>";
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

        $id = $_POST['id_piloto'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $endereco = $_POST['endereco'];
        $idade = $_POST['idade'];
        $ddd = $_POST['ddd'];
        $telefone = $_POST['telefone'];
        $breve = $_POST['breve'];

        $sql = "UPDATE tb_socio as s 
        INNER JOIN tb_telefone as t ON s.id_socio = t.id_socio 
        INNER JOIN tb_pilotos as p ON s.id_socio = p.id_socio
        SET s.nome_socio = '" . $nome . "', s.email_socio = '" . $email . "', s.end_socio = '" . $endereco . "', s.idade_socio = '" . $idade . "', t.ddd_telefone = '" . $ddd . "', t.nm_telefone = '" . $telefone . "' , p.nm_breve_piloto = '" . $breve . "' 
        WHERE p.id_piloto = '" . $id . "'";

        if (!mysqli_query($conn, $sql)){

            die("</br> Erro ao atualizar os dados: " . mysqli_error($conn));

        } else {

            echo "<script>alert('Dados atualizados com sucesso!');</script>";

            echo "<script> location.href= 'crudpilotos.php?acao=selecionar'; </script>";

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
        echo "<h1>Nossos Pilotos</h1>";
        echo "</div>";
        echo "<div class='container mt-4'>";
        echo "<div class='card mb-4'>";
        echo "<div class='card-body'>";
        echo "<table class='table table-hover'>";
        echo "<tr class=''>";
        echo "<th>ID Piloto</th>";
        echo "<th>Nome</th>";
        echo "<th>E-mail</th>";
        echo "<th>Endereço</th>";
        echo "<th>Idade</th>";
        echo "<th>DDD</th>";
        echo "<th>Telefone</th>";
        echo "<th>N° Brevê</th>";
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


        $sql = "SELECT * FROM tb_socio 
        INNER JOIN tb_telefone ON tb_socio.id_socio = tb_telefone.id_socio
        INNER JOIN tb_pilotos ON tb_socio.id_socio = tb_pilotos.id_socio";
        
        $resultado = mysqli_query($conn, $sql) or die("Erro ao retornar o valor do banco de dados");

        while ($registro = mysqli_fetch_array($resultado)) {

            $id = $registro['id_piloto'];
            $nome = $registro['nome_socio'];
            $email = $registro['email_socio'];
            $endereco = $registro['end_socio'];
            $idade = $registro['idade_socio'];
            $ddd = $registro['ddd_telefone'];
            $telefone = $registro['nm_telefone'];
            $breve = $registro['nm_breve_piloto'];

            echo "<tr>";
            echo "<th>" . $id . "</th>";
            echo "<td>" . $nome . "</td>";
            echo "<td>" . $email . "</td>";
            echo "<td>" . $endereco . "</td>";
            echo "<td>" . $idade . "</td>";
            echo "<td>" . $ddd . "</td>";
            echo "<td>" . $telefone . "</td>";
            echo "<td>" . $breve . "</td>";


            echo "<td>
                <a href='crudpilotos.php?acao=montar&id=$id'><img src ='../../imgs/update_crud.png' alt='Atualizar' title='Atualizar registro'></a>

                <a href='../cadastrarpilot.php'><img src = '../../imgs/insert_crud.png' alt='Inserir' title='Inserir registro'></a>";

            echo "</tr>";
            echo "</tbody>";
            echo "</div>";
            echo "</main>";

        }
         
        break;
}
