<?php
    $donde = "miembros";
    include("php/conexion.php");
    include("php/sesion.php");
    include("componentes/head.php");
    
?>   
<body>


    <div class="container-fluid">
        <div class="row cont-all">
            
            <?php
                include ("componentes/menu.php");

                $id_miembro = $_GET["id_miembro"];
                $sql_users = "SELECT * FROM `usuarios` WHERE id_usuario = $id_miembro";

                // 3. Ejecutar la query
                $query_users = mysqli_query(
                    $conexion, $sql_users
                );

                $row_cnt = mysqli_num_rows($query_users);

                while($dato = mysqli_fetch_array($query_users)) {
                    $id_miembro = $dato['id_usuario'];
                    $nombre = $dato['nombre'];
                    $apellido = $dato['apellido'];
                    $email = $dato['email'];
                    $cargo = $dato['cargo'];
                    $area = $dato['area'];
                    $pais = $dato['pais'];
                    $interno = $dato['interno'];
                    $superior = $dato['superior'];
                    $sexo = $dato['sexo'];
                    $fecha = $dato['fecha'];
                    $URL_imagen = $dato['URL_imagen'];

                    $year_act = date("Y");
                    $year = date("Y", strtotime($fecha)); 
                    $edad = $year_act - $year;

                    if($sexo == "m"){
                        $classSex = "back-m";
                        $sexo = "Masculino";
                    } else if($sexo == "f"){
                        $classSex = "back-f";
                        $sexo = "Femenino";
                    }

                    
                }

                $superior_id = "SELECT * FROM `usuarios` WHERE id_usuario=$superior";

                // 3. Ejecutar la query
                $superior_sql = mysqli_query(
                            $conexion, $superior_id
                            );
            
                // 4. Verificar si funcionó
                if($superior_sql == true){
                    while($dato = mysqli_fetch_array($superior_sql)) {
                        $nombre_b = $dato["nombre"];
                        $apellido_b = $dato["apellido"];
                        }
                    }
                    $superior = "$nombre_b $apellido_b";
 
            ?>
            <div class="col-xl-10 cont-gral">
                <div class="row">
                    <div class="col-12 cont-tit">
                        <h1><i class="fas fa-user"></i> <b><?php echo $nombre;?></b> - Perfil</h1>
                        <div class="cont-btns-nav">
                            <?php
                                if($acceso == "master"){                                
                            ?>
                                <a id="btn-edit-perfil" class="btn-panel" href="miembro-editar.php?id_miembro=<?php echo $id_miembro;?>"><i class="i-bla fas fa-pen"></i> Editar</a>
                            <?php
                                }
                            ?>
                            <a class="btn-panel" href="miembros.php"><i class="i-bla fas fa-times-circle"></i> Cerrar</a>
                        </div>
                     
                    </div>
                    <div class="col-12 sinNada">
                    <div class="row sinNada <?php echo $classSex;?>" id="cont-all-p">
                            <div class="col-2 cont-foto-p">
                                <div class="vt-foto p-foto" style=" background: url(php/<?php echo $URL_imagen;?>); background-size: cover;  background-position: center;">
                                </div>
                            </div>

                            <div class="col-4 cont-p-text">
                                <h1><?php echo "$nombre $apellido";?></h1>
                                <h2><?php echo "$cargo | $area"?></h2>
                                <h3><?php echo "$email"?></h3>
                                <div class='pais'><img src='img/<?php echo $pais;?>.jpg' alt=''><h4 class='lmays'><?php echo $pais;?></h4></div>
                            </div>

                            <div class="col-2 cont-p-text-center">
                                <h2>Teléfono</h2>
                                <h3><a href="tel:<?php echo $interno;?>"><i class="fas fa-phone"></i> <?php echo $interno;?></a></h3>
                            </div>

                            <div class="col-3 cont-p-text-center">
                                <div class="cont-img-c">
                                    <div class="img-contactar">
                                        <img src="img/skype.png" alt="">
                                    </div>
                                    <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to= <?php echo $email;?>" target="_blank">
                                        <div class="img-contactar">
                                            <img src="img/gmail.png" alt="">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
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
                            <h1>Datos</h1>
                        </div>
                        <div class="row sinNada">
                            <h4><b>Nombre:</b> <?php echo $nombre;?></h4>
                            <h4><b>Apellido:</b> <?php echo $apellido;?></h4><br>

                            <a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to= <?php echo $email;?>"><h4><b>Correo electronico:</b> <?php echo $email;?></h4></a> 
                            <h4><b>Fecha de nacimiento:</b> <?php echo $fecha;?></h4>
                            <h4><b>Edad:</b> <?php echo $edad;?> años</h4>
                            <h4><b>Sexo:</b> <?php echo $sexo;?></h4><br>

                            <h4><b>Area:</b> <?php echo $area;?></h4>
                            <h4><b>Cargo:</b> <?php echo $cargo;?></h4>
                            <h4><b>Superior:</b> <?php echo $superior;?></h4>
                            <h4><b>Fecha de Ingrso:</b> <?php echo $fecha_ing;?></h4>
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