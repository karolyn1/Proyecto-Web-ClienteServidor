<?php
if(!empty($_POST)) {	
    $username = $_POST["username"];
}

$current_page = basename($_SERVER['PHP_SELF']);
$navbar = '
<nav class="navbar">
    <div class="logo">
        <img class="img" src="./imagenes/logo.png" alt="Logo">
        <span>CASA<span class="highlight">NATURA</span></span>
    </div>
    <div class="menu-container">
        <div>
            <ul class="nav-links">
                <li class="' . ($current_page == 'homepage.php' ? 'active' : '') . '"><a href="homepage.php">HOME</a></li>
                <li class="' . ($current_page == 'informacionDonacion.php' ? 'active' : '') . '">
                    <a href="informacionDonacion.php">DONACIONES</a>
                    <ul class="submenu">
                        <li><a href="formularioDonaciones.php">FORMULARIO</a></li>
                    </ul>
                </li>
                <li class="' . ($current_page == 'listadoAnimalesDisponibles.php' ? 'active' : '') . '"><a href="listadoAnimalesDisponibles.php">APADRINAR</a></li>
                <li class="' . ($current_page == 'tourDisponible.php' ? 'active' : '') . '"><a href="tourDisponible.php">TOURS</a></li>
                <li class="' . ($current_page == 'eventosDisponibles.php' ? 'active' : '') . '"><a href="eventosDisponibles.php">EVENTOS</a></li>
                <li class="' . ($current_page == 'contactenos.php' ? 'active' : '') . '"><a href="contactenos.php">CONTACTO</a></li>
                <li class="' . ($current_page == 'quienessomos.php' ? 'active' : '') . '"><a href="quienessomos.php">NOSOTROS</a></li>
                <li class="' . ($current_page == 'login.php' ? 'active' : '') . '"><a href="login.php"><i class="fas fa-user"></i></a>
                    <ul class="submenu-login">
                        <a href="editarPerfil.php">Mi Perfil</a>
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

    $current_page = basename($_SERVER['PHP_SELF']);
    
    $sidebar = '
    <div class="sidebarMiPerfil">
        <h2>Hola, Nombre</h2>
        <ul>
            <li class="' . ($current_page == 'editarperfil.php' ? 'active' : '') . '"><a href="editarperfil.php"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
            <li class="' . ($current_page == 'donaciones.php' ? 'active' : '') . '"><a href="donaciones.php"><i class="fa-solid fa-money-bill"></i> Mis Donaciones</a></li>
            <li class="' . ($current_page == 'misanimales.php' ? 'active' : '') . '"><a href="misanimales.php"><i class="fa-solid fa-otter"></i> Mis Animales</a></li>
            <li class="' . ($current_page == 'misboletos.php' ? 'active' : '') . '"><a href="misboletos.php"><i class="fa-solid fa-ticket"></i> Mis Boletos</a></li>
            <li class="' . ($current_page == 'soporte.php' ? 'active' : '') . '"><a href="soporte.php"><i class="fa-solid fa-circle-info"></i> Soporte</a></li>
            <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</a></li>
        </ul>
    </div>';
    ?>