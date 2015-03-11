<div class="main-nav">
  <?php
    $defaults = array(
      'theme_location'  => 'main-nav',
      'container'       => '',
      'items_wrap'      => '<ul id="%1$s" class="%2$s small-block-grid-1 medium-block-grid-4">%3$s</ul>'
    );
    wp_nav_menu($defaults);
  ?>
</div>
