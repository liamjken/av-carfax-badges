<?php

add_action('admin_menu', 'av_cf_create_menu');


function av_cf_create_menu() {

    //create new top-level menu
    add_menu_page('AV CF Plugin Settings', 'Carfax Integration', 'administrator', __FILE__, 'av_cf_settings_page' , plugins_url('/img/av-icon.png', __DIR__), );
  
  
    //call register settings function
    add_action( 'admin_init', 'register_av_cf_settings' );
  }

  function register_av_cf_settings() {
    //register our settings
    register_setting( 'av-cf-settings-group', 'client_id' );
    register_setting( 'av-cf-settings-group', 'client_secret' );
  }
  

  //content within the av Settings tab
function av_cf_settings_page() {

    ob_start();
    ?> 
  
  <div class="wrap">
  <h1>av Settings</h1>
  
  <form method="post" action="options.php">
    <?php settings_fields( 'av-cf-settings-group' ); ?>
    <?php do_settings_sections( 'av-cf-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Client ID:</th>
        <td><input type="text" name="client_id" value="<?php echo esc_attr( get_option('client_id') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Client Secret</th>
        <td><input type="text" name="client_secret" value="<?php echo esc_attr( get_option('client_secret') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>
  
  </form>
  </div>
   <?php
    echo ob_get_clean();
  }