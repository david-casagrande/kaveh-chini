<?php
if($gallery) {
  echo "<div class=\"large-12 columns\">";
    echo "<div class=\"image-gallery-arrow-padding\">";

      echo "<div class=\"image-gallery\">";
        echo "<div class=\"image-gallery-window\">";
        foreach ($gallery as $gallery_item) {
          $gallery_thumbnail = wp_get_attachment_image_src($gallery_item, 'thumbnail');
          $gallery_full = wp_get_attachment_image_src($gallery_item, 'full');

          echo "<div class=\"image\">";
            echo "<a href=\"{$gallery_full[0]}\" target=\"_blank\" onclick=\"SILL_LIFE.imageGalleryClick(event)\">";
              echo "<img src=\"{$gallery_thumbnail[0]}\" class=\"no-padding-bottom\" />";
            echo "</a>";
          echo "</div>";
        }
        echo "</div>";
      echo "</div>";

      echo "<div class=\"gallery-control-left\" onclick=SILL_LIFE.galleryNavigate(true)><div class=\"chevron-left\"></div></div>";
      echo "<div class=\"gallery-control-right\" onclick=SILL_LIFE.galleryNavigate()><div class=\"chevron-right\"></div></div>";

    echo "</div>";
  echo "</div>";
}
?>
