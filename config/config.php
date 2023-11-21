<?php

//Configuración del sistema
define("SITE_URL", "http://localhost/joyeria_aurora");
define("KEY_TOKEN", "TU_TOKEN");
define("MONEDA", "$");


session_start();

$num_cart = 0;
if (isset($_SESSION['carrito']['productos'])) {
    $num_cart = count($_SESSION['carrito']['productos']);
}
