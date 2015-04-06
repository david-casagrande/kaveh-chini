<div class="content display-table-cell">
  <div class="portfolio position-relative">
    <div class="portfolio-loading">Loading...</div>
    <?php
      $args = array('post_type'=> 'portfolio', 'posts_per_page' => -1);
      $portfolio = query_posts($args);

      echo "<ul class=\"portfolio-items small-block-grid-2 medium-block-grid-2 large-block-grid-2 xlarge-block-grid-3 xxlarge-block-grid-4\">";
        foreach($portfolio as $item) {
          include('portfolio_item.php');
        }
      echo "</ul>";
    ?>
  </div>
</div>
