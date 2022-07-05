<?php
include("../seguridad/seguridad.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles_dashboard.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <img src="../images/AdminLogo.png">
        </div>
        <ul>
            <li><img src="../images/inicio.png" alt="">&nbsp; <a href="dashboard.php"><span>Inicio</span></a> </li>
            <li><img src="../images/grupo.png" alt="">&nbsp;<a href="user.php"> <span>Colaboradores</span></a> </li>
            <li><img src="../images/plato.png" alt="">&nbsp;<span>Platos</span> </li>
            <li><img src="../images/information.png" alt="">&nbsp; <span>Help</span></li>
            <li><img src="../images/setting.png" alt="">&nbsp;<span>Settings</span> </li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="../images/search.png" alt=""></button>
                </div>
                <div class="user">
                    <a href="#" class="btn">Add New</a>
                    <img src="../images/notifications.png" alt="">
                    <div class="img-case">
                        <img src="../images/user.png" alt="">
                    </div>
                </div>
                <div class="user_menu">
                        <h3>Hola
                            <?php echo $_SESSION['username'];?>
                        </h3>
                        <ul>
                            <li><img src=""><a href="#">Mi perfil</a></li>
                            <li><img src=""><a href="#">Configuracion</a></li>
                            <li><img src=""><a href="#">Ayuda</a></li>
                            <li><img src=""><a href="../seguridad/exit.php?salir=true">Cerrar sesion</a></li>
                        </ul>

                    </div>
            </div>
        </div>
        
    </div>

</body>

</html>