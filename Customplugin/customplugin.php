<?php
/*
Plugin Name: Mi Plugin Personalizado
Description: Un plugin de ejemplo que muestra un mensaje personalizado en el pie de cada página.
Version: 1.0
Author: leonardoguillen
License: GPL2
*/

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Mostrar mensaje personalizado en el footer
function mostrar_mensaje_personalizado() {
    echo '<p style="text-align: center; color: #555; margin-top: 20px;">Este es un mensaje de mi plugin personalizado.</p>';
}

// Hook para agregar el contenido en el footer
add_action('wp_footer', 'mostrar_mensaje_personalizado');