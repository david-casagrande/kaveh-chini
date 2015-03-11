<?php
  $template_directory = get_template_directory();

  include($template_directory.'/functions/utils/clean_wp_header.php');
  include($template_directory.'/functions/utils/custom_post_type.php');
  include($template_directory.'/functions/custom_post_types/terrariums.php');
  include($template_directory.'/functions/custom_post_types/classes.php');
  include($template_directory.'/functions/enque_styles.php');
  include($template_directory.'/functions/enque_scripts.php');

  function register_menus() {
    $menus = array(
      'main-nav' => __('Main Nav')
    );
    register_nav_menus($menus);
  }
  add_action( 'init', 'register_menus' );
?>
