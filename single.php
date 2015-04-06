<?php get_header(); ?>

<?php
  $kaveh_chini_classes = array('kaveh-chini', 'row');
?>
<div class="main-view">
  <div class="main-view-table">
    <?php include('templates/logo.php'); ?>
    <?php include('templates/main_nav.php'); ?>
    <?php include('templates/portfolio_items.php'); ?>
  </div>
</div>

<div class="modal">
  <div class="modal-container">
  <?php
    if ( have_posts() ) {
      while ( have_posts() ) { the_post(); ?>
        <?php
          $categories = get_the_terms($post->ID, 'portfolio-category');
          $category_color = "#4d83af";
          $category_slug = "no-category";
          if($categories) {
            $category = reset($categories);
            $category_slug = $category->slug;
          }
        ?>
        <?php include('templates/portfolio-single.php'); ?>
      <?php }
    }
  ?>
  </div>
</div>

<?php get_footer(); ?>
