<?php
    $donde = "inicio";
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
                        <h1><i class="fas fa-home"></i> <b>Inicio</b></h1>
                    </div>
                    <div class="col-12 sinNada cont-dat">
                         <!-- TAREAS PENDIENTES--> 
                         <div class="row">
                            <div class="col-5 sinNada sub-tit">
                                <h1>Tareas para Entregar Hoy</h1>
                            </div>

                            <div class="col-5 sinNada">                                                                          
                            <?php

                           /* date_default_timezone_set('America/Argentina/Buenos_Aires');    
                            $DateAndTime = date('m-d-Y h:i:s a', time());  
                            echo "The current date and time in Amsterdam are $DateAndTime.\n";
                            */                        

                            if($acceso == "master"){
                                $sql_tarea = "SELECT * FROM `tareas` WHERE `status` = 'si' AND `estado` = 1 AND `fecha_1` = '$fechaActual';";
                            } else{
                                if(isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
                                    $id_usuario = $_SESSION['id_usuario'];
                                    $id_usuario_session = $_SESSION['id_usuario'];

                                    $sql_tarea = "SELECT * FROM `tareas` WHERE `status` = 'si'  AND `estado` = 1 AND `id_usuario` = $id_usuario_session AND `fecha_1` = '$fechaActual'ORDER BY fecha_1 asc;";
                                }
                            }                                                                

                            // 3. Ejecutar la query
                            $sql_tarea_ej = mysqli_query(
                                $conexion, $sql_tarea
                            );
                            
                            $cant_tareas_hoy = mysqli_num_rows ( $sql_tarea_ej );

                            if($cant_tareas_hoy == 0){
                                echo "<div class='row'>";
                                echo "    <div class='col-12 text-user-list'>";
                                echo "        <h1>No tienes ninguna tarea para entregar hoy</h1>";
                                echo "    </div>";
                                echo "</div>";
                            } 


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
                                echo "<a href='tareas.php' class='row sinNada cont-tarea tarea-back ver-tarea' id='$id_tarea'>";
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

                            echo "<div class='col-xl-1'></div>";

                            }
                            ?>
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