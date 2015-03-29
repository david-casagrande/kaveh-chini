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
                $video = get_field('videos');
                $images = get_field('images');
                if($video) {
                  $pattern = '~<iframe.*</iframe>~';
                  preg_match_all($pattern, $video, $matches);
                  foreach ($matches[0] as $match) {
                    $wrappedframe = '<div class="flex-video">' . $match . '</div>';
                    echo $wrappedframe;
                  }
                }

                if($images) {
                  foreach($images as $img) {
                    $image = wp_get_attachment_image_src($img, 'full')[0];
                    echo "<img src=\"{$image}\" />";
                  }
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
