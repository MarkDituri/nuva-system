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
                        }
                        ?>
                    </div>

                    <div class="col-12 sinNada cont-dat">

                        <div class="row sinNada sub-tit" id="dobletit">
                            <div class="col-4 sinNada">
                                <h1>Tareas Finalizadas</h1>
                            </div>
                            <div class="col-1 sinNada">
                                <a class="btn-col" href="">Ver Todos</a>
                            </div>
                            <div class="col-1 sinNada">
                            </div>
                            <div class="col-6 sinNada">
                                <h1>Filtrar</h1>
                            </div>
                        </div>

                        <div class="row sinNada cont-all-users">
                            <div class="col-5 sinNada">
                            <?php
                            $sql_cumple = "SELECT * FROM `usuarios` WHERE MONTH(fecha) = $fechaHoy ORDER BY nombre ASC";

                            // 3. Ejecutar la query
                            $query_cumple = mysqli_query(
                                $conexion, $sql_cumple
                            );

                            $row_cnt = mysqli_num_rows($query_cumple);

                            while($dato = mysqli_fetch_array($query_cumple)) {
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
                                $cumple = date("d", strtotime($fecha)); 
                                $edad = $year_act - $year;

                                if($sexo == "m"){
                                    $classSex = "sex-mc";
                                } else if($sexo == "f"){
                                    $classSex = "sex-fc";
                                }
                                


                            echo "<a href='perfil.php?id_miembro=$id_usuario' class='col-xl-5 cont-users'>";
                            echo    "<div class='foto-user-list' style='background: url(php/$URL_imagen); background-size:cover;background-position:center'>";
                            echo    "</div>";
                            echo    "<div class='text-user-list' id='text-cn-c'>";
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
                            echo    "<div class='$classSex'>";
                            echo    "<h2>$cumple</h2>";
                            echo    "</div>";
                            
                            echo "</a>";

                            echo "<div class='col-xl-1'></div>";

                            }

                        ?>
                            </div>
                        </div>

                         <div class="row sinNada sub-tit">
                            <h1>Ordenados por | A-Z</h1>
                        </div>

                        <div class="row sinNada cont-all-users">

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