<?php
    $donde = "tareas";
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
                        <h1><a href="miembros.php"><i class="fas fa-user-friends"></i> <b>Tareas</b></a> - Nueva tarea</h1> <a class="btn-panel" href="tareas.php"><i class="i-bla fas fa-times-circle"></i> Cerrar</a>
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
                            <h1>Tarea</h1>
                        </div>

                        <form autocomplete="off" action="php/tarea-nueva.php"  method="POST">
                            <div class="row sinNada cont-reg-pass-cl">
                                <h4>Titulo:*</h4>
                                <input autocomplete="false" type="text" name="titulo" id="titulo" class="col-6 input2 b-all"></input>
                            </div>
                            <div class="row sinNada cont-reg-pass-cl">
                                <h4>Detalles:</h4>
                                <textarea name="detalle" id="detalle"  rows="5" class="col-6 input2 b-all"></textarea>      
                            </div>
                            <div class="row sinNada cont-reg-pass-cl">
                                <h4>Link 1:</h4>
                                <input autocomplete="false" type="text" name="link_1" id="link_1" class="col-6 input2 b-all"></input>
                                <h4>Link 2:</h4>
                                <input autocomplete="false" type="text" name="link_2" id="link_2" class="col-6 input2 b-all"></input>
                                <h4>Link 3:</h4>
                                <input autocomplete="false" type="text" name="link_3" id="link_3" class="col-6 input2 b-all"></input>
                            </div>       
                            <div class="row sinNada cont-reg-pass-cl">
                                <h4>Asignar a:*</h4>
                                <select name="responsable" id="responsable" class="col-6 input2 b-all">
                                    <option value="0">Elegir responsable</option>
                                    <?php                                        
                                        $lista_usuarios = "SELECT * FROM `usuarios`;";                                                                            
                                        $lista_usuarios_ej = mysqli_query($conexion, $lista_usuarios);

                                        if($lista_usuarios_ej == false){
                                            echo "No se encontraron miembros";
                                        }
                                        else {
                                            while($dato = mysqli_fetch_array($lista_usuarios_ej)) {
                                                $id_usuario = $dato['id_usuario'];
                                                $nombre = $dato['nombre'];
                                                $apellido = $dato['apellido'];    
                                                
                                                echo "<option value='$id_usuario'>$nombre $apellido</option>";
                                            }
                                        }
                                    ?>                     
                                    
                                </select>
                            </div>                     

                            <div class="row sinNada cont-reg-pass-cl">
                                <h4>Fecha 1:*</h4>
                                <input class="col-6 input2 b-all" type="date" name="fecha_1" id="fecha_1" value="">
                                <h4>Fecha 2:</h4>
                                <input class="col-6 input2 b-all" type="date" name="fecha_2" id="fecha_2" value="">
                                <h4>Fecha 3:</h4>
                                <input class="col-6 input2 b-all" type="date" name="fecha_3" id="fecha_3" value="">
                                <h4>Fecha 4:</h4>
                                <input class="col-6 input2 b-all" type="date" name="fecha_4" id="fecha_4" value="">
                                <br>
                            </div>                      

                            <div class="row sinNada cont-reg-pass-cl">
                                <h4><i class="far fa-bell"></i> Notificar a:</h4>
                                <select name="email_noti_1" id="email_noti_1" class="col-6 input2 b-all">
                                    <option value="0"> Elegir</option>
                                    <?php                                        
                                        $lista_usuarios = "SELECT * FROM `usuarios`;";                                                                            
                                        $lista_usuarios_ej = mysqli_query($conexion, $lista_usuarios);

                                        if($lista_usuarios_ej == false){
                                            echo "No se encontraron miembros";
                                        }
                                        else {
                                            while($dato = mysqli_fetch_array($lista_usuarios_ej)) {
                                                $id_usuario = $dato['id_usuario'];
                                                $nombre = $dato['nombre'];
                                                $apellido = $dato['apellido'];    
                                                $email = $dato['email'];    
                                                
                                                echo "<option value='$email'>$nombre $apellido ($email)</option>";
                                            }
                                        }
                                    ?>                     
                                    
                                </select>
                                <select name="email_noti_2" id="email_noti_2" class="col-6 input2 b-all">
                                    <option value="0"> Elegir</option>
                                    <?php                                        
                                        $lista_usuarios = "SELECT * FROM `usuarios`;";                                                                            
                                        $lista_usuarios_ej = mysqli_query($conexion, $lista_usuarios);

                                        if($lista_usuarios_ej == false){
                                            echo "No se encontraron miembros";
                                        }
                                        else {
                                            while($dato = mysqli_fetch_array($lista_usuarios_ej)) {
                                                $id_usuario = $dato['id_usuario'];
                                                $nombre = $dato['nombre'];
                                                $apellido = $dato['apellido'];    
                                                $email = $dato['email'];
                                                
                                                echo "<option value='$email'>$nombre $apellido ($email)</option>";
                                            }
                                        }
                                    ?>                     
                                    
                                </select><br>
                            </div>                     
                            <input id="btn-guardar-tarea" class="btn-panel ultimo"type="submit" name="" id="" value="Guardar tarea">
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