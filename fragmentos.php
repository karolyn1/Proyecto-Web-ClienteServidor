<?php
    $navbar=
    '<nav class="navbar">
        <div class="logo">
            <img class="img" src="./imagenes/logo.png" alt="Logo">
            <span>CASA<span class="highlight">NATURA</span></span>
            
        </div>
       
        <div class="menu-container">
         <div>
            <ul class="nav-links">
                <li><a href="homepage.php">HOME</a></li>
                <li>
                    <a href="informacionDonacion.php">DONACIONES</a>
                    <ul class="submenu">
                        <li><a href="formularioDonaciones.php">FORMULARIO</a></li>
                    </ul>
                </li>
                <li><a href="listadoAnimalesDisponibles.php">APADRINAR</a></li>
                <li><a href="tourDisponible.php">TOURS</a></li>
                <li><a href="eventosDisponibles.php">EVENTOS</a></li>
                <li><a href="contactenos.php">CONTACTO</a></li>
                <li><a href="quienessomos.php">NOSOTROS</a></li>
                <li><a href="login.php"><i class="fas fa-user"></i></a>
                    <ul class="submenu-login">
                    <a href="login.php">Mi Perfil</a>
                    <a href="dashboardAdmin.php">Administrador</a>
                    </ul>
                </li>
                
            </ul>
            </div>
    </div>
        <button class="menu-toggle">☰</button>
    </nav>';


    $footer='<footer class="footer">
        <div class="footer-title">
            <h2 class="footer-title">
                <div class="logo">
                    <img class="img" src="./imagenes/logo.png">
                    <div>
                        <span style="color: #fff;">CASA</span>
                    <br>
                    <span class="highlight">NATURA</span>
                    </div>
                    
                    <img class="img" src="./imagenes/footer.png">
                </div>
            </h2>
        </div>
        <div class="footer-info">
            <div class="footer-links">
            <a href="quienessomos.php">NOSOTROS</a>
            <a href="informacionDonacion.php">DONAR</a>
            <a href="lostadoAnimalesDisponibles.php">APADRINAR</a>
            <a href="#">EVENTOS</a>
            <a href="#">TOURS</a>
            <a href="#">CONTÁCTANOS</a>
        </div>
        <div class="row social-media">
            <div class="col social-icons">
                <a href="#"><img src="imagenes/face.png" alt="Facebook" /></a>
                <a href="#"><img src="imagenes/twitter.png" alt="Twitter" /></a>
                <a href="#"><img src="imagenes/instagram.webp" alt="Instagram" /></a>
            </div>
        </div>
    </div>
 
    </footer>';


    $sidebar='
    <div class="sidebarMiPerfil">
        <h2>Hola, Usuario</h2>
        <ul>
            <li class="active"><i class="icon"></i>Dashboard</li>
            <li><i class="icon"></i>Mis Reservas</li>
            <li><i class="icon"></i>Mis Donaciones</li>
            <li><i class="icon"></i>Mis Animales</li>
            <li><i class="icon"></i>Ajustes</li>
            <li><i class="icon"></i>Cerrar Sesión</li>
        </ul>
    </div>';
?>
    