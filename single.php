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

        <div class="modal <?php echo $category_slug; ?>">
          <div class="modal-container loaded">
            <?php include('templates/portfolio-single.php'); ?>
          </div>
        </div>
      <?php }
    }
  ?>

<?php get_footer(); ?>
