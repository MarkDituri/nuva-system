<?php
    $donde = "miembros";
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
                        <h1><a href="miembros.php"><i class="fas fa-user-friends"></i> <b>Miembros</b></a> - Nuevo usuario</h1> <a class="btn-panel" href="cuenta.php"><i class="i-bla fas fa-times-circle"></i> Cerrar</a>
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

                        <form autocomplete="off" action="php/cuenta-nueva.php" enctype="multipart/form-data" method="POST">
                            <div class="row sinNada cont-reg-pass-cl">
                                <h4>Correo electronico:</h4>
                                <input autocomplete="false" type="email" name="email" id="email" class="col-6 input2 b-all">                                  
                                </input>
                            </div>
                            <div class="row sinNada">
                                <h4>Password:</h4>
                            </div>
                            <div class="row sinNada cont-reg-pass">
                                <input autocomplete="false" type="password" name="clave" id="clave" class="col-6 input2 b-izq">                               
                                </input>                           
                            </div>
                            
                            <div class="row sinNada sub-tit">
                                <h1>Datos personales</h1>
                            </div>
                            <div class="row sinNada cont-reg-pass-cl">
                                <h4>Nombre:</h4>
                                <input class="col-6 input2 b-all" type="text" name="nombre" id="nombre" value="" placeholder="">
                                <h4>Apellido:</h4>
                                <input class="col-6 input2 b-all" type="text" name="apellido" id="apellido" value="" placeholder="">
                                <h4>Fecha de nacimiento:</h4>
                                <input class="col-6 input2 b-all" type="date" name="fecha" id="fecha" value="">
                                <h4>Sexo:</h4>
                                <select class="col-6 input2 b-all" name="sexo" id="sexo">       
                                    <option value="n/a">Elegir</option>                             
                                    <option value="m">Hombre</option>
                                    <option value="f">Mujer</option>                                      
                                </select>
                            </div>

                            <div class="row sinNada sub-tit">
                                <h1>Empresarial</h1>
                            </div>
                            <div class="row sinNada cont-reg-pass-cl">
                                <h4>Pais:</h4>
                                <select class="col-6 input2 b-all" name="pais" id="pais">                                    
                                    <option value="argentina">Argentina</option>
                                    <option value="paraguay">Paraguay</option>
                                    <option value="colombia">Colombia</option>
                                    <option value="colombia">Chile</option>
                                    <option value="colombia">España</option>                            
                                </select>
                                <h4>Area:</h4>
                                <select class="col-6 input2 b-all" name="area" id="area">
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
                                <input class="col-6 input2 b-all" type="text" name="cargo" id="cargo" value="" placeholder="">
                                <h4>Superior:</h4>
                                <select class="col-6 input2 b-all" name="superior" id="superior">
                                    <option value='n/a'>Elegir</option>
                                    <?php
                                      $sql_users = "SELECT * FROM `usuarios` WHERE tipo = 'boss'";

                                      // 3. Ejecutar la query
                                      $query_users = mysqli_query(
                                          $conexion, $sql_users
                                      );
                      
                                      $row_cnt = mysqli_num_rows($query_users);
                      
                                      while($dato = mysqli_fetch_array($query_users)) {
                                          $id_usuario = $dato['id_usuario'];
                                          $nombre_b = $dato['nombre'];
                                          $apellido_b = $dato['apellido'];
                                          echo "<option value='$id_usuario'>$nombre_b $apellido_b</option>";
                                        }
                                    ?>
                                   
                                </select>
                                <h4>Interno:</h4>
                                <input class="col-6 input2 b-all" type="text" name="interno" id="interno" value="" placeholder="">
                                
                                <h4>Fecha de ingreso:</h4>
                                <input class="col-6 input2 b-all" type="date" name="fecha_ing" id="fecha_ing" value="">
                            </div>

                            <div class="row sinNada sub-tit">
                                <h1>Foto</h1>
                            </div>
                            <div class="row sinNada">
                                <div class="vt-foto" style="margin-bottom:20px; background: url(img/user.png); background-size: cover;  background-position: center;">

                                </div>
                            </div>
                            
                            <div class="row sinNada cont-edit-sec">
                                <input class='col-4 sinNada in-comun' type="file" name="uploadedfile" id="fotoDesc" value="">
                                <div class="col-6 sinNada  txt-detalle"><span id="errores">jpg, png, gif (resolusion recomendada: 500x500px)<br>Paso maximo: 500kb</span></div>
                            </div>

                            <input id="btn-guardar" class="btn-panel ultimo"type="submit" name="" id="" value="Guardar">
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