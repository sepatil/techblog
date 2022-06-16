<?php get_header(); ?>
<div id="carouselExampleControls" class="carousel hero-carousel border border-success slide carousel-fade d-none d-sm-block" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php
    $inc = 1;
    $featuredArticle = new WP_Query(
      [
        'post_type' => 'article',
        'posts_per_page' => 3
      ]
    );
    while ($featuredArticle->have_posts()) {
      $featuredArticle->the_post();
    ?>
      <div class="carousel-item <?php if ($inc == 1) echo "active" ?>">
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="d-block w-100" alt="..." />
        <div class="carousel-caption d-none d-md-block">
          <h5><?php the_title(); ?></h5>
          <p>
            Some representative placeholder content for the first slide.
          </p>
          <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
        </div>
      </div>
    <?php
      $inc++; //counter
    }
    wp_reset_postdata();
    ?>

  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<main class="main-front-content">
  <div class="container">
    <div class="row">
      <?php

      $homePageArticle = new WP_Query(
        [
          'post_type' => 'post',
          'posts_per_page' => 3
        ]
      );
      $stack = [];
      while ($homePageArticle->have_posts()) {
        $homePageArticle->the_post();

        array_push($stack, get_the_ID());


        if ($homePageArticle->current_post == 0) {
      ?>
          <div class="col-md-8">
            <div class="content-block">
              <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="w-100" />
              <div class="content">
                <div class="content__box">
                  <div class="tag btn btn-success btn-md"><?php echo get_the_tag_list('', ' , ', '') ?></div>
                  <h2>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </h2>
                  <span class="text-white">by <a href="#" class="author-link">sepatil</a></span>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if ($homePageArticle->current_post == 1) { ?>
          <div class="col-md-4">
          <?php } ?>
          <?php if ($homePageArticle->current_post == 1) { ?>
            <div class="row">
              <div class="col-md-12">
                <div class="content-block">
                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="w-100" />
                  <div class="content">
                    <div class="content__box">
                      <div class="tag btn btn-success btn-md"><?php echo get_the_tag_list('', ' , ', '') ?></div>
                      <h3>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>
                      <span class="text-white">by <a href="#" class="author-link">sepatil</a></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($homePageArticle->current_post == 2) { ?>
            <div class="row mt-3">
              <div class="col-md-12">
                <div class="content-block">
                  <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="w-100" />
                  <div class="content">
                    <div class="content__box">
                      <div class="tag btn btn-success btn-md"><?php echo get_the_tag_list('', ' , ', '') ?></div>
                      <h3>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                      </h3>
                      <span class="text-white">by <a href="#" class="author-link">sepatil</a></span>

                    </div>

                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
          <?php if ($homePageArticle->current_post == 2) { ?>
          </div>
        <?php } ?>
      <?php
      }
      wp_reset_postdata();
      ?>
    </div>

    <div class="mt-5">
      <div class="row">
        <div class="col-md-8">
          <?php
          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $latestPost = new WP_Query(
            [
              'post_type' => 'post',
              'posts_per_page' => -1,
              'post__not_in' => $stack,
              'paged' => $paged,
            ]
          );
          while ($latestPost->have_posts()) {
            $latestPost->the_post();
            get_template_part('template-parts/content');
          }
          wp_reset_postdata();
          ?>

        </div>
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
    </div>
  </div>
</main>
<?php get_footer(); ?>