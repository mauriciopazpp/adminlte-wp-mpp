<?php

/*
Plugin Name: AdminLTE Theme MPP
Plugin URI: 
Description: AdminLTE 2 Theme Wordpress adaptation (https://almsaeedstudio.com/themes/AdminLTE/index2.html)
Author: Mauricio Paz Pacheco
Version: 1.0
Author URI: https://github.com/mauriciopazpp
*/

/**
 * Scripts and styles
 * @return VOID
 */
function adminlteMppScripts() 
{
    wp_enqueue_style('admin-lte-mpp', plugins_url('adminlte.css', __FILE__));
    wp_enqueue_script('admin-lte-mpp', plugins_url('adminlte.js', __FILE__));
}

/**
 * Echo the footer description
 * @return VOID
 */
function adminlteMppFooter() 
{
   echo '<p id="created_by">Tema criado por <a href="http://example.com">Mauricio Paz Pacheco</a>.</p>';
}

/**
 * Show details of user
 * @return VOID
 */
function user_details()
{
    $current_user = wp_get_current_user();

    add_menu_page('', 
                  '<img class="img-round" width="45" src="'.get_avatar_url($current_user->user_email).'"> <span class="auth-name">' . $current_user->user_firstname . '</span>', 
                  'manage_options', 
                  'profile.php', 
                  null,
                  '',
                  0 );
}

add_action('admin_enqueue_scripts', 'adminlteMppScripts');
add_action('login_enqueue_scripts', 'adminlteMppScripts');
add_action('admin_footer', 'adminlteMppFooter');
add_action('admin_menu', 'user_details');
