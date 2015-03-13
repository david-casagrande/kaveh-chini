<?php
  $args = array(
    'post_type' => 'portfolio',
    'post_label' => 'Portfolio',
    'post_new_item_label' => 'Add a New Portfolio Item',
    'post_slug' => '_portfolio',
    'menu_icon' => 'dashicons-admin-site',
    'taxonomy_type' => 'portfolio-category',
    'taxonomy_label' => 'Portfolio',
    'taxonomy_slug' => 'portfolio'
  );

  $p = new Custom_Post_Type($args);
  $p->create_custom_taxonomy();
?>
