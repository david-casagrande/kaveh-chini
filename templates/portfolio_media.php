<?php
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
