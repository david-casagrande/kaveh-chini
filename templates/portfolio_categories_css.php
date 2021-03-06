<?php

  $portfolio_categories = get_terms('portfolio-category');
  if(is_wp_error($portfolio_categories)) { return; }

  echo "<style>";
    foreach($portfolio_categories as $category) {
      $slug = $category->slug;
      $color = $category->description;
      $name = $category->name;
      if($slug && $color) {
        echo ".{$slug} .header { background-color: {$color} !important; }";
        echo ".{$slug} a { color: {$color} !important; }";
        echo ".{$slug} .portfolio-item { border-color: {$color} !important; }";
        echo ".{$slug} .portfolio-item:after { background-color: {$color} !important; content: '{$name}'; }";
        echo ".{$slug}-nav.current-menu-item a, .{$slug}-nav a:hover { color: {$color} !important; }";
      }
    }
  echo "</style>";
?>
