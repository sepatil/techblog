<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <nav class="navbar navbar-custom navbar-expand-lg fixed-top" id="navBar">
    <div class="container">
      <a class="navbar-brand" href="<?php echo site_url() ?>">WebTechBlog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link <?php if (is_page('about')) echo 'current-menu-item'; ?>" href="<?php echo site_url('/about'); ?>">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if (get_post_type() == 'post') echo 'current-menu-item'; ?>" href="<?php echo site_url('/blog'); ?>">Blog</a>
          </li>
          <li class="nav-item dropdown">
            <a class="<?php if (get_post_type() == 'post') echo 'current-menu-item'; ?> nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-flip="false">
              Resources
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
              $categories = get_categories(array(
                'orderby' => 'name',
                'order'   => 'ASC'
              ));

              foreach ($categories as $category) {

                echo '<li>' . sprintf('<a class="%1$s" href="%2$s">%3$s</a>', 'dropdown-item', get_category_link($category->term_id), $category->name) . '</li>';
              }
              ?>

            </ul>
          </li>
          <li class="nav-item"><a class="nav-link <?php if (is_page('connect')) echo 'current-menu-item'; ?>" href="<?php echo site_url('/connect'); ?>">Connect</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  </header>