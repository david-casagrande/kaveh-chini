<div class="header display-table">
  <div class="title display-table-cell"><?php echo get_field('title'); ?></div>
</div>
<div class="body display-table">
  <div class="media display-table-cell align-top">
    <?php
      $video = get_field('videos');
      $images = get_field('images');
      if($video) {
        $pattern = '~<iframe.*</iframe>~';
        preg_match_all($pattern, $video, $matches);
        foreach ($matches[0] as $match) {
          $wrappedframe = '<div class="flex-video">' . $match . '</div>';
          echo $wrappedframe;
        }
      }

      if($images) {
        foreach($images as $img) {
          $image = wp_get_attachment_image_src($img, 'full')[0];
          echo "<img src=\"{$image}\" />";
        }
      }
    ?>
  </div>
  <div class="narrative display-table-cell align-top">
    <!-- <p class="title"><?php echo get_field('title'); ?></p> -->
    <?php echo get_field('narrative'); ?>
  </div>
</div>
