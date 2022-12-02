<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        !Que Peliz¡
    </title>
    <!-- GOOGLE FONTS -->
    <link rel="stylesheet" href="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet">
    <!-- OWL CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <!-- BOX ICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- APP CSS -->
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/app.css">
</head>

<body>

    <!-- NAV -->
    <div class="nav-wrapper">
        <div class="container">
            <div class="nav">
                <a href="#" class="logo">
                    <i class='bx bx-movie-play bx-tada main-color'></i>!Que pel<span class="main-color">i</span>z¡
                </a>
                <ul class="nav-menu" id="nav-menu">
                    <li><a href="empleado.html">Inicio Empleado</a></li>
                    <li><a href="mantenerPelicula.php">Mantener pelicula</a></li>
                    <li><a href="mantenerGenero.php">Mantener genero</a></li>
                    <li><a href="mantenerSucursal.php">Mantener sucursal</a></li>
                    <li><a href="mantenerSala.php">Mantener sala</a></li>

                    <li>
                        <a href="index.html" class="btn btn-hover">
                            <span>Salir</span>
                        </a>
                    </li>
                
                </ul>
                <!-- MOBILE MENU TOGGLE -->
                <div class="hamburger-menu" id="hamburger-menu">
                    <div class="hamburger"></div>
                </div>
            </div>
        </div>
    </div>

    <main id="contac">
        <div>
            <section id="articulosprincipales">
                <article>
                <?php
                        include("Genero.php");
                        $genero=new Genero();
                        $genero->eliminarGenero($_REQUEST['id_gene'])
                        
                    ?>
                </article>
            </section>
        </div>
    </main>

    
 <!-- FOOTER SECTION -->
 <footer class="section">
    <div class="container">
        <div class="row">
            <div class="col-4 col-md-6 col-sm-12">
                <div class="content">
                    <a href="#" class="logo">
                        <i class='bx bx-movie-play bx-tada main-color'></i>!Que pel<span class="main-color">i</span>z¡
                    </a>
                    <p>
                        Ser la mejor opción de entretenimiento, fortaleciendo nuestro liderazgo en la industria cinematográfica a nivel internacional, ofreciendo diversión, innovación y un servicio estelar.
                    </p>
                    <div class="social-list">
                        <a href="#" class="social-item">
                            <i class="bx bxl-facebook"></i>
                        </a>
                        <a href="#" class="social-item">
                            <i class="bx bxl-twitter"></i>
                        </a>
                        <a href="#" class="social-item">
                            <i class="bx bxl-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-8 col-md-6 col-sm-12">
                <div class="row">
                    <div class="col-3 col-md-6 col-sm-6">
                        <div class="content">
                            <p><b>Sucursales</b></p>
                            <ul class="footer-menu">
                                <li><a href="#">CDMX ORIENTE</a></li>
                                <li><a href="#">CDMX NORTE</a></li>
                                <li><a href="#">REFORMA</a></li>
                                <li><a href="#">PERISUR</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-3 col-md-6 col-sm-6">
                        <div class="content">
                            <p><b>Acerca de ¡Quepeliz!</b></p>
                            <ul class="footer-menu">
                                <li><a href="estrenos.html">Estrenos</a></li>
                                <li><a href="ubicacion.html">Ubicacion</a></li>
                                <li><a href="#">Contacto</a></li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-3 col-md-6 col-sm-6">
                        <div class="content">
                            <p><b>Help</b></p>
                            <ul class="footer-menu">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">My profile</a></li>
                                <li><a href="#">Pricing plans</a></li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-3 col-md-6 col-sm-6">
                        <div class="content">
                            <p><b>Download app</b></p>
                            <ul class="footer-menu">
                                <li>
                                    <a href="#">
                                        <img src="./images/google-play.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="./images/app-store.png" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER SECTION -->

<!-- COPYRIGHT SECTION -->
<div class="copyright">
    Copyright 2022 <a href="#" target="_blank">
        Innova Tic's</a>
</div>
<!-- END COPYRIGHT SECTION -->

<!-- SCRIPT -->
<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- OWL CAROUSEL -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<!-- APP SCRIPT -->
<script src="js/app.js"></script>

</body>

</html>
