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

function mi_plugin_personalizado_estilos()
{
    wp_enqueue_style(
        'mi-plugin-estilos',
        plugins_url('assets/css/custom.css', __FILE__)
    );
}
add_action('wp_enqueue_scripts', 'mi_plugin_personalizado_estilos');

function mi_plugin_agregar_menu()
{
    add_menu_page(
        'Configuración Instagram Feed', // Título de la página en la parte de arriba
        'Instagram Feed',               // Título del menú
        'manage_options',               // Permiso
        'mi_plugin_config',             // Slug
        'mi_plugin_configuracion_html', // Función que mostrará el contenido
        'dashicons-instagram',          // Icono del menú
        81                              // Posición en el menú
    );
}

add_action('admin_menu', 'mi_plugin_agregar_menu');

function mi_plugin_configuracion_html()
{
    if (isset($_POST['submit'])) {
        update_option('value1', sanitize_text_field($_POST['value1']));
        update_option('value2', sanitize_text_field($_POST['value2']));
        echo '<div class="updated"><p>Configuración guardada.</p></div>';
    }

    $value1 = get_option('value1', '');
    $value2 = get_option('value2', '');

   

?>

    <div class="wrap">
        <h1>Configuración Instagram Feed</h1>
        <form method="POST">
            <table class="form-table">
                <tr>
                    <th scope="row">Valor 1</th>
                    <td><input type="text" name="value1" value="<?php echo $value1; ?>" placeholder="Input1" /></td>
                </tr>
                <tr>
                    <th scope="row">Valor 2</th>
                    <td><input type="text" name="value2" value="<?php echo $value2; ?>" placeholder="Input 2" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>

<?php
}

function get_info_settings()
{
    $value1 = get_option('value1', '');
    $value2 = get_option('value2', '');
    $output = '<div class="instagram-feed">';
    $output .= '<h1>' . $value1 . '</h1>';
    $output .= '<h1>' . $value2 . '</h1>';

    
    $output .= '</div>';

    return $output;
}

add_shortcode('settings_plugin', 'get_info_settings');
