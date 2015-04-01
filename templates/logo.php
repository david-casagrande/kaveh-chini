<?php
  $image_path = get_template_directory_uri()."/images";
  $blog_name = get_bloginfo('name');
  $logo_img = "<img class=\"show-for-medium-up\" src=\"{$image_path}/logo.png\" alt=\"{$blog_name}\" />";
  $logo_img_mobile = "<img class=\"show-for-small-only\" src=\"{$image_path}/logo-mobile.png\" alt=\"{$blog_name}\" />";
?>

<div class="logo-table-cell">
  <div class="logo">
    <a href="/">
      <?php
        echo $logo_img;
        echo $logo_img_mobile;
      ?>
    </a>
  </div>

  <div class="mobile-nav-toggle">
    <a class="nav-toggle" href="#"><span></span></a>
  </div>
</div>
