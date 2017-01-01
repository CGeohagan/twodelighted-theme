<?php
/**
 * Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions including 
 * custom template tags, actions and filter hooks to change core functionality.
 *
 *
 * @package TwoDelighted_Theme
 */
/**
 * Set the content width
 */
if ( ! isset( $content_width ) ) :
    $content_width = 640;
endif;
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * To override TwoDelighted_Theme_setup() in a child theme, 
 * add your own TwoDelighted_Theme_setup to your child theme's functions.php file.
 */
if ( ! function_exists( 'TwoDelighted_Theme_setup' ) ):
    function TwoDelighted_Theme_setup() {
        // Make theme available for translation.
        // Translations can be filed in the /languages/ directory.
        load_theme_textdomain( 'twodelighted-theme', get_template_directory() . '/languages' );
        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );
        // Enable support for Post Thumbnails on posts and pages
        //add_theme_support( 'post-thumbnails' );
        // Enable support for Post Formats.
        add_theme_support( 'post-formats', array( 
            'aside', 
            'image', 
            'video', 
            'quote', 
            'link' 
        ) );
        // Enable support for HTML5 markup.
        add_theme_support( 'html5', array(
            'comment-list',
            'search-form',
            'comment-form',
            'gallery',
        ) );
        // Enable support for editable menus via Appearance > Menus
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'twodelighted-theme' ),
            'footer' => __('Footer Menu', 'twodelighted-theme'),
            'portfolio' => __('Portfolio Menu', 'twodelighted-theme')
        ) );
        
        // Add custom image sizes
            // add_image_size( &#039;name&#039;, 500, 300, true );
    }
endif; // TwoDelighted_Theme_setup
add_action( 'after_setup_theme', 'TwoDelighted_Theme_setup' );
/**
 * Register sidebars and widgetized areas
 */
function TwoDelighted_Theme_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Sidebar', 'twodelighted-theme' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer Widget Area 1', 'twodelighted-theme' ),
        'id' => 'footer-area1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer Widget Area 2', 'twodelighted-theme' ),
        'id' => 'footer-area2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'TwoDelighted_Theme_widgets_init' );

/* ENQUEUE TITLE TAG
 ========================== */
function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );

/* ENQUEUE SCRIPTS & STYLES
 ========================== */
function TwoDelighted_Theme_scripts() {
    // theme style.css file
    wp_enqueue_style( 'twodelighted-theme-style', get_stylesheet_uri() );

    
    // threaded comments
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    // vendor scripts
   
    if ( is_front_page() ):
    wp_enqueue_script(
        'bxslider',
        get_template_directory_uri() . '/assets/vendor/jquery.bxslider.min.js',
        array('jquery')
    );
endif;

    //Masonry Archive
    wp_enqueue_script(
      'masonry-scripts',
      'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js',
      array('jquery'), '3.1.1', true );

    //Images Loaded for Masonry Archive
    wp_enqueue_script(
      'imagesloaded-scripts',
      'https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js',
      array('jquery'), '3.1.1', true );

    // Theme Scripts
    wp_enqueue_script(
      'theme-init',
      get_template_directory_uri() . '/assets/js/theme.js',
      array('jquery'), '3.1.1', true );



}    
add_action('wp_enqueue_scripts', 'TwoDelighted_Theme_scripts');





// Google webfonts stylesheet
function wpb_add_google_fonts() {

    wp_enqueue_style('wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Lora:400,400i,700%7CMontserrat:400,700', false);

}

add_action ('wp_enqueue_scripts', 'wpb_add_google_fonts');

/**
 * Remove the front-end admin bar for everybody, always
 */
show_admin_bar( false );
// Add TinyMCE buttons that are disabled by default
//function themeFunction_mce_buttons_2($buttons) {  
//  /**
//   * Add in a core button that's disabled by default
//   */
//  $buttons[] = 'justify'; // fully justify text
//  $buttons[] = 'hr'; // insert HR
//
//  return $buttons;
//}
//add_filter('mce_buttons_2', 'themeFunction_mce_buttons_2');
// Remove all colors except those custom colors specified from TinyMCE
//function themeFunction_change_mce_options( $init ) {
//  $custom_colors = '"#####1", "Color Name 1", "#####2", "Color Name 2", "#####3", "Color Name 3"';    
//  $init['textcolor_map'] = '['.$custom_colors.']';
//return $init;
//}
//add_filter('tiny_mce_before_init', 'themeFunction_change_mce_options');


// Comments & pingbacks display template
include('inc/functions/comments.php');

/* CUSTOM EXCERPT LENGTH
 ========================== */
 function wpse_custom_excerpts($limit) {
    return wp_trim_words(get_the_content(), $limit, '<div class="more"><a class = "more-tag" href="'. esc_url( get_permalink() ) . '">' . __( 'Read more', 'twodelighted-theme' ) . '</a></div>');
}



// Remove [...] from Excerpt
function trim_excerpt($text) {
   return rtrim($text,'[&amp;hellip]');
}
add_filter('get_the_excerpt', 'trim_excerpt');



/* GET FIRST IMAGE
 ========================== */
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "/path/to/default.png";
  }
  return $first_img;
}




/**
 * AJAX Load More 
 * @link http://www.billerickson.net/infinite-scroll-in-wordpress
 */
function be_ajax_load_more() {
    check_ajax_referer( 'be-load-more-nonce', 'nonce' );
    
    $args = isset( $_POST['query'] ) ? array_map( 'esc_attr', $_POST['query'] ) : array();
    $args['post_type'] = isset( $args['post_type'] ) ? esc_attr( $args['post_type'] ) : 'post';
    $args['paged'] = esc_attr( $_POST['page'] );
    $args['post_status'] = 'publish';
    ob_start();
    $loop = new WP_Query( $args );

    if( $loop->have_posts() ): while( $loop->have_posts() ): $loop->the_post();
        get_template_part( '/inc/format', 'standard' );
    endwhile; endif; wp_reset_postdata();
    $data = ob_get_clean();
    wp_send_json_success( $data );
    wp_die();
}
add_action( 'wp_ajax_be_ajax_load_more', 'be_ajax_load_more' );
add_action( 'wp_ajax_nopriv_be_ajax_load_more', 'be_ajax_load_more' );



/**
 * Javascript for Load More
 *
 */
function be_load_more_js() {
    global $wp_query;
    $args = array(
        'nonce' => wp_create_nonce( 'be-load-more-nonce' ),
        'url'   => admin_url( 'admin-ajax.php' ),
        'query' => $wp_query->query,
        'maxpage' => $wp_query->max_num_pages
    );
            
    wp_enqueue_script( 'be-load-more', get_stylesheet_directory_uri() . '/assets/js/load-more.js', array( 'jquery' ), '1.0', true );
    wp_localize_script( 'be-load-more', 'beloadmore', $args );
    
}
add_action( 'wp_enqueue_scripts', 'be_load_more_js' );



