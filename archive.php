<?php get_header(); ?>

<?php
  $kaveh_chini_classes = array('kaveh-chini', 'row');
?>
<div class="main-view">
  <div class="main-view-table">
    <?php include('templates/logo.php'); ?>
    <?php include('templates/main_nav.php'); ?>
    <div class="content display-table-cell">
      <div class="portfolio">
        <ul class="small-block-grid-2 medium-block-grid-2 large-block-grid-2 xlarge-block-grid-3 xxlarge-block-grid-4">
          <?php
            if ( have_posts() ) {
              while ( have_posts() ) {
                the_post();
                $item = new stdClass();
                $item->ID = get_the_id();
                include('templates/portfolio_item.php');
              }
            }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
