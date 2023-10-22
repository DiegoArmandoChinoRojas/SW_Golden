<?php
if(!empty($_POST["btnRegistrar"])){
    if(empty($_POST["txtid_pro"]) and empty($_POST["txtdesc_pro"]) and empty($_POST["txtcant_pro"]) and empty($_POST["txtcolor_pro"]) and empty($_POST["txtestilo_pro"]) and empty($_POST["txtprecio_pro"])){
        echo "<p>Debe completar los campos</p>";
    }else{
        $id_pro=($_POST["txtid_pro"]);
        $desc_pro=$_POST["txtdesc_pro"];
        $cant_pro=($_POST["txtcant_pro"]);
        $color_pro=$_POST["txtcolor_pro"];
        $estilo_pro=$_POST["txtestilo_pro"];
        $prec_pro=($_POST["txtprecio_pro"]);
        $sql="INSERT INTO producto (id_producto, descripcion_pro, cantidad_pro, color_pro, estilo_pro, precio_pro) VALUES ('$id_pro','$desc_pro','$cant_pro','$color_pro','$estilo_pro','$prec_pro')";
        if($conexion->query($sql)===true){
            echo "<p>datos registrados<p>";
       }
       }
       }
if(!empty($_POST["btnBuscar"])){
    if(empty($_POST["txtid_pro"])){
        
    }
}
?>