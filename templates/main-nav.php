<div class="navigation large-3 columns">
  <div class="main-nav">
    <?php
      $defaults = array(
        'theme_location'  => 'main-nav',
        'container'       => '',
        'items_wrap'      => '<ul id="%1$s" class="%2$s side-nav">%3$s</ul>'
      );
      wp_nav_menu($defaults);
    ?>
  </div>
</div>
