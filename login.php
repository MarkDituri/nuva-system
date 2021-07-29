<?php
/*
    include("php/conexion.php");
    include("php/sesion.php");*/
    include("componentes/head.php");
?>   
<body>

<?php

   /* include("componentes/menu.php");*/
?>   

    <div class="container-fluid">
        <div class="row" id="cont-login">
            <div class="col-xl-4 col-lg-5 col-md-5 col-12" id="cont-form-img">
            </div>
            
            <form onsubmit="return false" class="col-xl-4 col-lg-5 col-md-5 col-12" id="cont-form-login">
                <div>
                    <img src="img/logo.png" alt="">
                    <p>IntraNet</p>
                </div>

                <div class="cont-form-login">
                    <div class="" id="resultado"></div>
                    <input type="text" name="email" id="email" placeholder="Correo electronico">
                    <input type="password" name="clave" id="clave" placeholder="Password">                  
                
                </div>
                <button onclick="Validar(document.getElementById('email').value, document.getElementById('clave').value);" id="enviar" class="btn-entrar">Entrar</button>
            </div>
        </form>
        <script>
           
            function Validar(email, clave)
            {
                $.ajax({
                    url: "php/validar_sesion.php",
                    type: "POST",
                    data: "email="+email+"&clave="+clave,
                    success: function(resp){
                    $('#resultado').html(resp)
                    }       
                });
            }
        </script>


    </div>

    <script src="js/jquery-3.3.1.slim.min.js" ></script>
    <script src="js/popper.min.js" ></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>