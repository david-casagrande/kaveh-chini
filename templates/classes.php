<?php
  $title = get_the_title();
  $date = get_field('dates');
  $days_of_the_week = get_field('days_of_the_week');
  $time = get_field('time');
?>

<div class="class">
  <?php
    echo "<div class=\"class-date font-weight-700\">{$date}</div>";
    if($days_of_the_week) {
      echo "<div class=\"days-of-the-week header-color-2 font-weight-700\">{$days_of_the_week}</div>";
    }
    if($time) {
      echo "<div class=\"time\">{$time}</div>";
    }
  ?>
</div>
