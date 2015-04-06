<?php get_header(); ?>

<?php
  $kaveh_chini_classes = array('kaveh-chini', 'row');
?>
<div class="main-view">
  <div class="main-view-table">
    <?php include('templates/logo.php'); ?>
    <?php include('templates/main_nav.php'); ?>
    <div class="content display-table-cell">
      <?php
        if ( have_posts() ) {
          while ( have_posts() ) {
            the_post();
            echo "<div class=\"page-narrative\">";
            the_content();
            echo "</div>";
          }
        }
      ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
