<?php
    $id_tarea = $_GET["id_tarea"];


    include("conexion.php");
    include("sesion.php");
    
    $sql_tarea = "SELECT * FROM `tareas` WHERE `id_tarea` = $id_tarea;";

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
        $fecha_1_i = $dato['fecha_1'];
        $fecha_2_i = $dato['fecha_2'];
        $email_noti_1 = $dato['email_noti_1'];
        $email_noti_2 = $dato['email_noti_2'];  

        if($email_noti_1 == "0"){  
            $email_noti_1 = "";
        } else {$email_noti_1 = $email_noti_1;}
        if($email_noti_2 == "0"){
            $email_noti_2 = "";
        } else {$email_noti_2 = $email_noti_2;}
    
        $fecha_2 = strtotime($fecha_2_i);
        $fecha_2_show = date("d-m-Y", $fecha_2);

        $fecha_1 = strtotime($fecha_1_i);
        $fecha_1_show = date("d-m-Y", $fecha_1);

        echo "<div class='row sinNada text-user-list cont-tarea'>";
        echo "    <div class='sinNada col-12'>";
        echo "        <h1>$titulo</h1>";
        echo "    </div>";
        echo "    <div class='sinNada col-12'>";
        echo "        <h2>$detalle</h2><br>";
        echo "    </div>";
        echo "    <div class='sinNada col-12'>";
        echo "        <h1>Links</h1>";
        if($link_1 == ""){
            echo "";
        } else{
            echo "<a href='$link_1' target='_blank'>$link_1</a><br>";
        }
        if($link_2 == ""){
            echo "";
        } else{
            echo "<a href='$link_2' target='_blank'>$link_2</a><br>";
        }
        if($link_3 == ""){
            echo "";
        } else{
            echo "<a href='$link_3' target='_blank'>$link_3</a><br>";
        } if($link_1 == "" && $link_2 == "" && $link_3 == ""){
            echo "Esta tarea no tiene links adjuntos<br>";
        }
        echo "<br>";
        echo "    </div>";
        echo "    <div class='sinNada col-12'>";
        echo "        <h1>Responsable</h1>";
        $sql_responsable = "SELECT * FROM `usuarios` WHERE `id_usuario` = $id_responsable;";
        $sql_responsable_ej = mysqli_query(
            $conexion, $sql_responsable
        );                                            
        while($dato = mysqli_fetch_array($sql_responsable_ej)) {
            $id_usuario = $dato['id_usuario'];
            $nombre = $dato['nombre'];
            $apellido = $dato['apellido'];
            $cargo = $dato['cargo'];
            $img_user = $dato['URL_imagen'];         
            echo "        <a href='perfil.php?id_miembro=$id_usuario'><div class='cont-respon'><div class='resp-img' style='background: url(php/$img_user)no-repeat; background-size: cover; background-position:center'></div><h2>$nombre $apellido</h2></div></a><br>";
        }

        if($acceso == "master"){
            echo "    <div class='sinNada col-6'>";
            echo "        <h1>Notificaciones a:</h1>";
            if($email_noti_1 == "" && $email_noti_2 == ""){
                echo "        <h2>N/A</h2><br>";
            } else {
                echo "        <h2>$email_noti_1,<br>$email_noti_2</h2><br>";
            }
            echo "    </div>";
        }
        echo "    </div>";
        echo "    <div class='sinNada col-6'>";
        echo "        <h1>Fecha Entrega</h1>";
        echo "        <h2>$fecha_1_show</h2><br>";
        echo "    </div>";
        
        echo "    <div class='sinNada col-6'>"; 
        echo "    </div>";
        ?>
        <div class="col-12 sinNada cont-accion-tarea">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle estado-tarea" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                        $sql_estado_tarea_select = "SELECT * FROM `estados_tareas` WHERE `id_estado_tarea` = $id_estado;";
                        $sql_estado_tarea_select_ej = mysqli_query(
                            $conexion, $sql_estado_tarea_select
                        );                                            
                        while($dato = mysqli_fetch_array($sql_estado_tarea_select_ej)) {
                            $nombre_estado = $dato['nombre'];
                            $icono_estado = $dato['icono'];

                            echo "$icono_estado $nombre_estado <i class='fas fa-chevron-down'></i>";
                        }
                    ?>                         
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php
                        $sql_estado_tarea = "SELECT * FROM estados_tareas;";
                        $sql_estado_tarea_ej = mysqli_query(
                            $conexion, $sql_estado_tarea
                        );        
                                                            
                        while($dato = mysqli_fetch_array($sql_estado_tarea_ej)) {
                            $id_estado_tarea = $dato['id_estado_tarea'];
                            $nombre_estado = $dato['nombre'];
                            $icono_estado = $dato['icono'];

                            echo " <a class='dropdown-item' href='php/actualizar_tarea.php?id_tarea=$id_tarea&id_estado_tarea=$id_estado_tarea'>$icono_estado $nombre_estado</a>";
                        }
                    ?>                                                                                                           
                </div>
            </div>
            <?php
            if($acceso == "master"){
            ?>
            <a class="btn-borrar" href="php/borrar_tarea.php?id_tarea=<?php echo $id_tarea;?>"><i style="padding-right: 7px" class="fas fa-trash-alt"></i> Eliminar</a>
            <?php }
            else {
                echo "<div></div>";
            }?>

        </div>

        <?php
        echo "</div>";
        
    echo "<div class='col-xl-1'></div>";


    }
?>