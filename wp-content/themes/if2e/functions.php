<?php
function if2e_setup() {


    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style();

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );

    // This theme supports a variety of post formats.
    add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menu( 'primary', __( 'Primary Menu', 'if2e' ) );

    // This theme uses a custom image size for featured images, displayed on "standard" posts.
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 680, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'if2e_setup' );

//require( get_template_directory() . '/inc/custom-header.php' );

//wp_title
function if2e_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= get_bloginfo( 'name', 'display' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'if2e' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'if2e_wp_title', 10, 2 );

//get_font_url
function if2e_get_font_url() {
    $font_url = '';

    if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'if2e' ) ) {
        $subsets = 'latin,latin-ext';

        $subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'if2e' );

        if ( 'cyrillic' == $subset )
            $subsets .= ',cyrillic,cyrillic-ext';
        elseif ( 'greek' == $subset )
            $subsets .= ',greek,greek-ext';
        elseif ( 'vietnamese' == $subset )
            $subsets .= ',vietnamese';

        $protocol = is_ssl() ? 'https' : 'http';
        $query_args = array(
            'family' => 'Open+Sans:400italic,700italic,400,700',
            'subset' => $subsets,
        );
        $font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
    }

    return $font_url;
}

function if2e_scripts_styles() {
    /*
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

    $font_url = if2e_get_font_url();
    if ( ! empty( $font_url ) )
        wp_enqueue_style( 'if2e-fonts', esc_url_raw( $font_url ), array(), null );

    // Loads our main stylesheet.
    wp_enqueue_style( 'if2e-style', get_stylesheet_uri() );

    wp_enqueue_script( 'prefixfree', get_template_directory_uri() . '/lib/prefixfree.min.js', array(), '' );

    // Adds JavaScript for handling the navigation menu hide-and-show behavior.
    wp_enqueue_script( 'if2e-navigation', get_template_directory_uri() . '/js/menu.event.js', array( 'jquery' ), '20140826', true );

    wp_enqueue_script( 'if2e-post', get_template_directory_uri() . '/js/post.event.js', array( 'jquery' ), '20140826', true );

}
add_action( 'wp_enqueue_scripts', 'if2e_scripts_styles' );


function if2e_mce_css( $mce_css ) {
    $font_url = if2e_get_font_url();

    if ( empty( $font_url ) )
        return $mce_css;

    if ( ! empty( $mce_css ) )
        $mce_css .= ',';

    $mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

    return $mce_css;
}
add_filter( 'mce_css', 'if2e_mce_css' );

function if2e_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'if2e' ),
        'id' => 'sidebar',
        'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'if2e' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

}
add_action( 'widgets_init', 'if2e_widgets_init' );

if ( ! function_exists( 'if2e_content_nav' ) ) :
    
    function if2e_content_nav( $html_id ) {
        global $wp_query;

        $html_id = esc_attr( $html_id );

        if ( $wp_query->max_num_pages > 1 ) : ?>
            <nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
                <h3 class="assistive-text"><?php _e( 'Post navigation', 'if2e' ); ?></h3>
                <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'if2e' ) ); ?></div>
                <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'if2e' ) ); ?></div>
            </nav><!-- #<?php echo $html_id; ?> .navigation -->
        <?php endif;
    }
endif;



