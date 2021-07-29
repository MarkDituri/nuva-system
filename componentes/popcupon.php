<?php $codigo = $_GET["codigo"];?>
<div class="col-12 sinNada pop-cont">
    <div class="row sinNada pop">
        <div>
            <h1><i class="fas fa-check-circle"></i> Genial!</h1>
            <h4 style="font-size: 20px;">El cupon fue generado con exito, el codigo es:</h4>
            <div style="margin-top:49px; margin-bottom: 49px;" class="cont-cod-pop">
                <h2><?php echo $codigo;?></h2>
            </div>
        </div>

 
        <button style="margin:auto;" id="btn-pop-cupon" class="btn-g">Continuar</button>

    </div>
</div>

