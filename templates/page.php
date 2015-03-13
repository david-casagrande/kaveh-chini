<div class="narrative">
  <?php
    if ( have_posts() ) {
      while ( have_posts() ) { the_post(); ?>
        <?php
          echo "<div>";
          the_content();
          echo "</div>";
        ?>
      <?php
      }
    }
  ?>
</div>
