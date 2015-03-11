<div class="logo">
  <a href="<?php echo get_bloginfo('url'); ?>">
    <?php
      $logo = get_template_directory_uri().'/images/logo.png';
      $name = get_bloginfo('name');
      echo "<img src=\"{$logo}\" alt=\"{$name}\" />";
    ?>
  </a>
</div>
