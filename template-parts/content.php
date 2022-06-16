<div class="card">
  <img src="<?php echo get_the_post_thumbnail_url(get_the_id(), 'grid-image'); ?>" class="card-img-top img-fluid d-none d-sm-block" alt="<?php the_title(); ?>" />
  <div class="card-body">
    <div class="tag btn btn-success btn-md"><?php echo get_the_tag_list('', ' , ', '') ?></div>
    <h5 class="card-title">
      <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    </h5>
    <ul class="list-inline left-0 fs-6 fw-lighter text-black-50">
      <li class="list-inline-item">
        <span class="text-black-50">by <a href="#" class="author-link"><?php the_author_link() ?></a></span>
      </li>
      <li class="list-inline-item">November 6, 2019</li>
    </ul>
    <p class="card-text">
      <?php echo wp_trim_words(get_the_content(), 15) ?>
    </p>
  </div>
</div>