<?php
    $donde = "pagos";
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
                        <h1><a href="pagos.php"><i class="fas fa-credit-card"></i> <b>Pagos</b></a></h1> <a class="btn-panel" href="pago-nuevo.php"><i class="i-bla fas fa-plus"></i> Nuevo pago</a>
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
                            <h1>Lista de Pago</h1>
                        </div>
            
                        <div class="row sinNada">
                            <div class="col-10 cont-item-pago">
                                <?php 
                                    $sql_pagos = "SELECT * FROM pagos order by fecha_pago";
                                    $sql_pagos_ej = mysqli_query($conexion, $sql_pagos );

                                    while($dato = mysqli_fetch_array($sql_pagos_ej)) {
                                        $id_pago = $dato['id_pago'];
                                        $titulo = $dato{'titulo'};         
                                        $fecha_pago = $dato['fecha_pago'];
                                        $estado = $dato['estado'];
                                        $id_usuario = $dato['id_usuario'];

                                        if($estado == "Pago"){
                                            $classEstadoP = "drop-p-pago";
                                        } else if($estado == "Pendiente"){
                                            $classEstadoP = "drop-p-pen";
                                        } else if($estado == "Vencido"){
                                            $classEstadoP = "drop-p-ven";
                                        }

                                                     
                                        $fechaEntera = strtotime($fecha_pago);
                                        $anio = date("Y", $fechaEntera);
                                        $mes = date("m", $fechaEntera);
                                        $dia = date("d", $fechaEntera);
                                        
                                        $hora = date("H", $fechaEntera);
                                        $minutos = date("i", $fechaEntera);
                                        $segundos = date("s", $fechaEntera);

                                        echo "<div class='row bloque' id='pago-pen'>";
                                        echo "    <h3 class='col-5'>$titulo</h3>";
                                        echo "    <div class='col-2 cont-dat-blo'>";
                                        echo "        <h3><i class='far fa-calendar-alt'></i> $dia-$mes</h3>";
                                        echo "    </div>";
                                        echo "    <div class='col-2 cont-dat-blo cont-img-pag'>";
                                        $sql_usuario = "SELECT * FROM `usuarios` WHERE `id_usuario` = $id_usuario;";
                                        $sql_usuario_ej = mysqli_query(
                                            $conexion, $sql_usuario
                                        );     
                                        while($dato = mysqli_fetch_array($sql_usuario_ej)) {
                                            $nombre_res = $dato['nombre'];
                                            $apellido_res = $dato['apellido'];
                                            $cargo = $dato['cargo'];
                                            $img_user = $dato['URL_imagen'];       
                                            echo "        <div style='background: url(php/$img_user); background-size:cover; background-position: center;' class='img-res'></div>";  
                                            echo "        <h2>$nombre_res</h2>";
                                        } 
                                        echo "    </div>";
                                        echo "    <div class='col-2 cont-dat-blo'>";
                                        echo "        <div class='dropdown'>";
                                        echo "            <a class='$classEstadoP btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>";
                                        echo "                <i class='fas fa-check-circle'></i> $estado";
                                        echo "            </a>";
                                        echo "            <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>";
                                        echo "                <li><a class='dropdown-item' href='#'>Paga</a></li>";
                                        echo "                <li><a class='dropdown-item' href='#'>Another action</a></li>";
                                        echo "                <li><a class='dropdown-item' href='#'>Something else here</a></li>";
                                        echo "            </ul>";
                                        echo "        </div>";
                                        echo "    </div>";
                                        echo "</div>";                                     
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
    <!--<script src="js/bootstrap.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>