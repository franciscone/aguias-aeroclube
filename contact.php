<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- CSS Styles -->
    <link rel="stylesheet" href="styles/style.css">

    <!--Links icon-->
    <link rel="eagle icon" href="imgs/eagle.ico" type="image/x-icon">

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
                <img src="imgs/eagle.png" alt="Águias Aeroclube">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar icon-bar-1"></span>
                <span class="icon-bar icon-bar-2"></span>
                <span class="icon-bar icon-bar-3"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainMenu">
                <ul class="navbar-nav ml-auto text-uppercase f1 mr-3">
                    <li>
                        <a href="index.php" class="active-first">Home</a>
                    </li>
                    <li>
                        <a href="classes.php">Aulas</a>
                    </li>
                    <li>
                        <a href="contact.php">Contato</a>
                    </li>
                    <li>
                        <a href="login/login.php">Área do Funcionário</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Container Navbar -->

    <!-- Container Contact Form -->
    <div class="container contact-form">
        <div class="contact-image">
            <img src="imgs/eaglemd.png" alt="rocket_contact" />
        </div>
        <form method="post" action="insertcontacts.php">
            <h3>Tem alguma dúvida? <br> Nos envie uma mensagem!</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="nome" class="form-control" id="nome" placeholder="Seu nome " value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" id="email" placeholder="Seu E-mail " value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="celular" class="form-control" id="celular" placeholder="Seu numero de Celular " value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" class="btnContact" value="Enviar" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="mensagem" class="form-control txtbox" id="mensagem" cols="56" rows="7" placeholder="Sua Mensagem"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End Contact Form -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container bottom_border">
            <div class="row">
                <div class=" col-sm-4 col-md-4 col-sm-4  col-12 col-4">
                    <h5 class="headin5_amrc col_white_amrc pt2">Entre em contato</h5>
                    <p class="mb10">Nosso Aeroclube foi fundado em 1950 pela Família Silva, tradicional no Estado de São
                        Paulo, temos diveros pilotos que já passaram por nossos curso e agora são comandantes em linhas
                        aéreas, porém, nosso Aeroclube também é um ambiente de familia para aproveitar o fim de semana.
                    </p>
                    <p><i class="fa fa-phone"></i> +55 (11) 12345-6789</p>
                    <p><i class="fa fa fa-envelope"></i> aguiasaeroclube@gmail.com</p>
                </div>
                
                <div class="col-sm-4 col-md-4  col-12 col-4">
                    <h5 class="headin5_amrc col_white_amrc pt2">Horários de funcionamento:</h5>
                    <p class="mb10"> Segunda a Sexta: <br> 7:00 - 19:00 </p>
                    <p class="mb10"> Sábados e Domingos: <br> 10:00 - 20:00</p>
                    <p class="mb10"> Feriados: <br> 10:00 - 15:00</p>
                </div>

                <div class="col-sm-4 col-md-4  col-12 col-4">
                    <h5 class="headin5_amrc col_white_amrc pt2">Siga em nossas redes sociais!</h5>
                    <a href="#" class="fa fa-facebook p-2"></a>
                    <a href="#" class="fa fa-instagram p-2"></a>
                    <a href="#" class="fa fa-youtube p-2"></a>
                    <a href="#" class="fa fa-pinterest p-2"></a>
                </div>
            </div>
        </div>

        <div class="container">
            <ul class="foote_bottom_ul_amrc">
                <li><a href="index.php">Home</a></li>
                <li><a href="classes.php">Aulas</a></li>
                <li><a href="contact.php">Contato</a></li>
                <li><a href="login/login.php">Área do Funcionário</a></li>
            </ul>
            <p class="text-center">Copyright @2020 | Designed With by <a href="#"> Matheus Franciscone | Group
                    OnlyBrains </a></p>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Scripts Necessários -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>