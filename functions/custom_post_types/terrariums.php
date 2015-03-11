<?php
  $args = array(
    'post_type' => 'terrariums',
    'post_label' => 'Terrariums',
    'post_new_item_label' => 'Add a New Terrarium',
    'post_slug' => '_terrariums',
    'menu_icon' => 'dashicons-admin-site',
    //'taxonomy_type' => 'artwork-category',
    //'taxonomy_label' => 'Artwork',
    //'taxonomy_slug' => 'artwork'
  );

  $p = new Custom_Post_Type($args);
?>
