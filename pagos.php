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
                        <h1><a href="miembros.php"><i class="fas fa-credit-card"></i> <b>Pagos</b></a> - Nueva pago</h1> <a class="btn-panel" href="tareas.php"><i class="i-bla fas fa-times-circle"></i> Cerrar</a>
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
                            <h1>Nuevo pago</h1>
                        </div>

                        <form autocomplete="off" action="php/pago-nueva.php"  method="POST">
                            <div class="row sinNada cont-reg-pass-cl">
                                <h4>Titulo:*</h4>
                                <input autocomplete="false" type="text" name="titulo_p" id="titulo_p" class="col-6 input2 b-all"></input>
                            </div>
                            <div class="row sinNada cont-reg-pass-cl">
                                <h4>Detalles:</h4>
                                <textarea name="detalle_p" id="detalle_p"  rows="3" class="col-6 input2 b-all"></textarea>      
                            </div>   
                            <div class="row sinNada cont-reg-pass-cl">
                                <h4>Asignar a:*</h4>
                                <select name="asignado_p" id="asignado_p" class="col-6 input2 b-all">
                                    <option value="0">Elegir cuenta</option>
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
                                <h4>Fecha de pago:*</h4>
                                <input class="col-6 input2 b-all" type="date" name="fecha_pago" id="fecha_pago" value="">
                                <br>
                            </div>  

                            <div class="row sinNada cont-reg-pass-cl">
                                <h4>Monto $</h4>
                                <input class="col-6 input2 b-all" type="number" name="monto_p" id="monto_p" value="">
                                <br>
                            </div>          
                                      
                            <input id="btn-guardar-pago" class="btn-panel ultimo" type="submit" value="Guardar pago">
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