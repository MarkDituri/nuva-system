


$( document ).ready(function(){


    /* MENU */
    /*$("ul.nav li.dropdown").hover(function() {
        $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeIn(500);
      }, function() {
        $(this).find(".dropdown-menu").stop(true, true).delay(200).fadeOut(500);
      });
        */
    $('#fotoDesc').change( function() {
    
        if(this.files[0].size > 512000) { // 512000 bytes = 500 Kb
            $(this).val('');
            $('#errores').css("color","red");
            $('#errores').html("El archivo supera el límite de peso permitido."); 
            return false;
        } 
        else { //ok
            var formato = (this.files[0].name).split('.').pop();
            if(formato.toLowerCase() == 'jpg' || formato.toLowerCase() == 'png' || formato.toLowerCase() == 'gif') {
                $('#errores').css("color","green");
                $('#errores').html("<i class='far fa-check-circle'></i> Imagen valida");
            } 
            else {
                $(this).val('');
                $("#errores").css("color","red");
                $('#errores').html("Formato no soportado");
                return false;
            }
        }
    });


    $("#pass-noVer").css("display","none");
    $("#pass-char-nover").css("display","none");

    $("#pass-ver").click(function(){
        $("#pass-ver").css("display","none");
        $("#pass-noVer").css("display","flex");
        $("#pass-char-ver").css("display","none");
        $("#pass-char-nover").css("display","inline");
    })
        
    $("#pass-noVer").click(function(){
        $("#pass-ver").css("display","flex");
        $("#pass-noVer").css("display","none");
        $("#pass-char-ver").css("display","inline");
        $("#pass-char-nover").css("display","none");
    })
  

    $("#btn-menu").css("display","none");
    $("#btn-menu-cerrar").css("display","none");
    
    (function($) {
        function mediaSize() { 
            if (window.matchMedia('(max-width: 992px)').matches) {

                $("nav").css("position","fixed");
                $("nav").css("width","100%");
                $("#btn-menu").css("display","flex");
                $(".cont-navDown").slideUp();

                $("#btn-menu").click(function(){
                    $("navbar").css("height","100px");
                    $(".cont-navDown").slideDown();
                    $("#btn-menu").css("display","none");
                    $("#btn-menu-cerrar").css("display","flex");
                   
                })

                $("#btn-menu-cerrar").click(function(){
                    $("navbar").css("height","100px");
                    $(".cont-navDown").slideUp();
                    $("#btn-menu").css("display","flex");
                    $("#btn-menu-cerrar").css("display","none");
                })

            } else {
                $("navbar").css("height","200px");
                $(".cont-navDown").slideDown();
                $("#btn-menu").css("display","none");
                $("#btn-menu-cerrar").css("display","none");
            }
        };
        
        /* Call the function */
    mediaSize();
    /* Attach the function to the resize event listener */
        window.addEventListener('resize', mediaSize, false);  
        
    })(jQuery);



    /*
        $(".btnConsulta").click(function(){
            $("#nombre").focus() 
        })*/
          var namePattern = "^[a-z A-Z]{4,30}$";
          var expr = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
           nombre = $("#nombre").val();
           apellido = $("#apellido").val();
           cargo = $("#cargo").val();
           localidad = $("#localidad").val();
           email = $("#email").val();
    
           $(".inputError").css("display","none");
           $("#mensaje1").css("display","none");
           $("#mensaje2").css("display","none");
           $("#mensaje3").css("display","none");
           $("#mensaje4").css("display","none");
           $("#mensaje5").css("display","none");
           $("#mensaje6").css("display","none");
           $("#mensaje7").css("display","none");
           $("#mensaje8").css("display","none");
           $("#mensaje9").css("display","none");
    
      
      
          // Campos de texto
          /*
          $("#enviar").click(function() {
          if($("#nombre").val() == "" || $("#nombre").val().length<6){
              $("#mensaje1").fadeIn();
              return false;
          } else if($("#apellido").val() == ""){
              $("#mensaje1").fadeOut();
              $("#mensaje2").fadeIn();
              return false;
          } else if ($("#email").val() == "" || !expr.test($("#email").val())){
              $("#mensaje2").fadeOut();
              $("#mensaje3").fadeIn();
              return false;
          } else if($("#telefono").val() == "" || $("#telefono").val().length<8){
              $("#mensaje3").fadeOut();
              $("#mensaje4").fadeIn();
              return false;
          } else if ($("#localidad").val() == "" || $("#localidad").val().length<8){
              $("#mensaje4").fadeOut();
              $("#mensaje5").fadeIn();
              return false;
          } */
    
                
          $("#btn-enviar").click(function() {
            if($("#nombre").val() == "" || $("#nombre").val().length<3){
                    $("#nombre, #email, #clave, #localidad, #direccion, #numero, #fecha, #sexo").removeClass("input-error");
                    $("#mensaje2").css("display","none");
                    $("#mensaje3").css("display","none");
                    $("#mensaje4").css("display","none");
                    $("#mensaje5").css("display","none");
                    $("#mensaje6").css("display","none");
                    $("#mensaje7").css("display","none");
                    $("#mensaje8").css("display","none");
                    $("#mensaje9").css("display","none");

                    $("#nombre").addClass("input-error");
                    $(".inputError").css("display","flex");

                    $("#mensaje1").css("display","block");
                    $("#nombre").focus();
                return false;
            } else if($("#apellido").val() == ""){
                    $("#mensaje1").css("display","none");
                    $("#nombre, #email, #clave, #localidad, #direccion, #numero, #fecha, #sexo").removeClass("input-error");
                    $("#mensaje3").css("display","none");
                    $("#mensaje4").css("display","none");
                    $("#mensaje5").css("display","none");
                    $("#mensaje6").css("display","none");
                    $("#mensaje7").css("display","none");
                    $("#mensaje8").css("display","none");
                    $("#mensaje9").css("display","none");


                    $("#apellido").addClass("input-error");
                    $(".inputError").css("display","flex");

                    $("#mensaje2").css("display","block");
                    $("#apellido").focus();
                return false;
            } /*else if ($("#email").val() == "" || !expr.test($("#email").val())){
                    $("#nombre, #apellido, #clave, #localidad, #direccion, #numero, #fecha, #sexo").removeClass("inputError");
                    $("#mensaje1").css("display","none");
                    $("#mensaje2").css("display","none");
                    $("#mensaje4").css("display","none");
                    $("#mensaje5").css("display","none");
                    $("#mensaje6").css("display","none");
                    $("#mensaje7").css("display","none");
                    $("#mensaje8").css("display","none");
                    $("#mensaje9").css("display","none");

                    $("#email").addClass("inputError");
                    $("#mensaje3").css("display","block");
                    $("#email").focus();
                return false;
                } else if ($("#clave").val() ==  ""){
                    $("#nombre, #apellido, #email, #localidad, #direccion, #numero, #fecha, #sexo").removeClass("inputError");
                    $("#mensaje1").css("display","none");
                    $("#mensaje2").css("display","none");
                    $("#mensaje3").css("display","none");
                    $("#mensaje5").css("display","none");
                    $("#mensaje6").css("display","none");
                    $("#mensaje7").css("display","none");
                    $("#mensaje8").css("display","none");
                    $("#mensaje9").css("display","none");

                    $("#clave").addClass("inputError");
                    $("#mensaje4").css("display","block");
                    $("#email").focus();
                return false;
            }else if ($("#localidad").val() == "" ){
                    $("#nombre, #apellido, #email, #clave, #direccion, #numero, #fecha, #sexo").removeClass("inputError");
                    $("#mensaje1").css("display","none");
                    $("#mensaje2").css("display","none");
                    $("#mensaje3").css("display","none");
                    $("#mensaje4").css("display","none");
                    $("#mensaje6").css("display","none");
                    $("#mensaje7").css("display","none");
                    $("#mensaje8").css("display","none");
                    $("#mensaje9").css("display","none");

                    $("#localidad").addClass("inputError");
                    $("#mensaje5").css("display","block");
                    $("#localidad").focus();
                return false;
            } else if($("#direccion").val() == ""){
                    $("#nombre, #apellido, #email, #clave, #localidad, #numero, #fecha, #sexo").removeClass("inputError");
                    $("#mensaje1").css("display","none");
                    $("#mensaje2").css("display","none");
                    $("#mensaje3").css("display","none");
                    $("#mensaje4").css("display","none");
                    $("#mensaje5").css("display","none");
                    $("#mensaje7").css("display","none");
                    $("#mensaje8").css("display","none");
                    $("#mensaje9").css("display","none");

                    $("#direccion").addClass("inputError");
                    $("#mensaje6").css("display","block");
                    $("#fecha").focus();
                return false;
                }
                else if($("#numero").val() == "" ){
                    $("#nombre, #apellido, #email, #clave, #localidad, #direccion,  #fecha, #sexo").removeClass("inputError");
                    $("#mensaje1").css("display","none");
                    $("#mensaje2").css("display","none");
                    $("#mensaje3").css("display","none");
                    $("#mensaje4").css("display","none");
                    $("#mensaje5").css("display","none");
                    $("#mensaje6").css("display","none");
                    $("#mensaje8").css("display","none");
                    $("#mensaje9").css("display","none");

                    $("#numero").addClass("inputError");
                    $("#mensaje7").css("display","block");
                    $("#numero").focus();
                return false;
                }
                else if($("#fecha").val() == ""){
                    $("#nombre, #apellido, #email, #clave, #localidad,  #numero, #sexo").removeClass("inputError");
                    $("#mensaje1").css("display","none");
                    $("#mensaje2").css("display","none");
                    $("#mensaje3").css("display","none");
                    $("#mensaje4").css("display","none");
                    $("#mensaje5").css("display","none");
                    $("#mensaje6").css("display","none");
                    $("#mensaje7").css("display","none");
                    $("#mensaje9").css("display","none");

                    $("#fecha").addClass("inputError");
                    $("#mensaje8").css("display","block");
                    $("#fecha").focus();
                return false;
                }*/
           

    });

    // Crear usuario

    $("#btn-guardar").click(function() {
        if($("#email").val() == "" || !expr.test($("#email").val())){
            alert("Email");
            $("#email, #clave, #nombre, #apellido, #fecha, #sexo, #area, #superior, #cargo, #interno, #fecha_ing").removeClass("input-error");
            $("#mensaje2").css("display","none");
            $("#mensaje3").css("display","none");
            $("#mensaje4").css("display","none");
            $("#mensaje5").css("display","none");
            $("#mensaje6").css("display","none");
            $("#mensaje7").css("display","none");
            $("#mensaje8").css("display","none");
            $("#mensaje9").css("display","none");

            $("#email").addClass("input-error");
            $(".inputError").css("display","flex");

            $("#mensaje1").css("display","block");
            $("#email").focus();
             return false;
        }
        else if($("#clave").val() == "" || $("#clave").val().length<4){
            
            $("#email, #nombre, #apellido, #fecha, #sexo, #area, #cargo, #superior, #interno, #fecha_ing").removeClass("input-error");
            $("#mensaje2").css("display","none");
            $("#mensaje3").css("display","none");
            $("#mensaje4").css("display","none");
            $("#mensaje5").css("display","none");
            $("#mensaje6").css("display","none");
            $("#mensaje7").css("display","none");
            $("#mensaje8").css("display","none");
            $("#mensaje9").css("display","none");

            $("#clave").addClass("input-error");
            $(".inputError").css("display","flex");

            $("#mensaje1").css("display","block");
            $("#clave").focus();
             return false;
        }
        else if($("#nombre").val() == "" || $("#nombre").val().length<3){
            $("#email, #clave, #apellido, #fecha, #sexo, #area, #cargo, #superior, #interno, #fecha_ing").removeClass("input-error");
            $("#mensaje2").css("display","none");
            $("#mensaje3").css("display","none");
            $("#mensaje4").css("display","none");
            $("#mensaje5").css("display","none");
            $("#mensaje6").css("display","none");
            $("#mensaje7").css("display","none");
            $("#mensaje8").css("display","none");
            $("#mensaje9").css("display","none");

            $("#nombre").addClass("input-error");
            $(".inputError").css("display","flex");

            $("#mensaje1").css("display","block");
            $("#nombre").focus();
            return false;

        } else if($("#apellido").val() == ""){
                $("#mensaje1").css("display","none");
                $("#email, #clave, #nombre, #fecha, #sexo, #area, #cargo, #superior, #interno, #fecha_ing").removeClass("input-error");
                $("#mensaje3").css("display","none");
                $("#mensaje4").css("display","none");
                $("#mensaje5").css("display","none");
                $("#mensaje6").css("display","none");
                $("#mensaje7").css("display","none");
                $("#mensaje8").css("display","none");
                $("#mensaje9").css("display","none");


                $("#apellido").addClass("input-error");
                $(".inputError").css("display","flex");

                $("#mensaje2").css("display","block");
                $("#apellido").focus();
            return false;
        } 
        
        else if($("#fecha").val() == "" ){            
            $("#email, #clave, #nombre, #apellido, #sexo, #area, #cargo, #superior, #interno, #fecha_ing").removeClass("input-error");
            $("#mensaje2").css("display","none");
            $("#mensaje3").css("display","none");
            $("#mensaje4").css("display","none");
            $("#mensaje5").css("display","none");
            $("#mensaje6").css("display","none");
            $("#mensaje7").css("display","none");
            $("#mensaje8").css("display","none");
            $("#mensaje9").css("display","none");

            $("#fecha").addClass("input-error");
            $(".inputError").css("display","flex");

            $("#mensaje1").css("display","block");
            $("#fecha").focus();
             return false;
        }

        else if($("#sexo").val() == "n/a" ){            
            $("#email, #clave, #nombre, #apellido, #fecha, #area, #cargo, #superior, #interno, #fecha_ing").removeClass("input-error");
            $("#mensaje2").css("display","none");
            $("#mensaje3").css("display","none");
            $("#mensaje4").css("display","none");
            $("#mensaje5").css("display","none");
            $("#mensaje6").css("display","none");
            $("#mensaje7").css("display","none");
            $("#mensaje8").css("display","none");
            $("#mensaje9").css("display","none");

            $("#sexo").addClass("input-error");
            $(".inputError").css("display","flex");

            $("#mensaje1").css("display","block");
            $("#sexo").focus();
             return false;
        }

        else if($("#area").val() == "n/a" ){   
            $("#email, #clave, #nombre, #apellido, #fecha, #sexo, #cargo, #superior, #interno, #fecha_ing").removeClass("input-error");
            $("#mensaje2").css("display","none");
            $("#mensaje3").css("display","none");
            $("#mensaje4").css("display","none");
            $("#mensaje5").css("display","none");
            $("#mensaje6").css("display","none");
            $("#mensaje7").css("display","none");
            $("#mensaje8").css("display","none");
            $("#mensaje9").css("display","none");

            $("#area").addClass("input-error");
            $(".inputError").css("display","flex");

            $("#mensaje1").css("display","block");
            $("#area").focus();
             return false;
        }
        else if($("#cargo").val() == "" ){
            $("#email, #clave, #nombre, #apellido, #fecha, #sexo, #area, #superior, #interno, #fecha_ing").removeClass("input-error");
            $("#mensaje2").css("display","none");
            $("#mensaje3").css("display","none");
            $("#mensaje4").css("display","none");
            $("#mensaje5").css("display","none");
            $("#mensaje6").css("display","none");
            $("#mensaje7").css("display","none");
            $("#mensaje8").css("display","none");
            $("#mensaje9").css("display","none");

            $("#cargo").addClass("input-error");
            $(".inputError").css("display","flex");

            $("#mensaje1").css("display","block");
            $("#cargo").focus();
             return false;
        }
        else if($("#superior").val() == "n/a" ){     
            $("#email, #clave, #nombre, #apellido, #fecha, #sexo, #area, #cargo, #interno, #fecha_ing").removeClass("input-error");
            $("#mensaje2").css("display","none");
            $("#mensaje3").css("display","none");
            $("#mensaje4").css("display","none");
            $("#mensaje5").css("display","none");
            $("#mensaje6").css("display","none");
            $("#mensaje7").css("display","none");
            $("#mensaje8").css("display","none");
            $("#mensaje9").css("display","none");

            $("#superior").addClass("input-error");
            $(".inputError").css("display","flex");

            $("#mensaje1").css("display","block");
            $("#superior").focus();
             return false;
        }    

        else if($("#interno").val() == "" ){

            $("#email, #clave, #nombre, #apellido, #fecha, #sexo, #area, #cargo, #superior, #fecha_ing").removeClass("input-error");
            $("#mensaje2").css("display","none");
            $("#mensaje3").css("display","none");
            $("#mensaje4").css("display","none");
            $("#mensaje5").css("display","none");
            $("#mensaje6").css("display","none");
            $("#mensaje7").css("display","none");
            $("#mensaje8").css("display","none");
            $("#mensaje9").css("display","none");

            $("#interno").addClass("input-error");
            $(".inputError").css("display","flex");

            $("#mensaje1").css("display","block");
            $("#interno").focus();
             return false;
        }    
        
        else if($("#fecha_ing").val() == "" ){

            $("#email, #clave, #nombre, #apellido, #fecha, #sexo, #area, #cargo, #superior, #interno").removeClass("input-error");
            $("#mensaje2").css("display","none");
            $("#mensaje3").css("display","none");
            $("#mensaje4").css("display","none");
            $("#mensaje5").css("display","none");
            $("#mensaje6").css("display","none");
            $("#mensaje7").css("display","none");
            $("#mensaje8").css("display","none");
            $("#mensaje9").css("display","none");

            $("#fecha_ing").addClass("input-error");
            $(".inputError").css("display","flex");

            $("#mensaje1").css("display","block");
            $("#fecha_ing").focus();
             return false;
        }    

    });

    $("#btn-guardar-tarea").click(function(){
        if($("#titulo").val() == "" || $("#titulo").val() == " " ){     
            alert("Compeltar Titulo");
            return false;
        }
        else if($("#responsable").val() == "" || $("#responsable").val() == "0"){
            alert("Elegir responsable");
            return false;
        }
        else if($("#fecha_1").val() == "" || $("#fecha_1").val() == null){
            alert("Debe elegir al menos una fecha para su tarea");
            return false;
        }

    })
    
    $("#editar-datos").click(function(){
        $("#cont-datos").css("display","none");
        $("#cont-datos-edit").css("display","block");
    })

    $("#editar-datos-cancelar").click(function(){
        $("#cont-datos-edit").css("display","none");
        $("#cont-datos").css("display","block");
    })
   
    $("#btn-pop-cupon").click(function(){
        $(".pop-cont").fadeOut();
    });
});