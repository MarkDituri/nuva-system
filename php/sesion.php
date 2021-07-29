<?php
	// agregar-pr.php
    /*Inicio sesion*/

    
    session_start();

    if(isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario'])) {
        $id_usuario = $_SESSION['id_usuario'];
        $id_usuario_session = $_SESSION['id_usuario'];


        $mostrar = "SELECT * FROM `usuarios` WHERE id_usuario=$id_usuario";


        // 3. Ejecutar la query
        $mostrar_ej = mysqli_query(
                    $conexion, $mostrar
                    );
    
        // 4. Verificar si funcionó
        if($mostrar_ej == true){
            while($dato = mysqli_fetch_array($mostrar_ej)) {

                $email = $dato["email"];
                $clave = $dato["clave"];
                $nombre = $dato["nombre"];
                $apellido = $dato["apellido"];
                $pais = $dato["pais"];
                $area = $dato["area"];
                $interno = $dato["interno"];
                $cargo = $dato["cargo"];
                $superior = $dato["superior"];

                $fecha = $dato["fecha"];
                $fecha_ing = $dato["fecha_ing"];
                $URL_imagen = $dato["URL_imagen"];
                
                $acceso = $dato["acceso"];
                $year_act = date("Y");
                $year = date("Y", strtotime($fecha)); 

                $edad = $year_act - $year;


            }

            $superior_id = "SELECT * FROM `usuarios` WHERE id_usuario=$superior";


            // 3. Ejecutar la query
            $superior_sql = mysqli_query(
                        $conexion, $superior_id
                        );
        
            // 4. Verificar si funcionó
            if($superior_sql == true){
                while($dato = mysqli_fetch_array($superior_sql)) {
                    $nombre_b = $dato["nombre"];
                    $apellido_b = $dato["apellido"];
                    }
                }
                $superior = "$nombre_b $apellido_b";
        }
    } else{
        echo '<script>location.href = "login.php"</script>';

    }
?>

