<?php
  function register_scripts() {
    $template_dir = get_template_directory_uri();
    $js_file = (defined('PRODUCTION') && constant('PRODUCTION')) ? '/javascript/dist/kaveh-chini.js' : '/javascript/kaveh-chini.js';
    $isotope = '/bower_components/isotope/dist/isotope.pkgd.js';
    $imagesLoaded = '/bower_components/imagesloaded/imagesloaded.js';

    wp_register_script('kaveh_chini', $template_dir.$js_file, ['isotope', 'images_loaded'], '0.0.1', true);
    wp_enqueue_script('kaveh_chini');

    wp_register_script('isotope', $template_dir.$isotope, [], '0.0.1', true);
    wp_enqueue_script('isotope');

    wp_register_script('images_loaded', $template_dir.$imagesLoaded, [], '0.0.1', true);
    wp_enqueue_script('images_loaded');
  }

  add_action('wp_enqueue_scripts', 'register_scripts');
?>
