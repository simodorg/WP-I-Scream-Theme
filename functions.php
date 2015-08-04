<?php

// Enqueue scripts and styles.
function enqueue_scripts() {
  // Add Material Design icon fonts.
  wp_enqueue_style( 'mdl-icon-fonts', 'https://cdn.css.net/fonts/icon?family=Material+Icons', array(), null );

  // Add Roboto fonts.
  wp_enqueue_style( 'roboto-fonts', 'https://cdn.css.net/fonts/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium', array(), null );

  // Add Material Design CSS.
  wp_enqueue_style( 'mdl-sheet', get_template_directory_uri() . '/css/material.min.css', array(), '1.0.2' );

  // Add Material Design javascript.
  wp_enqueue_script( 'mdl-js', get_template_directory_uri() . '/js/material.min.js', array(), '1.0.2', true );

  // Load main stylesheet.
  wp_enqueue_style( 'blog-sheet', get_stylesheet_uri(), array(), '0.4.1' );

  if ( is_singular() ) wp_enqueue_script( 'comment-reply', true );
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );

// Change wp_nav_menu li class.
function add_classes_on_li( $classes, $item, $args ) {
  $classes[] = 'mdl-menu__item mdl-js-ripple-effect';
  return $classes;
}

add_filter( 'nav_menu_css_class', 'add_classes_on_li', 1, 3 );

// Add thumbnails support.
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 884, 360, true );

// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
  'primary' => __( 'Primary Menu', 'iscream' ),
) );

// Add class to more link.
function modify_read_more_link() {
  return '<a class="more-link mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast" href="' . get_permalink() . '">Read More <i class="material-icons mdl-color-text--white" role="presentation">arrow_forward</i></a>';
}

add_filter( 'the_content_more_link', 'modify_read_more_link' );

// Custom comment submit button.
function awesome_comment_form_submit_button( $button ) {
  $button =
    '<button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" name="submit" type="submit">
      <i class="material-icons" role="presentation">check</i><span class="visuallyhidden">add comment</span>
     </button>' .
    get_comment_id_fields();
  return $button;
}

add_filter( 'comment_form_submit_button', 'awesome_comment_form_submit_button' );

// The comments list.
function mytheme_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
  extract($args, EXTR_SKIP);

  if ( 'div' == $args['style'] ) {
  	$tag = 'div';
  	$add_below = 'comment';
  } else {
  	$tag = 'li';
  	$add_below = 'div-comment';
  } ?>
  <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
  <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body comment mdl-color-text--grey-700">
  <?php endif; ?>
  <header class="comment__header">
    <?php echo get_avatar( $comment, 88 ); ?>
    <div class="comment__author">
      <?php printf( __( '<strong>%s</strong>', 'iscream' ), get_comment_author_link() ); ?>
      <span><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
    </div>
  </header>
  <?php if ( $comment->comment_approved == '0' ) : ?>
    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'iscream' ); ?></em>
    <br />
  <?php endif; ?>
     <div class="comment__text">
    <?php comment_text(); ?>
  </div>
  <div class="reply">
    <?php $reply_args = array(
      'reply_text' => '
        <nav class="comment__actions">
         <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
           <i class="material-icons" role="presentation">reply</i>
           <span class="visuallyhidden">reply comment</span>
         </button>
       </nav>
     ');

    comment_reply_link( array_merge( $reply_args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
  </div>

<?php }

// Add @ reply.
function comment_add_at( $comment_text, $comment = '') {
  if ( $comment->comment_parent > 0) {
    $comment_text = '@<a href="#comment-' . $comment->comment_parent . '">'.get_comment_author( $comment->comment_parent ) . '</a> ' . $comment_text;
  }

  return $comment_text;
}

add_filter( 'comment_text' , 'comment_add_at', 20, 2 );

// Add theme support.

// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
  $content_width = 900;

// Register Theme Features
function theme_features()  {

  // Add theme support for Automatic Feed Links
  add_theme_support( 'automatic-feed-links' );

  // Add theme support for Post Formats
  add_theme_support( 'post-formats', array( 'status', 'quote' ) );

  // Add theme support for Featured Images
  add_theme_support( 'post-thumbnails' );

  // Add theme support for Custom Background
  $background_args = array(
    'default-color'          => '',
    'default-image'          => get_template_directory_uri() . '/images/bg.jpg',
    'default-repeat'         => 'no-repeat',
    'default-position-x'     => '',
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
  );

  add_theme_support( 'custom-background', $background_args );

  // Add theme support for Custom Header
  $header_args = array(
    'default-image'          => false,
    'width'                  => 0,
    'height'                 => 0,
    'flex-width'             => false,
    'flex-height'            => false,
    'uploads'                => false,
    'random-default'         => false,
    'header-text'            => true,
    'default-text-color'     => '#ffffff',
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
  );

  add_theme_support( 'custom-header', $header_args );

  // Add theme support for HTML5 Semantic Markup
  add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

  // Add theme support for document Title tag
  add_theme_support( 'title-tag' );

  // Add theme support for nav.
  add_theme_support( 'nav-menus' );

  // Add theme support for custom CSS in the TinyMCE visual editor
  add_editor_style();

  // Add theme support for Translation
  load_theme_textdomain( 'iscream', get_template_directory() . '/language' );
}

add_action( 'after_setup_theme', 'theme_features' );

// Remove unnecessary funcions in wp_head().
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Remove replytocom.
function add_nofollow($link, $args, $comment, $post){
  return preg_replace( '/href=\'(.*(\?|&)replytocom=(\d+)#respond)/', 'href=\'#comment-$3', $link );
}

add_filter( 'comment_reply_link', 'add_nofollow', 420, 4 );

// Custom search form.
function my_search_form( $form ) {
  $form = '
  <form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
      <label class="mdl-button mdl-js-button mdl-button--icon" for="s">
        <i class="material-icons">search</i>
      </label>
      <div class="mdl-textfield__expandable-holder">
        <input class="mdl-textfield__input" placeholder="Search..." type="text" value="' . get_search_query() . '" name="s" id="s" />
        <label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
      </div>
    </div>
  </form>
  ';

  return $form;
}

add_filter( 'get_search_form', 'my_search_form' );
