<?php 

require_once("custom/php/common.php");
$base = ligacao();
    //ligação com a base de dados
    if (!mysqli_select_db($base, "bitnami_wordpress")) {//se não é possível ligar à base de dados
        die("Connection failed: " . mysqli_connect_error());
    } else {
        //
    }
?>