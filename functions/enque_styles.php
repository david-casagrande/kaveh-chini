<?php
  function register_styles() {
    $template_dir = get_template_directory_uri();
    $css_file = (defined('PRODUCTION') && constant('PRODUCTION')) ? '/css/kaveh-chini.min.css' : '/css/kaveh-chini.css';

    // wp_register_style('google_font', 'http://fonts.googleapis.com/css?family=Roboto+Slab:300,700,100,400');
    // wp_enqueue_style('google_font');
    wp_register_style('kaveh_chini', $template_dir.$css_file);
    wp_enqueue_style('kaveh_chini');
  }

  add_action('wp_enqueue_scripts', 'register_styles');
?>
