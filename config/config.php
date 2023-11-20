<?php

/**
 * Parametros para configuración
 * Autor: Marco Robles
 * Web: https://github.com/mroblesdev
 */

//Configuración del sistema
define("SITE_URL", "http://localhost/tienda_online");
define("KEY_TOKEN", "TU_TOKEN");
define("MONEDA", "$");

//Configuración para Paypal
define("CLIENT_ID", "TU_CLIENT_ID_PAYPAL");
define("CURRENCY", "MXN");

//Configuración para Mercado Pago
define("TOKEN_MP", "TEST-XXXXXXXXX");
define("PUBLIC_KEY_MP", "TEST-XXXXXXXXX");
define("LOCALE_MP", "es-MX");


//Datos para envio de correo electronico
define("MAIL_HOST", "mail.dominio.com");
define("MAIL_USER", "tu_correo@dominio.com");
define("MAIL_PASS", "tu_password");
define("MAIL_PORT", "tu_puerto");

session_start();

$num_cart = 0;
if (isset($_SESSION['carrito']['productos'])) {
    $num_cart = count($_SESSION['carrito']['productos']);
}
