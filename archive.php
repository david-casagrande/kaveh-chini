<?php get_header(); ?>

<div class="content">
  <div class="row narrative">
    <?php
      if ( have_posts() ) {
        while ( have_posts() ) { the_post();
          if(get_post_type() === 'terrariums') {
            include('templates/terrarium.php');
          }
          elseif(get_post_type() === 'classes') {
            include('templates/classes.php');
          }
        }
      }
    ?>
  </div>
</div>

<?php get_footer(); ?>
