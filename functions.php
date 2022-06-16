<?php

/**
 * Custom functions, theme features and varialbles.
 * 
 */

function techblog_resources()
{
  wp_enqueue_style('custom-google-font', 'https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&display=swap');
  wp_enqueue_style('fontawesome', get_theme_file_uri('/assets/css/fontawesome.css'));
  wp_enqueue_style('techblog_main_style', get_theme_file_uri('/assets/css/style.css'));
  wp_enqueue_script('main-javascript', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
  wp_enqueue_script('navbar-javascript', get_theme_file_uri('/assets/js/navbar.js'), array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'techblog_resources');
add_action('init', 'techblog_post_type');
function techblog_post_type()
{
  $labels = array(
    'name'                  => _x('Articles', 'Post type general name', 'article'),
    'singular_name'         => _x('Article', 'Post type singular name', 'article'),
    'menu_name'             => _x('Articles', 'Admin Menu text', 'article'),
    'name_admin_bar'        => _x('Article', 'Add New on Toolbar', 'article'),
    'add_new'               => __('Add New', 'article'),
    'add_new_item'          => __('Add New article', 'article'),
    'new_item'              => __('New article', 'article'),
    'edit_item'             => __('Edit article', 'article'),
    'view_item'             => __('View Articles', 'article'),
    'all_items'             => __('All Articles', 'article'),
    'search_items'          => __('Search Articles', 'article'),
    'parent_item_colon'     => __('Parent Articles:', 'article'),
    'not_found'             => __('No Articles found.', 'article'),
    'not_found_in_trash'    => __('No Articles found in Trash.', 'article'),
    'featured_image'        => _x('Article Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'article'),
    'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'article'),
    'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'article'),
    'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'article'),
    'archives'              => _x('Article archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'article'),
    'insert_into_item'      => _x('Insert into article', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'article'),
    'uploaded_to_this_item' => _x('Uploaded to this article', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'article'),
    'filter_items_list'     => _x('Filter Articles list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'article'),
    'items_list_navigation' => _x('Articles list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'article'),
    'items_list'            => _x('Articles list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'article'),
  );
  $args = array(
    'labels'             => $labels,
    'description'        => 'Article custom post type.',
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'article'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 20,
    'supports'           => array('title', 'editor', 'author', 'thumbnail'),
    'taxonomies'         => array('category', 'post_tag'),
    'show_in_rest'       => false
  );

  register_post_type('Article', $args);

  $labels = array(
    'name'                  => _x('Projects', 'Post type general name', 'project'),
    'singular_name'         => _x('Projects', 'Post type singular name', 'project'),
    'menu_name'             => _x('Projects', 'Admin Menu text', 'project'),
    'name_admin_bar'        => _x('Project', 'Add New on Toolbar', 'project'),
    'add_new'               => __('Add New', 'project'),
    'add_new_item'          => __('Add New article', 'project'),
    'new_item'              => __('New project', 'project'),
    'edit_item'             => __('Edit projects', 'project'),
    'view_item'             => __('View Projects', 'project'),
    'all_items'             => __('All Projects', 'project'),
    'search_items'          => __('Search Projects', 'project'),
    'parent_item_colon'     => __('Parent Projects:', 'project'),
    'not_found'             => __('No Projects found.', 'project'),
    'not_found_in_trash'    => __('No Projects found in Trash.', 'project'),
    'featured_image'        => _x('Project Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'project'),
    'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'project'),
    'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'project'),
    'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'project'),
    'archives'              => _x('Article archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'project'),
    'insert_into_item'      => _x('Insert into project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'project'),
    'uploaded_to_this_item' => _x('Uploaded to this project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'project'),
    'filter_items_list'     => _x('Filter Articles list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'project'),
    'items_list_navigation' => _x('Articles list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'project'),
    'items_list'            => _x('Projects list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'project'),
  );
  $args = array(
    'labels'             => $labels,
    'description'        => 'Project custom post type.',
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'project'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 20,
    'supports'           => array('title', 'editor', 'author', 'thumbnail'),
    'taxonomies'         => array('category', 'post_tag'),
    'show_in_rest'       => false
  );

  register_post_type('Project', $args);
}

function techblog_features()
{

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  register_nav_menu('headerMenuLocation', 'Header Menu Location');
  add_image_size('single-image', 750, 450, true);
  add_image_size('grid-image', 300, 300, true);
  add_image_size('sidebar-image', 350, 250, true);
}
add_action('after_setup_theme', 'techblog_features');

add_filter('category_css_class', 'add_category_slug_as_class', 10, 4);

function add_category_slug_as_class($css_classes, $category, $depth, $args)
{
  $css_classes[] = 'text-body';
  return $css_classes;
}

add_action('category_add_form_fields', 'add_category_image', 10, 2);
function add_category_image($taxonomy)
{
?>
  <div class="form-field term-group">

    <label for="image_id"><?php _e('Image', 'taxt-domain'); ?></label>
    <input type="hidden" id="image_id" name="image_id" class="custom_media_url" value="">

    <div id="image_wrapper"></div>

    <p>
      <input type="button" class="button button-secondary taxonomy_media_button" id="taxonomy_media_button" name="taxonomy_media_button" value="<?php _e('Add Image', 'taxt-domain'); ?>">
      <input type="button" class="button button-secondary taxonomy_media_remove" id="taxonomy_media_remove" name="taxonomy_media_remove" value="<?php _e('Remove Image', 'taxt-domain'); ?>">
    </p>

  </div>
<?php
}
add_action('created_category', 'save_category_image', 10, 2);
function save_category_image($term_id, $tt_id)
{
  if (isset($_POST['image_id']) && '' !== $_POST['image_id']) {
    $image = $_POST['image_id'];
    add_term_meta($term_id, 'category_image_id', $image, true);
  }
}
add_action('category_edit_form_fields', 'update_category_image', 10, 2);
function update_category_image($term, $taxonomy)
{ ?>
  <tr class="form-field term-group-wrap">
    <th scope="row">
      <label for="image_id"><?php _e('Image', 'taxt-domain'); ?></label>
    </th>
    <td>

      <?php $image_id = get_term_meta($term->term_id, 'image_id', true); ?>
      <input type="hidden" id="image_id" name="image_id" value="<?php echo $image_id; ?>">

      <div id="image_wrapper">
        <?php if ($image_id) { ?>
          <?php echo wp_get_attachment_image($image_id, 'thumbnail'); ?>
        <?php } ?>

      </div>

      <p>
        <input type="button" class="button button-secondary taxonomy_media_button" id="taxonomy_media_button" name="taxonomy_media_button" value="<?php _e('Add Image', 'taxt-domain'); ?>">
        <input type="button" class="button button-secondary taxonomy_media_remove" id="taxonomy_media_remove" name="taxonomy_media_remove" value="<?php _e('Remove Image', 'taxt-domain'); ?>">
      </p>

      </div>
    </td>
  </tr>
<?php
}
add_action('edited_category', 'updated_category_image', 10, 2);
function updated_category_image($term_id, $tt_id)
{
  if (isset($_POST['image_id']) && '' !== $_POST['image_id']) {
    $image = $_POST['image_id'];
    update_term_meta($term_id, 'image_id', $image);
  } else {
    update_term_meta($term_id, 'image_id', '');
  }
}
add_action('admin_enqueue_scripts', 'load_media');
function load_media()
{
  wp_enqueue_media();
}
add_action('admin_footer', 'add_custom_script');
function add_custom_script()
{
?> <script>
    jQuery(document).ready(function($) {
      function taxonomy_media_upload(button_class) {
        var custom_media = true,
          original_attachment = wp.media.editor.send.attachment;
        $('body').on('click', button_class, function(e) {
          var button_id = '#' + $(this).attr('id');
          var send_attachment = wp.media.editor.send.attachment;
          var button = $(button_id);
          custom_media = true;
          wp.media.editor.send.attachment = function(props, attachment) {
            if (custom_media) {
              $('#image_id').val(attachment.id);
              $('#image_wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
              $('#image_wrapper .custom_media_image').attr('src', attachment.url).css('display', 'block');
            } else {
              return original_attachment.apply(button_id, [props, attachment]);
            }
          }
          wp.media.editor.open(button);
          return false;
        });
      }
      taxonomy_media_upload('.taxonomy_media_button.button');
      $('body').on('click', '.taxonomy_media_remove', function() {
        $('#image_id').val('');
        $('#image_wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
      });

      $(document).ajaxComplete(function(event, xhr, settings) {
        var queryStringArr = settings.data.split('&');
        if ($.inArray('action=add-tag', queryStringArr) !== -1) {
          var xml = xhr.responseXML;
          $response = $(xml).find('term_id').text();
          if ($response != "") {
            $('#image_wrapper').html('');
          }
        }
      });
    });
  </script>
<?php
}
add_filter('manage_edit-category_columns', 'display_image_column_heading');
function display_image_column_heading($columns)
{
  $columns['category_image'] = __('Image', 'taxt-domain');
  return $columns;
}

add_action('manage_category_custom_column', 'display_image_column_value', 10, 3);
function display_image_column_value($columns, $column, $id)
{
  if ('category_image' == $column) {
    $image_id = esc_html(get_term_meta($id, 'image_id', true));

    $columns = wp_get_attachment_image($image_id, array('50', '50'));
  }
  return $columns;
}

if (!function_exists('post_pagination')) :
  function post_pagination()
  {
    global $wp_query;
    $pager = 999999999; // need an unlikely integer

    echo paginate_links(array(
      'base' => str_replace($pager, '%#%', esc_url(get_pagenum_link($pager))),
      'format' => '?paged=%#%',
      'current' => max(1, get_query_var('paged')),
      'total' => $wp_query->max_num_pages
    ));
  }
endif;
