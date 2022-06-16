<?php get_header(); ?>

<main class="main-front-content">
  <div class="card single-card">
    <div class="card-body justify-content-center d-flex flex-column">
      <div class="tag btn btn-success w-50 btn-lg"><?php echo get_the_archive_title() ?></div>

      <h5 class="card-title">
        <?php echo get_the_archive_description();  ?>
      </h5>
    </div> 
    <?php
    $image_id = get_term_meta(get_queried_object()->term_id, 'image_id', true);
    echo wp_get_attachment_image($image_id, 'card-img-top img-fluid d-none d-sm-block'); ?>
  </div>
  <div class="container">
    <div class="mt-5">
      <div class="row">
        <div class="col-md-9">
          <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $latestPost = new WP_Query(
            [
              'post_type' => 'post',
              'posts_per_page' => 2,
              'paged' => $paged,
            ]
          );

          while ($latestPost->have_posts()) {
            $latestPost->the_post();
            get_template_part('template-parts/content');
          }
          post_pagination();
          wp_reset_postdata();
          ?>

        </div>
        <div class="col-md-3">
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
    </div>
  </div>
</main>
</main>
<?php get_footer(); ?>