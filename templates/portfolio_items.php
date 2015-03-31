<div class="content display-table-cell">
  <div class="portfolio">
    <?php
      $args = array('post_type'=> 'portfolio', 'posts_per_page' => -1);
      $portfolio = query_posts($args);

      echo "<ul class=\"small-block-grid-2 medium-block-grid-2 large-block-grid-2 xlarge-block-grid-3 xxlarge-block-grid-4\">";
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
              echo "<a href=\"{$url}\" class=\"position-relative display-block\">";
                echo "<img src=\"{$thumbnail['url']}\" alt=\"{$title}\" />";
              echo "</a>";
            echo "</div>";
          echo "</li>";
        }
      echo "</ul>";
    ?>
  </div>
</div>
