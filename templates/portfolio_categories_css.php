<?php

  $portfolio_categories = get_terms('portfolio-category');
  if(is_wp_error($portfolio_categories)) { return; }

  echo "<style>";
    foreach($portfolio_categories as $category) {
      $slug = $category->slug;
      $color = $category->description;
      if($slug && $color) {
        echo ".{$slug} .header { background-color: {$color} !important; }";
        echo ".{$slug} a { color: {$color} !important; }";
      }
    }
  echo "</style>";
?>
