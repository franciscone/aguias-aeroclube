<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- CSS Styles -->
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="stylelogin.css">

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
                        <a href="../index.php" class="active-first">Home</a>
                    </li>
                    <li>
                        <a href="../classes.php">Aulas</a>
                    </li>
                    <li>
                        <a href="../contact.php">Contato</a>
                    </li>
                    <li>
                        <a href="login.php">Área do Funcionário</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Container Navbar -->

    <div class="container h-100 mt-5">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="../imgs/eaglemd.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form method="POST" action="validacaologin.php">
                        <div class="mb-4 text-center">
                            <h3>Seja bem-vindo!</h3>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" id="login" name="login" class="form-control input_user" value="" placeholder="Usuário">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" id="senha" name="senha" class="form-control input_pass" value="" placeholder="Senha">
                        </div>

                        <div class="d-flex justify-content-center mt-5 login_container">
                            <button type="submit" value="entrar" id="entrar" name="entrar" class="btn login_btn">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- Scripts Necessários -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <!-- Scripts -->
    <script src="../scripts/index.js"></script>

</body>

</html>