<?php
  $args = array(
    'post_type' => 'portfolio',
    'post_label' => 'Portfolio',
    'post_new_item_label' => 'Add a New Portfolio Item',
    'post_slug' => '_portfolio',
    'menu_icon' => 'dashicons-admin-site',
    //'taxonomy_type' => 'artwork-category',
    //'taxonomy_label' => 'Artwork',
    //'taxonomy_slug' => 'artwork'
  );

  $p = new Custom_Post_Type($args);
?>
