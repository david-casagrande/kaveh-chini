<?php get_header(); ?>

<?php
  $kaveh_chini_classes = array('kaveh-chini', 'row');
?>
<div class="main-view">
  <div class="row">
    <?php include('templates/logo.php'); ?>
    <?php include('templates/main-nav.php'); ?>
    <div class="content large-7 columns">
      <div class="portfolio">
        <?php
          $args = array('post_type'=> 'portfolio');
          $portfolio = query_posts($args);

          echo "<ul class=\"small-block-grid-2 medium-block-grid-2 large-block-grid-2\">";
            foreach($portfolio as $item) {
              $thumbnail = get_field('thumbnail', $item->ID);
              $title = get_field('title', $item->ID);
              $url = get_permalink($item->ID);
              $categories = get_the_terms($item->ID, 'portfolio-category');
              $category_slug = "no-category";
              if($categories) {
                $category = reset($categories);
                $category_slug = $category->slug;
              }

              echo "<li class=\"{$category_slug}\">";
                echo "<div class=\"portfolio-item position-relative\">";
                  echo "<a href=\"{$url}\" class=\"position-relative\">";
                    echo "<img src=\"{$thumbnail['url']}\" alt=\"{$title}\" />";
                  echo "</a>";
                  // echo "<div class=\"title\">{$title}</div>";
                echo "</div>";
              echo "</li>";
            }
          echo "</ul>";
        ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
