<?php
    include("php/conexion.php");
    include("php/sesion.php");
    include("componentes/head.php");

    if(isset($_GET['id_miembro'])){
        $id_usuario_miem = $_GET['id_miembro'];
        $donde = "miembros";
        
        $mostrar_miem = "SELECT * FROM `usuarios` WHERE id_usuario=$id_usuario_miem";
        // 3. Ejecutar la query
        $mostrar_miem_miem_ej = mysqli_query(
                    $conexion, $mostrar_miem
                    );
    
        // 4. Verificar si funcionó
        if($mostrar_miem_miem_ej == true){
            while($dato = mysqli_fetch_array($mostrar_miem_miem_ej)) {

                $email_miem = $dato["email"];
                $clave_miem = $dato["clave"];
                $nombre_miem = $dato["nombre"];
                $apellido_miem = $dato["apellido"];
                $pais_miem = $dato["pais"];
                $area_miem = $dato["area"];
                $interno_miem = $dato["interno"];
                $cargo_miem = $dato["cargo"];
                $superior_miem = $dato["superior"];

                $fecha_miem = $dato["fecha"];
                $fecha_ing_miem = $dato["fecha_ing"];
                $URL_imagen_miem = $dato["URL_imagen"];
                
                $acceso_miem = $dato["acceso"];
                $year_miem_act_miem = date("Y");
                $year_miem = date("Y", strtotime($fecha_miem)); 

                $edad_miem = $year_miem_act_miem - $year_miem;


            }

            $superior_id_miem = "SELECT * FROM `usuarios` WHERE id_usuario=$superior_miem";


            // 3. Ejecutar la query
            $superior_miem_sql = mysqli_query(
                $conexion, $superior_id_miem 
            );
        
            // 4. Verificar si funcionó
            if($superior_miem_sql == true){
                while($dato_2 = mysqli_fetch_array($superior_miem_sql)) {
                    $nombre_miem_b = $dato_2["nombre"];
                    $apellido_miem_b = $dato_2["apellido"];
                }
            }
            $superior_miem = "$nombre_miem_b $apellido_miem_b";
        }
    } else{
        echo "<script>alert('No vino ID')</script>";
        $donde = "miembro";
    }



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
                        <h1><i class="fas fa-user"></i> <b>Cuenta</b> - Editar</h1> <a class="btn-panel" href="cuenta.php"><i class="i-bla fas fa-times-circle"></i> Cerrar</a>
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

                        <form action="php/miembro-editar.php" enctype="multipart/form-data" method="POST">
                            <div class="row sinNada cont-reg-pass-cl">
                                <h4>Correo electronico:</h4>
                                <div class="col-6 input2 b-all">
                                    <?php echo $email_miem;?>
                                </div>
                            </div>
                            <div class="row sinNada">
                                <h4>Password:</h4>
                            </div>
                            <div class="row sinNada cont-reg-pass">
                                <div class="col-5 input2 b-izq">
                                    <?php echo "<span id='pass-char-ver'>";
                                        for($i = 0; $i <= strlen($clave_miem);  $i++){
                                            echo "*";
                                        }
                                        echo "</span>";
                                        echo "<span id='pass-char-nover'>$clave_miem</span>"
                                    ?>
                                </div>
                                <h4 class="col-1 cont-ver b-der" id="pass-ver"><i class="fas fa-eye"></i></h4>
                                <h4 class="col-1 cont-ver b-der" id="pass-noVer"><i class="fas fa-eye-slash"></i></h4>
                                
                                <a class="col-2 btn-panel p-l" href="cambiar-php">Cambiar</a>
                            </div>
                            
                            <div class="row sinNada sub-tit">
                                <h1>Datos personales</h1>
                            </div>
                            <div class="row sinNada cont-reg-pass-cl">
                                <input class="col-6 input" type="hidden" name="id_miembro" id="id_miembro" value="<?php echo $id_usuario_miem;?>" placeholder="<?php echo $id_usuario_miem;?>">
                                <h4>Nombre:</h4>
                                <input class="col-6 input" type="text" name="nombre" id="nombre" value="<?php echo $nombre_miem;?>" placeholder="<?php echo $nombre_miem;?>">
                                <h4>Apellido:</h4>
                                <input class="col-6  input" type="text" name="apellido" id="apellido" value="<?php echo $apellido_miem;?>" placeholder="<?php echo $apellido_miem;?>">
                                <h4>Fecha de nacimiento:</h4>
                                <input class="col-6  input" type="date" name="fecha" id="fecha" value="<?php echo $fecha_miem;?>">

                            </div>

                            <div class="row sinNada sub-tit">
                                <h1>Empresarial</h1>
                            </div>
                            <div class="row sinNada cont-reg-pass-cl">
                                <h4>Sede:</h4>
                                <select class="col-6 input" name="pais" id="area">
                                    <option value="<?php echo $pais_miem;?>"><?php echo $pais_miem;?></option>
                                    <option value="argentina"><img src="img/argentina.png">Argentina</option>
                                    <option value="paraguay">Paraguay</option>
                                    <option value="colombia">Colombia</option>
                                </select>
                                <h4>Area:</h4>
                                <select class="col-6 input" name="area" id="area">
                                    <option value="<?php echo $area_miem;?>"><?php echo $area_miem;?></option>
                                    <option value="n/a">Elegir</option>
                                    <option value="CEO">CEO</option>
                                    <option value="Digital">Digital</option>
                                    <option value="Finanzas">Finanzas</option>
                                    <option value="RRHH">RRHH</option>
                                    <option value="IT">IT</option>
                                    <option value="Logistica">Logistica</option>
                                    <option value="Administracion">Administracion</option>
                                    <option value="Otro">Otro</option>
                                </select>
                                <h4>Cargo:</h4>
                                <input class="col-6  input" type="text" name="cargo" id="" value="<?php echo $cargo_miem;?>" placeholder="<?php echo $cargo_miem;?>">
                                <h4>Superior:</h4>
                                <select class="col-6 input" name="superior" id="siperior">
                                    <?php
                                      $sql_users = "SELECT * FROM `usuarios` WHERE tipo = 'boss'";

                                      // 3. Ejecutar la query
                                      $query_users = mysqli_query(
                                          $conexion, $sql_users
                                      );
                      
                                      $row_cnt = mysqli_num_rows($query_users);
                      
                                      while($dato = mysqli_fetch_array($query_users)) {
                                          $id_usuario = $dato['id_usuario'];
                                          $nombre_miem_b = $dato['nombre'];
                                          $apellido_miem_b = $dato['apellido'];
                                          echo "<option value='$id_usuario'>$nombre_miem_b $apellido_miem_b</option>";
                                        }
                                    ?>
                                   
                                </select>
                                <h4>Teléfono:</h4>
                                <input class="col-6 input" type="text" name="interno" id="" value="<?php echo $interno_miem;?>" placeholder="<?php echo $interno_miem;?>">
                                
                                <h4>Fecha de ingreso:</h4>
                                <input class="col-6 input" type="date" name="fecha_ing" id="" value="<?php echo $fecha_ing_miem;?>">
                            </div>

                            <div class="row sinNada sub-tit">
                                <h1>Foto</h1>
                            </div>
                            <div class="row sinNada">
                                <div class="vt-foto" style="margin-bottom:20px; background: url(php/<?php echo $URL_imagen_miem;?>); background-size: cover;  background-position: center;">

                                </div>
                            </div>
                            
                            <div class="row sinNada cont-edit-sec">
                                <input class='col-4 sinNada in-comun' type="file" name="uploadedfile" id="fotoDesc" value="">
                                <div class="col-6 sinNada  txt-detalle"><span id="errores">jpg, png, gif (resolusion recomendada: 500x500px)<br>Paso maximo: 500kb</span></div>
                            </div>

                            <input id="btn-enviar" class="btn-panel ultimo"type="submit" name="" id="" value="Guardar">
                        </form>

 
                      
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