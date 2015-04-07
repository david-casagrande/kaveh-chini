<?php
  function get_portfolio_callback() {
    // $cacheKey = 'about';
    // $cache = get_transient($cacheKey);

    @header( 'Content-Type: application/json; charset=' . get_option( 'blog_charset' ) );

    //if( is_user_logged_in() || empty($cache) ) {

      $args = array(
        'post_type'=> 'portfolio',
        'name' => $_GET['slug']
      );

      $query = new WP_Query( $args );
      $all = array();

      while ( $query->have_posts() ) : $query->the_post();
        $video = get_field('videos');
        $videos = array();
        $images = get_field('images');
        $all_images = array();
        $categories = get_the_terms(get_the_ID(), 'portfolio-category');
        $category_slug = "no-category";
        if($categories) {
          $category = reset($categories);
          $category_slug = $category->slug;
        }

        if($video) {
          $pattern = '~<iframe.*</iframe>~';
          preg_match_all($pattern, $video, $matches);
          foreach ($matches[0] as $match) {
            $videos[] = '<div class="flex-video">' . $match . '</div>';
          }
        }

        if($images) {
          foreach($images as $img) {
            $all_images[] = wp_get_attachment_image_src($img, 'full')[0];
          }
        }

        $p = array(
          'id'            => get_the_ID(),
          'title'         => get_field('title'),
          'videos'        => $videos,
          'images'        => $all_images,
          'category_slug' => $category_slug,
          'narrative'     => get_field('narrative')
        );
        $all[] = $p;
      endwhile;

      $all = json_encode( array('portfolio' => count($all) > 0 ? $all[0] : array() ));
      //set_transient( $cacheKey, $all, YEAR_IN_SECONDS);
      echo $all;
      wp_reset_postdata();
    // }
    // else {
    //   echo $cache;
    // }

    die();
  }
  add_action( 'wp_ajax_nopriv_portfolio', 'get_portfolio_callback' );
  add_action( 'wp_ajax_portfolio', 'get_portfolio_callback' );
?>
