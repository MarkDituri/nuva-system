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
                        <h1><i class="fas fa-user-friends"></i> <b>Miembros</b></h1> 
                    </div>

                    <div class="col-12 sinNada cont-dat">

                         <div class="row sinNada sub-tit">
                            <h1>Ordenados por | A-Z</h1>
                        </div>

                        <div class="row sinNada cont-all-users">

                            <table class="table-datos">
                                <tr id="table-padre">
                                    <td class="table-foto">Foto</td>
                                    <td class="table-dato">Nombre</td>
                                    <td class="table-dato">Apellido</td>
                                    <td class="table-dato">Email</td>
                                    <td class="table-dato">Pais</td>
                                    <td class="table-dato">Area</td>
                                    <td class="table-dato">Cargo</td>
                                    <td class="table-dato">Fecha</td>
                                </tr>


                            <?php
                            $sql_users = "SELECT * FROM `usuarios` ORDER BY nombre ASC";

                            // 3. Ejecutar la query
                            $query_users = mysqli_query(
                                $conexion, $sql_users
                            );

                            $row_cnt = mysqli_num_rows($query_users);

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
                                } else if($sexo == "f"){
                                    $classSex = "sex-f";
                                }
                                
                            
                            

                        ?>
                            <tr>
                                <td class='table-foto' style='background: url(php/<?php echo $URL_imagen;?> ); background-size:cover;background-position:center'></td>
                                <td class="table-dato"><?php echo $nombre;?></td>
                                <td class="table-dato"><?php echo $apellido;?></td>
                                <td class="table-dato"><?php echo $email;?></td>
                                <td class="table-dato"><?php echo "$pais";?></td>
                                <td class="table-dato"><?php echo "$area";?></td>
                                <td class="table-dato"><?php echo "$cargo";?></td>
                                <td class="table-dato"><?php echo $fecha?></td>
                            </tr>
                       
                    <?php
                    }
                    ?>
                     </table>
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