<?php
  function register_scripts() {
    $template_dir = get_template_directory_uri();
    $js_file = (defined('PRODUCTION') && constant('PRODUCTION')) ? '/javascript/dist/sill-life.js' : '/javascript/sill-life.js';

    wp_register_script('sill_life', $template_dir.$js_file, [], '0.0.1', true);
    wp_enqueue_script('sill_life');
  }

  //add_action('wp_enqueue_scripts', 'register_scripts');
?>
