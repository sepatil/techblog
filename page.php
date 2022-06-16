<?php get_header(); ?>
<main class="main-content">

    <div class="card single-card">
      <div class="card-body justify-content-center d-flex flex-column">
        <h5 class="card-title">
          <?php the_title(); ?>
        </h5>
      </div>
      <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'single-image'); ?>" class="card-img-top img-fluid d-none d-sm-block" alt="..." style="width:50%" />
    </div>
    <div class="container">
		  <?php while (have_posts()) {
    the_post(); ?>
      <div class="row">
        <div class="col-md-8">
          <?php the_content(); ?>


        </div>
      <?php } ?>
      <div class="col-md-4">

        <div class="sidebar-block">
          <h2>Categories</h2>
          <ul>
            <?php
            $args = [
              'title_li' => '',
              'style' => 'list',
            ];
            wp_list_categories($args)
            ?>

          </ul>
        </div>

        <div class="sidebar-block">
          <h2>Tags</h2>
          <?php
          $tags = get_tags(array('get' => 'all'));
          $output = '';
          if ($tags) {
            foreach ($tags as $tag) :
              $output .= '<button type="button" class="tag btn btn-outline-primary"><a href="' . get_term_link($tag) . '">' . $tag->name . '</a></button>';
            endforeach;
          } else {
            _e('No tags created.', 'techblog');
          }

          echo $output;

          ?>

        </div>
      </div>
      </div>

      <hr class="mt-3" />
      <?php

      $terms = wp_get_post_terms(get_queried_object_id(), 'post_tag', ['fields' => 'ids']);

      $args = [
        'post__not_in'        => array(get_queried_object_id()),
        'posts_per_page'      => 4,
        'ignore_sticky_posts' => 1,
        'orderby'             => 'rand',
        'tax_query' => [
          [
            'taxonomy' => 'post_tag',
            'terms'    => $terms
          ]
        ]
      ];
      $relatedPosts = new WP_Query($args);
      if ($relatedPosts->have_posts()) {

      ?>
        <div class="row">
          <h2 class="mt-5 mb-5">
            You may also like to read <i class="fas fa-angle-double-right"></i>
          </h2>
          <?php
          while ($relatedPosts->have_posts()) {
            $relatedPosts->the_post();
          ?>
            <div class="col-md-3">
              <div class="post-nav">
                <img src="<?php echo get_the_post_thumbnail_url($relatedPosts->ID, 'sidebar-image'); ?>" alt="" class="w-100" />
                <div class="content">
                  <div class="content__box">
                    <div class="tag btn btn-success btn-sm"><?php echo get_the_tag_list('', ' , ', '') ?></div>
                    <h3>
                      <a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title(); ?></a>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          <?php }
          wp_reset_postdata(); ?>
        </div>
      <?php
      } ?>
    </div>
</main>

<?php get_footer(); ?>