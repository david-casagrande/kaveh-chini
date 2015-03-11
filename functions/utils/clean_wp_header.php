<?php
  remove_action ('wp_head', 'rsd_link');
  remove_action( 'wp_head', 'wlwmanifest_link');
  remove_action('wp_head', 'wp_generator');
  remove_action( 'wp_head', 'wp_shortlink_wp_head');
?>
