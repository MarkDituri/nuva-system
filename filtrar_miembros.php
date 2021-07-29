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
                $pais = $_POST["pais"];
                $area = $_POST["area"];
                $sexo = $_POST["sexo"];
            ?>

            <div class="col-xl-10 cont-gral">
                
                <div class="row">
                    <div class="col-12 cont-tit">
                        <h1><i class="fas fa-user-friends"></i> <b>Miembros</b></h1> 
                    </div>

                    <div class="col-12 sinNada cont-dat">

                        <div class="row sinNada sub-tit" id="dobletit">
                            <div class="col-5 sinNada">
                                <h1>Buscador</h1>
                            </div>
                            <div class="col-7 sinNada">
                                <h1>Filtrar</h1>
                            </div>
                        </div>

                        <div class="row sinNada" id="cont-all-busc">
                            <div class="col-4 sinNada" id="cont-forms-b">
                                <form class="row sinNada form-b" action="buscar_miembros.php" method="POST">
                                    <div class="col-12 sinNada cont-buscar1">
                                        <input type="text" name="valorNombre" id="valorNombre" placeholder="Nombre o apellido">
                                        <input id="btn-bus-n" type="submit" name=""  value="Buscar">
                                    </div>
                                </form>
                            </div>
            
                            <div class="col-1"></div>

                            <div class="col-7 sinNada" id="cont-forms-b">
                                <form class="row sinNada form-b" action="filtrar_miembros.php" method="POST">

                                    <div class="col-12 sinNada cont-buscar">
                                        <div class="row sinNada cont-filters">
                                            <div class="col-1 sinNada cont-det-f"><label>Pais</label></div>
                                            <select class="col-2 sinNada" name="pais" id="">
                                                <option value="na">Cualquiera</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Colombia">Colombia</option>
                                            </select>
                                            <div class="col-1 sinNada cont-det-f"><label>Area</label></div>
                                            <select class="col-2 sinNada" name="area" id="">
                                                <option value="na">Cualquiera</option>
                                                <option value="Digital">Digital</option>
                                                <option value="Finanzas">Finanzas</option>
                                                <option value="RRHH">RRHH</option>
                                            </select>
                                            <div class="col-1 sinNada cont-det-f"><label>Sexo</label></div>
                                            <select class="col-2 sinNada" name="sexo" id="">
                                                <option value="na">Cualquiera</option>
                                                <option value="m">Masculino</option>
                                                <option value="f">Femenino</option>
                                            </select>
                                            <input class="col-2 sinNada" id="btn-bus-n" type="submit" name=""  value="Buscar">
                                        </div>   
                                    </div>
                                </form>
                            </div>
                        </div>
                       
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
                        if($sexo == "m"){
                            $sexo_m = "Masculino";
                        } else if($sexo == "f"){
                            $sexo_m = "Femenino";
                        }     
                    
                        if($pais == "na" && $area == "na" && $sexo == "na"){
                            $sql_users = "SELECT * FROM `usuarios`";
                            $filtradosPor = "Todo";
                            
                        } else if($sexo == "na" && $pais == "na"){
                            $sql_users = "SELECT * FROM `usuarios` WHERE `area` = '$area'";
                            $filtradosPor = $area;
                        } else if($sexo == "na" && $area == "na"){
                            $sql_users = "SELECT * FROM `usuarios` WHERE `pais` = '$pais'";
                            $filtradosPor = $pais;
                        } else if($pais == "na" && $area == "na"){
                            $sql_users = "SELECT * FROM `usuarios` WHERE `sexo` = '$sexo'";
                            $filtradosPor = $sexo_m;
                        } else if($sexo == "na"){
                            $sql_users = "SELECT * FROM `usuarios` WHERE `area` = '$area' AND `pais` = '$pais'";
                            $filtradosPor = "$pais - $area";
                        } else if($pais == "na" ){
                            $sql_users = "SELECT * FROM `usuarios` WHERE `area` = '$area' AND `sexo` = '$sexo'";
                            $filtradosPor = "$area - $sexo_m";
                        } else if($area == "na" ){
                            $sql_users = "SELECT * FROM `usuarios` WHERE `sexo` = '$sexo' AND `pais` = '$pais'";
                            $filtradosPor = "$pais - $sexo_m";
                        }else{
                            $sql_users = "SELECT * FROM `usuarios` WHERE `sexo` = '$sexo' AND `pais` = '$pais' AND `area` = '$area'";
                            $filtradosPor = "$pais - $area - $sexo_m";
                        }

                        
 
            
                    ?>


                         <div class="row sinNada sub-tit">
                            <h1>Filtrados por | <?php echo $filtradosPor?></h1>
                        </div>

                        <div class="row sinNada cont-all-users">
                            <?php


                            // 3. Ejecutar la query
                            $query_users = mysqli_query(
                                $conexion, $sql_users
                            );

                            $row_cnt = mysqli_num_rows($query_users);

                            if (mysqli_num_rows($query_users) == 0 ) {
                                exit ("No se encontraron datos");
                            } else {
                               


                            while($dato = mysqli_fetch_array($query_users)) {
                                $id_usuario = $dato['id_usuario'];
                                $nombre = $dato['nombre'];
                                $apellido = $dato['apellido'];
                                $cargo = $dato['cargo'];
                                $area = $dato['area'];
                                $pais = $dato['pais'];
                                $sexo = $dato['sexo'];
                                $fecha = $dato['fecha'];
                                $URL_imagen = $dato['URL_imagen'];

                                $year_act = date("Y");
                                $year = date("Y", strtotime($fecha)); 
                                $edad = $year_act - $year;

                                if($sexo == "m"){
                                    $classSex = "sex-m";
                                    $sexo = "Masculino";
                                } else if($sexo == "f"){
                                    $classSex = "sex-f";
                                    $sexo = "Femenino";
                                }
                                


                            echo "<a href='perfil.php?id_miembro=$id_usuario' class='col-xl-5 cont-users'>";
                            echo    "<div class='foto-user-list' style='background: url(php/$URL_imagen); background-size:cover;background-position:center'>";
                            echo    "</div>";
                            echo    "<div class='text-user-list $classSex'>";
                            echo        "<h1>$nombre $apellido</h1>";
                            echo        "<h2>$cargo | $area</h2>";
                            echo        "<div class='cont-dat-lis'>";
                            echo            "<div class='pais'><img src='img/$pais.jpg' alt=''><h3 class='lmays'>$pais</h3></div>";
                            echo            "<div>-</div>";
                            echo            "<div class='pais'><h3>$edad años</h3></div>";
                            echo            "<div>-</div>";
                            echo             "<div class='pais'><h3>$fecha</h3></div>";
                            echo        "</div>";
                            echo    "</div>";
                            echo "</a>";

                            echo "<div class='col-xl-1'></div>";
              
                            }
                        }

                        ?>

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