<?php
    include("php/conexion.php");
    include("php/sesion.php");
    include("componentes/head.php");

    $sql_users = "SELECT * FROM `usuarios`";

    $query_users = mysqli_query(
        $conexion, $sql_users
    );

    while($dato = mysqli_fetch_array($query_users)) {
        $id_usuario = $dato['id_usuario'];
        $fecha = $dato['fecha'];
        $fechaComoEntero = strtotime($fecha);
        $cumple = date("m", $fechaComoEntero);
    }

    $donde = "tareas";
    /* Config Fechas */
    $fechaHoy = date("m");
    switch ($fechaHoy) {
        case 1:
            $fechaHoy_txt = "Enero";
            break;
        case 2:
            $fechaHoy_txt = "Febrero";
            break;
        case 3:
            $fechaHoy_txt = "Marzo";
            break;
        case 4:
            $fechaHoy_txt = "Abril";
            break;
        case 5:
            $fechaHoy_txt = "Mayo";
            break;
        case 6:
            $fechaHoy_txt = "Junio";
            break;
        case 7:
            $fechaHoy_txt = "Julio";
            break;
        case 8:
            $fechaHoy_txt = "Agosto";
            break;
        case 9:
            $fechaHoy_txt = "Septiembre";
            break;
        case 10:
            $fechaHoy_txt = "Octubre";
            break;
        case 11:
            $fechaHoy_txt = "Noviembre";
            break;
        case 12:
            $fechaHoy_txt = "Diciembre";
        break;
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
                        <?php
                            if($acceso == "master"){                        
                        ?>
                                <h1><i class="fas fa-user-friends"></i> <b>Tareas</b></h1> <a class="btn-panel" href="tarea-nueva.php"><i class="i-bla fas fa-plus"></i> Nueva tarea</a>
                        <?php
                            } else{
                        ?>
                                <h1><i class="fas fa-user-friends"></i> <b>Tareas</b></h1> 
                        <?php
                            }
                        ?>
                    </div>

                    <div class="col-12 sinNada cont-dat">
                        <div class="row sinNada cont-all-users tareas-all">
                            <!-- Inicio Tarea-->
                            <div class="col-xl-7">
                                <!-- TAREAS PENDIENTES--> 
                                <div class="row">
                                    <div class="col-12 sinNada sub-tit">
                                        <h1>Tareas Pendientes</h1>
                                    </div>

                                    <div class="col-12 sinNada">                                                                          
                                    <?php

                                    if($acceso == "master"){
                                        $sql_tarea = "SELECT * FROM `tareas` WHERE `status` = 'si' AND `estado` = 1 ORDER BY `fecha_1` desc;";
                                    } else{
                                        if(isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
                                            $id_usuario = $_SESSION['id_usuario'];
                                            $id_usuario_session = $_SESSION['id_usuario'];

                                            $sql_tarea = "SELECT * FROM `tareas` WHERE `status` = 'si'  AND `estado` = 1 AND `id_usuario` = $id_usuario_session  ORDER BY `fecha_1` desc;";
                                        }
                                    }                                    
                                   

                                        // 3. Ejecutar la query
                                        $sql_tarea_ej = mysqli_query(
                                            $conexion, $sql_tarea
                                        );
                                        

                                        while($dato = mysqli_fetch_array($sql_tarea_ej)) {
                                            $id_tarea = $dato['id_tarea'];

                                            $titulo = $dato['titulo'];
                                            $detalle = $dato['detalle'];
                                            $link_1 = $dato['link_1'];
                                            $link_2 = $dato['link_2'];
                                            $link_3 = $dato['link_3'];
                                            $id_estado = $dato['estado'];
                                            $id_responsable = $dato['id_usuario'];
                                            $fecha_1 = $dato['fecha_1'];
                                            $fecha_2 = $dato['fecha_2'];
                                            $fecha_3 = $dato['fecha_3'];
                                            $fecha_4 = $dato['fecha_4'];
                                            
                                            $fechaEntera = strtotime($fecha_1);
                                            $anio = date("Y", $fechaEntera);
                                            $mes = date("m", $fechaEntera);
                                            $dia = date("d", $fechaEntera);
                                            
                                            $hora = date("H", $fechaEntera);
                                            $minutos = date("i", $fechaEntera);
                                            $segundos = date("s", $fechaEntera);
                                            
                                            $sql_estado_tarea = "SELECT * FROM `estados_tareas` WHERE id_estado_tarea = $id_estado;";                                            
                                            $sql_estado_tarea_ej = mysqli_query(
                                                $conexion, $sql_estado_tarea
                                            );                                                
                                            while($dato = mysqli_fetch_array($sql_estado_tarea_ej)) {
                                                $icono_estado = $dato['icono'];
                                            }

                                            if($acceso == "master"){
                                                echo "<div class='row sinNada cont-tarea tarea-back ver-tarea' id='$id_tarea'>";
                                                echo "<input type='hidden' class='id_tarea' value='$id_tarea'></input>";
                                                echo "    <div class='col-7 text-user-list'>";
                                                echo "        <h1>$icono_estado</i> $titulo</h1>";
                                                echo "    </div>";
                                                echo "    <div class='col-2 fecha-tarea-list cont-list-res'>";
                                                $sql_responsable = "SELECT * FROM `usuarios` WHERE `id_usuario` = $id_responsable;";
                                                $sql_responsable_ej = mysqli_query(
                                                    $conexion, $sql_responsable
                                                );                                            
                                                while($dato = mysqli_fetch_array($sql_responsable_ej)) {
                                                    $id_usuario = $dato['id_usuario'];
                                                    $nombre_res = $dato['nombre'];
                                                    $apellido_res = $dato['apellido'];
                                                    $cargo = $dato['cargo'];
                                                    $img_user = $dato['URL_imagen'];       
                                                    echo "        <div style='background: url(php/$img_user); background-size:cover; background-position: center;' class='img-res'></div>";  
                                                    echo "        <h2>$nombre_res</h2>";
                                                } 
                                                echo "    </div>";

                                                if($dia == $DiaActual){
                                                    $dia = "Hoy";
                                                    echo "    <div class='col-3 fecha-tarea-list' id='hoy-deco'>";
                                                    echo "        <h1>Entrega</h1>";
                                                    echo "        <h2>Hoy</h2>";
                                                    echo "    </div>";
                                                    echo "</a>";
                                                } else{
                                                    $dia = $dia;
                                                    echo "    <div class='col-3 fecha-tarea-list'>";
                                                    echo "        <h1>Entrega</h1>";
                                                    echo "        <h2>$dia/$mes</h2>";
                                                    echo "    </div>";
                                                    echo "</a>";
                                                }
                                                echo "</div>";
                                            } else{
                                                echo "<div class='row sinNada cont-tarea tarea-back ver-tarea' id='$id_tarea'>";
                                                echo "<input type='hidden' class='id_tarea' value='$id_tarea'></input>";
                                                echo "    <div class='col-9 text-user-list'>";
                                                echo "        <h1>$icono_estado</i> $titulo</h1>";
                                                echo "    </div>";
                                                if($dia == $DiaActual){
                                                    $dia = "Hoy";
                                                    echo "    <div class='col-3 fecha-tarea-list' id='hoy-deco'>";
                                                    echo "        <h1>Entrega</h1>";
                                                    echo "        <h2>Hoy</h2>";
                                                    echo "    </div>";
                                                    echo "</a>";
                                                } else{
                                                    $dia = $dia;
                                                    echo "    <div class='col-3 fecha-tarea-list'>";
                                                    echo "        <h1>Entrega</h1>";
                                                    echo "        <h2>$dia/$mes</h2>";
                                                    echo "    </div>";
                                                    echo "</a>";
                                                }
                                                echo "</div>";
                                            }
  

                                        echo "<div class='col-xl-1'></div>";

                                        }
                                    ?>
                                    </div>
                                </div>

                                <!--TAREAS EN CURSO-->
                                <div class="row">
                                    <div class="col-12 sinNada sub-tit">
                                        <h1>Tareas En Curso</h1>
                                    </div>

                                    <div class="col-12 sinNada">                                                                          
                                    <?php

                                    if($acceso == "master"){
                                        $sql_tarea = "SELECT * FROM `tareas` WHERE `status` = 'si' AND `estado` = 2 ORDER BY `fecha_1` desc;";
                                    } else{
                                        if(isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
                                            $id_usuario = $_SESSION['id_usuario'];
                                            $id_usuario_session = $_SESSION['id_usuario'];

                                            $sql_tarea = "SELECT * FROM `tareas` WHERE `status` = 'si' AND `estado` = 2 AND `id_usuario` = $id_usuario_session ORDER BY `fecha_1` desc;";
                                        }
                                    }                                    
                                   

                                        // 3. Ejecutar la query
                                        $sql_tarea_ej = mysqli_query(
                                            $conexion, $sql_tarea
                                        );
                                        

                                        while($dato = mysqli_fetch_array($sql_tarea_ej)) {
                                            $id_tarea = $dato['id_tarea'];

                                            $titulo = $dato['titulo'];
                                            $detalle = $dato['detalle'];
                                            $link_1 = $dato['link_1'];
                                            $link_2 = $dato['link_2'];
                                            $link_3 = $dato['link_3'];
                                            $id_estado = $dato['estado'];
                                            $id_responsable = $dato['id_usuario'];
                                            $fecha_1 = $dato['fecha_1'];
                                            $fecha_2 = $dato['fecha_2'];
                                            $fecha_3 = $dato['fecha_3'];
                                            $fecha_4 = $dato['fecha_4'];
                                            
                                            $fechaEntera = strtotime($fecha_1);
                                            $anio = date("Y", $fechaEntera);
                                            $mes = date("m", $fechaEntera);
                                            $dia = date("d", $fechaEntera);
                                            
                                            $hora = date("H", $fechaEntera);
                                            $minutos = date("i", $fechaEntera);
                                            $segundos = date("s", $fechaEntera);
                                            
                                            $sql_estado_tarea = "SELECT * FROM `estados_tareas` WHERE id_estado_tarea = $id_estado;;";                                            
                                            $sql_estado_tarea_ej = mysqli_query(
                                                $conexion, $sql_estado_tarea
                                            );                                                
                                            while($dato = mysqli_fetch_array($sql_estado_tarea_ej)) {
                                                $icono_estado = $dato['icono'];
                                            }

                                            if($acceso == "master"){
                                                echo "<div class='row sinNada cont-tarea tarea-back ver-tarea' id='$id_tarea'>";
                                                echo "<input type='hidden' class='id_tarea' value='$id_tarea'></input>";
                                                echo "    <div class='col-7 text-user-list'>";
                                                echo "        <h1>$icono_estado</i> $titulo</h1>";
                                                echo "    </div>";
                                                echo "    <div class='col-2 fecha-tarea-list cont-list-res'>";
                                                $sql_responsable = "SELECT * FROM `usuarios` WHERE `id_usuario` = $id_responsable;";
                                                $sql_responsable_ej = mysqli_query(
                                                    $conexion, $sql_responsable
                                                );                                            
                                                while($dato = mysqli_fetch_array($sql_responsable_ej)) {
                                                    $id_usuario = $dato['id_usuario'];
                                                    $nombre_res = $dato['nombre'];
                                                    $apellido_res = $dato['apellido'];
                                                    $cargo = $dato['cargo'];
                                                    $img_user = $dato['URL_imagen'];       
                                                    echo "        <div style='background: url(php/$img_user); background-size:cover; background-position: center;' class='img-res'></div>";  
                                                    echo "        <h2>$nombre_res</h2>";
                                                } 
                                                echo "    </div>";
                                                if($dia == $DiaActual){
                                                    $dia = "Hoy";
                                                    echo "    <div class='col-3 fecha-tarea-list' id='hoy-deco'>";
                                                    echo "        <h1>Entrega</h1>";
                                                    echo "        <h2>Hoy</h2>";
                                                    echo "    </div>";
                                                    echo "</a>";
                                                } else{
                                                    $dia = $dia;
                                                    echo "    <div class='col-3 fecha-tarea-list'>";
                                                    echo "        <h1>Entrega</h1>";
                                                    echo "        <h2>$dia/$mes</h2>";
                                                    echo "    </div>";
                                                    echo "</a>";
                                                }
                                                echo "</div>";
                                            } else{
                                                echo "<div class='row sinNada cont-tarea tarea-back ver-tarea' id='$id_tarea'>";
                                                echo "<input type='hidden' class='id_tarea' value='$id_tarea'></input>";
                                                echo "    <div class='col-9 text-user-list'>";
                                                echo "        <h1>$icono_estado</i> $titulo</h1>";
                                                echo "    </div>";
                                                if($dia == $DiaActual){
                                                    $dia = "Hoy";
                                                    echo "    <div class='col-3 fecha-tarea-list' id='hoy-deco'>";
                                                    echo "        <h1>Entrega</h1>";
                                                    echo "        <h2>Hoy</h2>";
                                                    echo "    </div>";
                                                    echo "</a>";
                                                } else{
                                                    $dia = $dia;
                                                    echo "    <div class='col-3 fecha-tarea-list'>";
                                                    echo "        <h1>Entrega</h1>";
                                                    echo "        <h2>$dia/$mes</h2>";
                                                    echo "    </div>";
                                                    echo "</a>";
                                                }
                                                echo "</div>";
                                            }

                                        echo "<div class='col-xl-1'></div>";

                                        }
                                    ?>
                                    </div>
                                </div>
                                
                                <!--TAREAS FINALIZADAS-->
                                <div class="row">
                                    <div class="col-12 sinNada sub-tit">
                                        <h1>Todas las Finalizadas</h1>
                                    </div>

                                    <div class="col-12 sinNada">                                                                          
                                    <?php

                                    if($acceso == "master"){
                                        $sql_tarea = "SELECT * FROM `tareas` WHERE `status` = 'si' AND `estado` = 3 ORDER BY `fecha_1` desc;";
                                    } else{
                                        if(isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
                                            $id_usuario = $_SESSION['id_usuario'];
                                            $id_usuario_session = $_SESSION['id_usuario'];

                                            $sql_tarea = "SELECT * FROM `tareas` WHERE `status` = 'si' AND `estado` = 3 AND `id_usuario` = $id_usuario_session ORDER BY `fecha_1` desc;";
                                        }
                                    }                                    
                                   

                                        // 3. Ejecutar la query
                                        $sql_tarea_ej = mysqli_query(
                                            $conexion, $sql_tarea
                                        );
                                        

                                        while($dato = mysqli_fetch_array($sql_tarea_ej)) {
                                            $id_tarea = $dato['id_tarea'];

                                            $titulo = $dato['titulo'];
                                            $detalle = $dato['detalle'];
                                            $link_1 = $dato['link_1'];
                                            $link_2 = $dato['link_2'];
                                            $link_3 = $dato['link_3'];
                                            $id_estado = $dato['estado'];
                                            $id_responsable = $dato['id_usuario'];
                                            $fecha_1 = $dato['fecha_1'];
                                            $fecha_2 = $dato['fecha_2'];
                                            $fecha_3 = $dato['fecha_3'];
                                            $fecha_4 = $dato['fecha_4'];
                                            
                                            $fechaEntera = strtotime($fecha_1);
                                            $anio = date("Y", $fechaEntera);
                                            $mes = date("m", $fechaEntera);
                                            $dia = date("d", $fechaEntera);
                                            
                                            $hora = date("H", $fechaEntera);
                                            $minutos = date("i", $fechaEntera);
                                            $segundos = date("s", $fechaEntera);
                                            
                                            $sql_estado_tarea = "SELECT * FROM `estados_tareas` WHERE id_estado_tarea = $id_estado;;";                                            
                                            $sql_estado_tarea_ej = mysqli_query(
                                                $conexion, $sql_estado_tarea
                                            );                                                
                                            while($dato = mysqli_fetch_array($sql_estado_tarea_ej)) {
                                                $icono_estado = $dato['icono'];
                                            }
                                            if($acceso == "master"){
                                                echo "<div class='row sinNada cont-tarea tarea-back ver-tarea' id='$id_tarea'>";
                                                echo "<input type='hidden' class='id_tarea' value='$id_tarea'></input>";
                                                echo "    <div class='col-7 text-user-list'>";
                                                echo "        <h1>$icono_estado</i> $titulo</h1>";
                                                echo "    </div>";
                                                echo "    <div class='col-2 fecha-tarea-list cont-list-res'>";
                                                $sql_responsable = "SELECT * FROM `usuarios` WHERE `id_usuario` = $id_responsable;";
                                                $sql_responsable_ej = mysqli_query(
                                                    $conexion, $sql_responsable
                                                );                                            
                                                while($dato = mysqli_fetch_array($sql_responsable_ej)) {
                                                    $id_usuario = $dato['id_usuario'];
                                                    $nombre_res = $dato['nombre'];
                                                    $apellido_res = $dato['apellido'];
                                                    $cargo = $dato['cargo'];
                                                    $img_user = $dato['URL_imagen'];       
                                                    echo "        <div style='background: url(php/$img_user); background-size:cover; background-position: center;' class='img-res'></div>";  
                                                    echo "        <h2>$nombre_res</h2>";
                                                } 
                                                echo "    </div>";
                                                if($dia == $DiaActual){
                                                    $dia = "Hoy";
                                                    echo "    <div class='col-3 fecha-tarea-list' id='hoy-deco'>";
                                                    echo "        <h1>Entrega</h1>";
                                                    echo "        <h2>Hoy</h2>";
                                                    echo "    </div>";
                                                    echo "</a>";
                                                } else{
                                                    $dia = $dia;
                                                    echo "    <div class='col-3 fecha-tarea-list'>";
                                                    echo "        <h1>Entrega</h1>";
                                                    echo "        <h2>$dia/$mes</h2>";
                                                    echo "    </div>";
                                                    echo "</a>";
                                                }
                                                echo "</div>";
                                            } else{
                                                echo "<div class='row sinNada cont-tarea tarea-back ver-tarea' id='$id_tarea'>";
                                                echo "<input type='hidden' class='id_tarea' value='$id_tarea'></input>";
                                                echo "    <div class='col-9 text-user-list'>";
                                                echo "        <h1>$icono_estado</i> $titulo</h1>";
                                                echo "    </div>";
                                                if($dia == $DiaActual){
                                                    $dia = "Hoy";
                                                    echo "    <div class='col-3 fecha-tarea-list' id='hoy-deco'>";
                                                    echo "        <h1>Entrega</h1>";
                                                    echo "        <h2>Hoy</h2>";
                                                    echo "    </div>";
                                                    echo "</a>";
                                                } else{
                                                    $dia = $dia;
                                                    echo "    <div class='col-3 fecha-tarea-list'>";
                                                    echo "        <h1>Entrega</h1>";
                                                    echo "        <h2>$dia/$mes</h2>";
                                                    echo "    </div>";
                                                    echo "</a>";
                                                }
                                                echo "</div>";
                                            }

                                        echo "<div class='col-xl-1'></div>";

                                        }
                                    ?>
                                    </div>
                                </div>

                            </div>
                            <!-- Fin Tarea-->
                            
                            <!-- Inicio Detalles-->
                            <div class="col-xl-4" id="fixed-detalles">
                                <div class="row">
                                    <div class="col-12 sinNada sub-tit">
                                        <h1>Detalles de la tarea</h1>
                                    </div>

                                    <div class="col-12 sinNada detalles_tarea">             
                                        <div class='row sinNada text-user-list cont-tarea'>
                                            <div class='sinNada col-12'>
                                               <h2>Porfavor, seleccione una tarea para ver sus detalles reflejados aqui</h2>
                                            </div>  
                                        </div>                                                                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Fin Tarea-->

                            
                        </div>
                    
                    </div>

                </div>
            </div>
    </div>

    <script src="js/jquery-3.3.1.slim.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script>
    // Abrir Ver Tarea

    $(".ver-tarea").click(function(){
        var id_tarea = $(this).attr("id");

        $(".detalles_tarea").load("php/ver_tarea.php?"+$.param(
            {id_tarea: id_tarea}
        ));

    })
    </script>
</body>
</html>