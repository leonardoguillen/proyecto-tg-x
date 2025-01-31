<?php
/*
Plugin Name: Mi Módulo Personalizado
Description: Un módulo personalizado para WordPress.
Version: 1.0
Author: Tu Nombre
*/

function saludo_personalizado() {
    echo '<p style="text-align: center;">¡Hola desde mi módulo personalizado!</p>';
}
add_action('wp_footer', 'saludo_personalizado');