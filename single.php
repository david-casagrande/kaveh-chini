<?php get_header(); ?>

<?php
  $kaveh_chini_classes = array('kaveh-chini', 'row');
?>
  <div class="<?php echo join(' ', $kaveh_chini_classes); ?>">
    <?php include('templates/logo.php'); ?>
    <?php include('templates/main-nav.php'); ?>
    <div class="content large-8 columns">
      <div class="narrative"></div>
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
          <div class="header display-table">
            <div class="display-table-cell title"><?php echo get_field('title'); ?></div>
          </div>
          <div class="body row">
            <div class="media large-8 columns">
              <?php
                $video = get_field('video');
                $image = get_field('image');
                if($video) {
                  echo "<div class=\"flex-video\">{$video}</div>";
                } else if($image) {
                  echo "<img src=\"{$image['url']}\" />";
                }
              ?>
            </div>
            <div class="narrative large-4 columns">
              <!-- <p class="title"><?php echo get_field('title'); ?></p> -->
              <?php echo get_field('narrative'); ?>
            </div>
          </div>
        </div>
      <?php }
    }
  ?>
<?php get_footer(); ?>
