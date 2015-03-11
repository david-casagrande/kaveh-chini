<?php
  $title = get_the_title();
  $price = get_field('price');
  $description = get_field('description');
  $care_instructions = get_field('care_instructions');
  $terrarium_title = $price ? "{$title} - <span class=\"font-weight-400\">${price}</span>" :  "{$title}";
  $gallery = get_field('gallery');
  $columns = $gallery ? 'large-6 medium-6' : 'large-12 medium-12';

  echo "<div class=\"terrarium clearfix\">";
    echo "<div class=\"large-12 columns\"><h2 class=\"terrarium-title\">{$terrarium_title}</h2></div>";

    include('terrarium_gallery.php');

    echo "<div class=\"{$columns} columns\">";
      if($description) {
        echo "<div class=\"description\">{$description}</div>";
      }
      if($care_instructions) {
        echo "<div class=\"care-instructions\">";
          echo "<h3 class=\"header-color-2\">Care Instructions</h3>";
          echo "<div class=\"description\">{$care_instructions}</div>";
        echo "</div>";
      }
    echo "</div>";
  echo "</div>";
?>
