<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Casa Natura - Donaciones</title>
    <link href="./css/style.css" rel="stylesheet">
</head>
<style>
    /* ESTILOS PARA EL SIDEBAR DE ADMINISTRADOR */
    .sidebar2 {
        width: 200px;
        height: 100vh;
        background-color: #ffffff;
        color: #333;
        padding: 20px;
        position: fixed;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }
    
    .logoSidebar {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
    }
    
    .logoSidebar img {
        width: 100px;
        height: 100px;
        margin-right: 5px;
    }
    
    .logoSidebar h1 {
        font-size: 25px;
        font-weight: bold;
        color: #062D3E ;
    }
    
    .logoSidebar span {
        color: #FFA500; /* Color para "NATURA" */
    }
    
    .menuSidebar, .generalSidebar {
        margin-top: 20px;
    }
    
    .menuSidebar p, .generalSidebar p {
        font-size: 14px;
        font-weight: bold;
        color: #666;
        margin-bottom: 10px;
    }
    
    .menuSidebar ul, .generalSidebar ul {
        list-style: none;
        padding: 0;
    }
    
    .menuSidebar li, .generalSidebar li {
        font-size: 16px;
        padding: 10px 0;
        display: flex;
        align-items: center;
        color: #888;
        cursor: pointer;
        transition: color 0.3s ease;
    }
    
    .menuSidebar li i, .generalSidebar li i {
        margin-right: 10px;
        color: #888;
        text-decoration:none;
    }
    .menuSidebar li a, .generalSidebar li a {
       text-decoration: none;
       color: #888;
    }
    
    .menuSidebar li:hover, .generalSidebar li:hover {
        color: #333;
    }
    
    .menuSidebar .active {
        background-color: #062D3E;
        color: #fff;
        border-radius: 8px;
    }

    .active a {
        color:#fff;
    }
    
    .menuSidebar .active i {
        color: #fff;
    }
    
    /* Iconos para el dashboard */
    .icon-dashboard::before { content: "📂"; }
    .icon-animals::before { content: "🐾"; }
    .icon-donations::before { content: "💰"; }
    .icon-sponsorship::before { content: "🤝"; }
    .icon-tours::before { content: "📅"; }
    .icon-events::before { content: "🎉"; }
    .icon-settings::before { content: "⚙️"; }
    .icon-support::before { content: "🆘"; }
    .icon-logout::before { content: "🔌"; }
    .icon-users::before { content: "🫂"; }
    

    .footerAdmin {
    background-color: #062D3E;
    color: white;
    padding: 40px 20px;
    margin-top: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Paytone One', sans-serif;
    font-weight: 100;
}
    </style>
<body>

    <?php
    $sidebarAdmin2='
    <div class="sidebar2">
        <div class="logoSidebar">
            <img src="./imagenes/logo.png" alt="Logo Casa Natura">
            
        </div>
        <div class="menuSidebar">
            <p>Main Menu</p>
            <ul>
                <li class="active"><i class="icon-dashboard"></i><a href="dashboardAdmin.php"> Dashboard</a></li>
                <li><i class="icon-animals"></i><a href="gestionAnimales.php">  Gestión de Animales</a></li>
                <li><i class="icon-donations"></i> Gestión de Donaciones</li>
                <li><i class="icon-users"></i><a href="gestionUsuarios.php">  Gestión de Usuarios</a></li>
                <li><i class="icon-sponsorship"></i> Gestión de Apadrinamientos</li>
                <li><i class="icon-tours"></i> Gestión de Tours</li>
                <li><i class="icon-events"></i> Gestión de Eventos</li>
            </ul>
        </div>
        <div class="generalSidebar">
            <p>General</p>
            <ul>
                <li><i class="icon-settings"></i> Ajustes</li>
                <li><i class="icon-support"></i> Support</li>
                <li><i class="icon-logout"></i> Logout</li>
            </ul>
        </div>
    </div>';
    ?>


    <?php 
    $footerAdmin=
    '
    <footer class="footerAdmin">
        <div class="footerAdmin-title">
            <h2 class="footerAdmin-title">
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
    
    
    
    ';



?>
</body>
</html>