<?php
    $donde = "cuenta";
    include("php/conexion.php");
    include("php/sesion.php");
    include("componentes/head.php");
?>   
<body>

<?php

   /* include("componentes/menu.php");*/
?>   

    <div class="container-fluid">
        <div class="row cont-all">
            
            <?php
                include ("componentes/menu.php");
            ?>
  

            <div class="col-xl-10 cont-gral">
                <div class="row">
                    <div class="col-12 cont-tit">
                        <h1><i class="fas fa-user"></i> <b>Cuenta</b></h1> <a class="btn-panel" href="cuenta-editar.php"><i class="i-bla fas fa-pen"></i> Editar</a>
                    </div>

                    <div class="col-12 sinNada cont-dat">

                    
                    <?php 

                        if(isset($_GET["ver_dat"])){
                            $ver_dat = $_GET["ver_dat"];
                            if($ver_dat == "si"){
                                echo "<div class='row sinNada cont-promo-check'>";
                                echo    "<div class='col-12 sinNada'>";
                                echo        "<h4><i class='fas fa-check-circle'></i> Genial</h4>";
                                echo        "<p>Los datos fueron actualizados con Exito!";
                                echo        "</p>";
                                echo    "</div>";
                                echo "</div>";
                            } else if ($ver_dat == "no"){
                                echo "<div class='row cont-promo-no'>";
                                echo    "<div class='col-12 sinNada'>";
                                echo        "<h4><i class='fas fa-times'></i> Error</h4>";
                                echo        "<p>No se encontro ningun cupon valido con el codigo <b>$</b>";
                                echo        "</p>";
                                echo    "</div>";
                                echo "</div>";
                            }
                        };

                    ?>

                        <div class="row sinNada sub-tit">
                            <h1>Cuenta</h1>
                        </div>
                        <div class="row sinNada">
                            <h4><b>Correo electronico:</b> <?php echo $email;?></h4>
                            <div class="cont-pass">
                                <h4><b>Password:</b> 
                                
                                    <?php echo "<span id='pass-char-ver'>";
                                        for($i = 0; $i <= strlen($clave);  $i++){
                                            echo "*";
                                        }
                                        echo "</span>";
                                        echo "<span id='pass-char-nover'>$clave</span>"
                                    ?>
                                </h4>
                                <h4 class="cont-ver p-l" id="pass-ver"><i class="fas fa-eye"></i></h4>
                                <h4 class="cont-ver p-l" id="pass-noVer"><i class="fas fa-eye-slash"></i></h4>
                              
                            </div>

                        </div>
                        <div class="row sinNada sub-tit">
                            <h1>Datos personales</h1>
                        </div>
                        <div class="row sinNada">
                            <h4><b>Nombre:</b> <?php echo $nombre;?></h4>
                            <h4><b>Apellido:</b> <?php echo $apellido;?></h4>
                            <h4><b>Fecha de nacimiento:</b> <?php echo $fecha;?></h4>
                            <h4><b>Edad:</b> <?php echo $edad;?> años</h4>

                        </div>

                        <div class="row sinNada sub-tit">
                            <h1>Empresarial</h1>
                        </div>
                        <div class="row sinNada">
                            <h4><b>Sede:</b><span class="lmays"> <?php echo $pais;?></span><img class="img-ban" src="img/<?php echo $pais;?>.jpg"> </h4>
                            <h4><b>Area:</b> <?php echo $area;?></h4>
                            <h4><b>Cargo:</b> <?php echo $cargo;?></h4>
                            <h4><b>Superior:</b> <?php echo $superior;?></h4>
                            <h4><b>Teléfono:</b> <?php echo $interno;?></h4>
                            <h4><b>Fecha de Ingrso:</b> <?php echo $fecha_ing;?></h4>
                        </div>

                        <div class="row sinNada sub-tit">
                            <h1>Foto</h1>
                        </div>
                        <div class="row sinNada ultimo">
                            <div class="vt-foto" style=" background: url(php/<?php echo $URL_imagen;?>); background-size: cover;  background-position: center;">

                            </div>
                        </div>

                      
                    </div>

                </div>
            </div>
    </div>

    <script src="js/jquery-3.3.1.slim.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>