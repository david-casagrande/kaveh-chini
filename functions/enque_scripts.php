<?php
  function register_scripts() {
    $template_dir = get_template_directory_uri();
    $js_file = (defined('PRODUCTION') && constant('PRODUCTION')) ? '/javascript/dist/kaveh-chini.js' : '/javascript/kaveh-chini.js';

    wp_register_script('kaveh_chini', $template_dir.$js_file, [], '0.0.1', true);
    wp_enqueue_script('kaveh_chini');
  }

  add_action('wp_enqueue_scripts', 'register_scripts');
?>
