<?php
if(!isset($columns)) {
  $columns = "large-12";
}
if($gallery) {
  $order_url = get_field('order_url');
  echo "<div class=\"{$columns} columns\">";
    $first_gallery_img = wp_get_attachment_image_src($gallery[0], 'full');
    echo "<div class=\"gallery-main-image-wrapper\">";
      echo "<img src=\"{$first_gallery_img[0]}\" class=\"gallery-main-image no-padding-bottom\"/>";
      if($order_url) {
        echo "<a href=\"{$order_url}\" target=\"_blank\" class=\"button order-terrarium\">ORDER</a>";
      }
    echo "</div>";
    echo "<ul class=\"small-block-grid-4\">";
    foreach ($gallery as $gallery_item) {
      $gallery_thumbnail = wp_get_attachment_image_src($gallery_item, 'thumbnail');
      $gallery_full = wp_get_attachment_image_src($gallery_item, 'full');

      echo "<li>";
        echo "<a href=\"{$gallery_full[0]}\" target=\"_blank\" onclick=\"SILL_LIFE.galleryClick(event)\">";
          echo "<img src=\"{$gallery_thumbnail[0]}\" class=\"no-padding-bottom\"/>";
        echo "</a>";
      echo "</li>";
    }
    echo "</ul>";
  echo "</div>";
}
?>
