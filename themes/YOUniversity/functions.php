<?php


/******************
  modify wp_title
******************/
add_filter( 'wp_title', 'wp_title_for_home' );

function wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return get_bloginfo( 'name' ) . ' » ' . get_bloginfo( 'description' );
  }
  return $title;
}


/******************
  add thumbnail support
******************/

add_theme_support('post-thumbnails');
add_image_size('article-thumbnail', 370, 208, true);
add_image_size('featured-article-thumbnail', 800, 450, true);



/******************
  add style
******************/
function theme_styles() {

  // on all pages
  wp_enqueue_style('opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700');
  wp_enqueue_style('amatic', 'http://fonts.googleapis.com/css?family=Amatic+SC:700' );
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
  wp_enqueue_style('basestyle', get_template_directory_uri() . '/css/base.css' );
  wp_enqueue_style('cheatsheetstyle', get_template_directory_uri() . '/css/cheatsheet.css' );

  // for front page
  wp_register_style('slick', get_template_directory_uri() . '/js/slick/slick.css');

  if (is_front_page()){
    wp_enqueue_style('slick');
  };
};

add_action('wp_enqueue_scripts', 'theme_styles');




/******************
  add javascript
******************/
function theme_js(){

  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', false, '1.11.3', true);
    wp_enqueue_script('jquery');
  }

  //wp_register_script('masonry', get_template_directory_uri() . '/js/jquery.masonry.min.js', array('jquery'), '', true);

  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true);

  wp_register_script('slickjs', get_template_directory_uri() . '/js/slick/slick.min.js', false, false, true);

  if (is_front_page()){
    wp_enqueue_script('slickjs');
  }
  // if (!is_singular()){
  //   wp_enqueue_script('masonry');
  // }
  //wp_enqueue_script('main', get_template_directory_uri() . '/js/slick/slick.min.js', array(), false, true);
}

add_action('wp_enqueue_scripts', 'theme_js');


function enable_slick() {
  if (is_front_page()){
    echo
      '<script>' .
      '$(document).ready(function(){' .
        '$(".featured-slider").slick({' .
          'dots: true,' .
          'prevArrow: "<a class=\"slick-arrow slick-arrow-prev\">Prev</a>",' .
          'nextArrow: "<a class=\"slick-arrow slick-arrow-next\">Next</a>"' .
        '});' .
      '});' .
      '</script>';
  }
};
add_action('wp_footer', 'enable_slick', 100);




/******************
  add menus
******************/

register_nav_menus( array(
  'primary'   => __( 'Primary', 'youniversity' ),
  'footer_copyright' => __( 'Footer Copyright', 'youniversity' )
) );




/******************
  add dynamic sidebars
******************/

function youniversity_widgets() {

  register_sidebar( array(
    'name'          => __( 'Primary Sidebar', 'youniversity' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Main sidebar that appears on the right.', 'youniversity' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="aside-title">',
    'after_title'   => '</h5>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Widget 1', 'youniversity' ),
    'id'            => 'footer-1',
    'description'   => __( 'Footer Widget 1', 'youniversity' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s col-sm-3 col-xs-12">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="footer-title">',
    'after_title'   => '</h5>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Widget 2', 'youniversity' ),
    'id'            => 'footer-2',
    'description'   => __( 'Footer Widget 2', 'youniversity' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s col-sm-3 col-xs-12">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="footer-title">',
    'after_title'   => '</h5>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Widget 3', 'youniversity' ),
    'id'            => 'footer-3',
    'description'   => __( 'Footer Widget 3', 'youniversity' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s col-sm-3 col-xs-12">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="footer-title">',
    'after_title'   => '</h5>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer Widget 4', 'youniversity' ),
    'id'            => 'footer-4',
    'description'   => __( 'Footer Widget 4', 'youniversity' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s col-sm-3 col-xs-12">',
    'after_widget'  => '</div>',
    'before_title'  => '<h5 class="footer-title">',
    'after_title'   => '</h5>',
  ) );
}
add_action( 'widgets_init', 'youniversity_widgets' );



/******************
  add pagination
******************/
function youniversity_numeric_posts_nav() {

  if( is_singular() )
    return;

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
    return;

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );

  /** Add current page to the array */
  if ( $paged >= 1 )
    $links[] = $paged;

  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
  }

  echo '<div class="pagination"><ul>' . "\n";

  /** Previous Post Link */
  if ( get_previous_posts_link() )
    printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
    $class = 1 == $paged ? ' class="current"' : '';

    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

    if ( ! in_array( 2, $links ) )
      echo '<li>…</li>';
  }

  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
    $class = $paged == $link ? ' class="current"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }

  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
    if ( ! in_array( $max - 1, $links ) )
      echo '<li>…</li>' . "\n";

    $class = $paged == $max ? ' class="current"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }

  /** Next Post Link */
  if ( get_next_posts_link() )
    printf( '<li>%s</li>' . "\n", get_next_posts_link() );

  echo '</ul></div>' . "\n";

}


?>
