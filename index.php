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

    <!-- Container Carousel -->

    <div id="carouselExampleIndicators" class="carousel slide carousel-fluid" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="imgs/slide1.png" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h2>Águias Aeroclube</h2>
                    <p>O melhor Aeroclube da cidade</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="imgs/slide2.png" alt="Second slide">
                <div class="card-img-overlay">
                    <h3 class="card-title">Aprenda a voar</h3>
                    <p class="card-text">No Águias Aeroclube você vai aprender a voar mais rápido do que imagina</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="imgs/slide3.png" alt="Third slide">
                <div class="card-img-overlay text-right">
                    <h3 class="card-title">Clube Família</h3>
                    <p class="card-text">Virando sócio do nosso Aeroclube você se torna parte de nossa família</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- End Container Carousel-->

    <!-- Container Cards -->
    <section class="details-card">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="title-card">Nossas Aulas</h1>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card-content">
                        <div class="card-img">
                            <img src="imgs/fund-card1.jpg">
                        </div>
                        <div class="card-desc">
                            <h3>Fundametos da Aviação
                            </h3>
                            <p>Nesse curso são abordados temas teóricos para poder adquirir o conhecimento prévio da
                                aviação. </br> Esse é o primeiro passo para virar um piloto!</p>
                            <div class="row ">
                                <div class="col-12 text-center">
                                    <a href="classes.php" class="btn-card">Mais informações</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-content">
                        <div class="card-img">
                            <img src="imgs/aero-card2.jpg" alt="">
                        </div>
                        <div class="card-desc">
                            <h3>Aulas de vôo básicas</h3>
                            <p>Nesse curso você irá botar a mão na massa e irá aprender as noções básicas de vôo, sendo
                                todas as aulas práticas. </br> Você poderá iniciar suas primeiras decolagens aqui!</p>
                            <div class="row ">
                                <div class="col-12 text-center">
                                    <a href="classes.php" class="btn-card">Mais informações</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Container Cards-->

    <div class="container-fluid how-section1">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <h2 class="title-color-trilha">Trilha para se tornar um aviador no Águias Aeroclube</h2>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-6 how-img">
                <img src="imgs/class.png" class="mt-5" alt="Aulas" />
            </div>
            <div class="col-md-6 mt-5 p-1">
                <h4>Estude a teoria!</h4>
                <h4 class="subheading">Com as aulas de Fundamentos da Aviação você irá aprender o necessário para poder
                    desenvolver sua habilidades na prática e sempre saber a melhor rota ou maneira de agir a qualquer
                    ocasião.</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-5">
                <h4>Aprenda a voar!</h4>
                <h4 class="subheading">Após desenvolver suas habilidades teóricas, chegou a hora de colocar tudo em
                    prática e ainda por cima começar a aprender pilotar uma máquina de verdade! Com nosso curso de Aulas
                    de vôo básicas você irá aprender o básico para poder pilotar um avião.</h4>
            </div>
            <div class="col-md-6 how-img">
                <img src="imgs/airplane.png" class="mt-5" alt="Avião" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 how-img">
                <img src="imgs/certificate.png" class="mt-5" alt="Certificado" />
            </div>
            <div class="col-md-6  mt-5">
                <h4>Devidamente certificado!</h4>
                <h4 class="subheading">Com muito esforço e dedicação você já vai saber os fundamentos e também pilotar
                    um avião, nada mais justo receber um certificado do Águias Aeroclube de que você está devidamente
                    capacitado para começar a voar!</h4>
            </div>
        </div>
    </div>

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