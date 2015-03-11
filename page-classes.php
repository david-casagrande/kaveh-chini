<?php get_header(); ?>

<div class="content">
  <div class="row content-padding-side content-padding-top narrative bg-white">
    <?php
      if ( have_posts() ) {
        while ( have_posts() ) { the_post(); ?>
          <?php
            $image = get_field('image');
            $columns = 'large-12 medium-12';
            $booking_url = get_field('booking_url');
            $gallery = get_field('gallery');

            echo "<div class=\"{$columns} columns\">";
              echo "<div class=\"classes-overview content-padding-bottom\">";
              the_content();
              echo "</div>";
            echo "</div>";
          ?>
        <?php
        }
      }
    ?>
  </div>
  <?php include('templates/all_classes.php'); ?>
  <div class="row content-padding-side content-padding-top no-padding-top bg-white">
    <?php include('templates/image_gallery.php'); ?>
  </div>
</div>

<?php get_footer(); ?>
