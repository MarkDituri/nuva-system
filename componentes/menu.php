<?php
if($donde == "inicio"){
    $a_inicio = "a_active";
}
else if($donde == "miembros"){
    $a_miembros = "a_active";
}
else if($donde == "tareas"){
    $a_tareas = "a_active";
}
else if($donde == "empresa"){
    $a_empresa = "a_active";
}
else if($donde == "cuenta"){
    $a_cuenta = "a_active";
}
?>
<div class="col-xl-2"></div>
<div class="col-xl-2 cont-panel-menu">  
    
    <div class="cont-user">
        <img class="img-logo" src="img/logoblanco.png" alt="">
        <a href="cuenta.php" class="cont-user-all">
            <div class="img-user"  alt="" style=" background: url(php/<?php echo $URL_imagen;?>); background-size: cover;  background-position: center;"></div>
            <h4><?php echo "$nombre $apellido";?></h4>
            <p><?php echo $cargo;?></p>
        </a>

    </div>
    
    <ul class="cont-btns">
        <li class="<?php echo $a_inicio;?>"><a href="index.php"><i class="fas fa-home"></i> Inicio</li></a>
        <li class="<?php echo $a_miembros;?>"><a href="miembros.php"><i class="fas fa-user-friends"></i> Miembros</li></a>
        <li class="<?php echo $a_tareas;?>"><a href="tareas.php"><i class="fas fa-clipboard"></i> Tareas</li></a>
        <li class="<?php echo $a_cuenta;?>"><a href="cuenta.php"><i class="fas fa-user"></i> Cuenta</li></a>
    </ul>
    
    <ul class="cont-btns">
        <li><a href="cerrar_sesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</li></a>
    </ul>
</div>