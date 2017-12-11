<?php

add_theme_support('menus');

function scripts()
{
    wp_enqueue_style('libs', get_template_directory_uri() . '/css/libs.min.css', false, '1.1', 'all');

    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css', false, '1.1', 'all');

    wp_enqueue_style('media', get_template_directory_uri() . '/css/media.css', false, '1.1', 'all');

    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.js', false, 1.1, true);

    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', false, 1.1, true);
}

add_action('wp_enqueue_scripts', 'scripts');

function getPostImage()
{
    $url = get_the_post_thumbnail_url();

    if (!empty($url)) {
        return $url;
    } else {
        return get_template_directory_uri() . '/img/post_thumb/thumb_1.jpg';
    }
}

// Register Custom Post Type
// Register Custom Post Type
function akciaPostType() {

  $labels = array(
      'name'                  => _x( 'Акции', 'Post Type General Name', 'text_domain' ),
      'singular_name'         => _x( 'Акция', 'Post Type Singular Name', 'text_domain' ),
      'menu_name'             => __( 'Акции', 'text_domain' ),
      'name_admin_bar'        => __( 'Акции', 'text_domain' ),
      'archives'              => __( 'Item Archives', 'text_domain' ),
      'attributes'            => __( 'Item Attributes', 'text_domain' ),
      'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
      'all_items'             => __( 'All Items', 'text_domain' ),
      'add_new_item'          => __( 'Add New Item', 'text_domain' ),
      'add_new'               => __( 'Add New', 'text_domain' ),
      'new_item'              => __( 'New Item', 'text_domain' ),
      'edit_item'             => __( 'Edit Item', 'text_domain' ),
      'update_item'           => __( 'Update Item', 'text_domain' ),
      'view_item'             => __( 'View Item', 'text_domain' ),
      'view_items'            => __( 'View Items', 'text_domain' ),
      'search_items'          => __( 'Search Item', 'text_domain' ),
      'not_found'             => __( 'Not found', 'text_domain' ),
      'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
      'featured_image'        => __( 'Featured Image', 'text_domain' ),
      'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
      'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
      'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
      'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
      'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
      'items_list'            => __( 'Items list', 'text_domain' ),
      'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
      'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
  );
  $args = array(
      'label'                 => __( 'Акция', 'text_domain' ),
      'description'           => __( 'Post Type Description', 'text_domain' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'thumbnail' ),
      'taxonomies'            => array( 'category', 'post_tag' ),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 5,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'page',
  );
  register_post_type( 'akcia', $args );

}
add_action( 'init', 'akciaPostType', 0 );

/*
 * Replacement for get_adjacent_post()
 *
 * This supports only the custom post types you identify and does not
 * look at categories anymore. This allows you to go from one custom post type
 * to another which was not possible with the default get_adjacent_post().
 * Orig: wp-includes/link-template.php
 *
 * @param string $direction: Can be either 'prev' or 'next'
 * @param multi $post_types: Can be a string or an array of strings
 */
function getAdjacentPost($direction = 'prev', $post_types = 'post') {
  global $post, $wpdb;

  if(empty($post)) return NULL;
  if(!$post_types) return NULL;

  if(is_array($post_types)){
    $txt = '';
    for($i = 0; $i <= count($post_types) - 1; $i++){
      $txt .= "'".$post_types[$i]."'";
      if($i != count($post_types) - 1) $txt .= ', ';
    }
    $post_types = $txt;
  }

  $current_post_date = $post->post_date;

  $join = '';
  $in_same_cat = FALSE;
  $excluded_categories = '';
  $adjacent = $direction == 'prev' ? 'previous' : 'next';
  $op = $direction == 'prev' ? '<' : '>';
  $order = $direction == 'prev' ? 'DESC' : 'ASC';

  $join  = apply_filters( "get_{$adjacent}_post_join", $join, $in_same_cat, $excluded_categories );
  $where = apply_filters( "get_{$adjacent}_post_where", $wpdb->prepare("WHERE p.post_date $op %s AND p.post_type IN({$post_types}) AND p.post_status = 'publish'", $current_post_date), $in_same_cat, $excluded_categories );
  $sort  = apply_filters( "get_{$adjacent}_post_sort", "ORDER BY p.post_date $order LIMIT 1" );

  $query = "SELECT p.* FROM $wpdb->posts AS p $join $where $sort";
  $query_key = 'adjacent_post_' . md5($query);
  $result = wp_cache_get($query_key, 'counts');
  if ( false !== $result )
    return $result;

  $result = $wpdb->get_row("SELECT p.* FROM $wpdb->posts AS p $join $where $sort");
  if ( null === $result )
    $result = '';

  wp_cache_set($query_key, $result, 'counts');
  return $result;
}

add_filter('pre_get_posts', 'queryPostType');
function queryPostType($query) {
  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type) {
      $post_type = $post_type;
    } else {
      $post_type = array('nav_menu_item', 'post', 'akcia');
    }
    $query->set('post_type',$post_type);
    return $query;
  }
}
