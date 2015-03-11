<?php if(!isset($page_class_names)) { $page_class_names = ''; } ?>
<div class="narrative content-padding-side content-padding-top row bg-white <?php echo $page_class_names; ?>">
  <?php
    if ( have_posts() ) {
      while ( have_posts() ) { the_post(); ?>
        <?php
          $image = get_field('image');
          $columns = $image ? 'large-6 medium-6' : 'large-12 medium-12';
          if($image) {
            echo "<div class=\"{$columns} columns\"><img src=\"{$image['url']}\" /></div>";
          }
          echo "<div class=\"{$columns} columns\">";
          the_content();
          echo "</div>";
        ?>
      <?php
      }
    }
  ?>
</div>
