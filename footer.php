<footer class="site-footer">
  <div class="container">
	  <div class="row">
		  
	  
    <h2>Code Lab</h2>

    <?php
    $latestPost = new WP_Query(
      [
        'post_type' => 'project',
        'posts_per_page' => 4,
      ]
    );
    while ($latestPost->have_posts()) {
      $latestPost->the_post(); ?>
      <div class="col-md-4">
        <div class="post-nav">
          <img src="<?php echo get_the_post_thumbnail_url($latestPost->ID, 'grid-image'); ?>" class="w-100" />
          <div class="content">
            <div class="content__box">
              <div class="tag btn btn-success btn-sm">
                Code Lab
              </div>
              <h3>
                <a href="<?php echo get_permalink($latestPost->ID); ?>">
                  <?php the_title(); ?>
                </a>

              </h3>
              <p class="text-white fs-6"><?php echo wp_trim_words(get_the_content(), 20) ?></p>
            </div>
          </div>
        </div>
      </div>
		  
    <?php
    }
    wp_reset_postdata();
    ?>

</div>

  </div>
</footer>
<?php wp_footer(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- <script src="assets/js/popper.min.js"></script> -->
</body>

</html>