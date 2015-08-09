<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?>">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png ">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="blog <?php if ( is_singular() ) { ?>blog--blogpost<?php } ?> mdl-layout mdl-js-layout has-drawer is-upgraded">
      <main class="mdl-layout__content">
        <?php if ( is_singular() ) { ?>
          <div class="back">
            <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" href="<?php echo esc_url( home_url() );  ?>" title="go back" role="button">
              <i class="material-icons" role="presentation">arrow_back</i>
            </a>
          </div>
        <?php } else { ?>
          <header>
            <h1 class="blog__title"><a href="<?php echo esc_url( home_url() );  ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <p class="blog__description"><?php bloginfo( 'description' ); ?></p>
          </header>
        <?php } ?>
        <div class="blog__posts mdl-grid">
          <?php if ( !is_singular() ) { ?>
            <div class="mdl-card mdl-cell mdl-cell--8-col top">
              <div class="mdl-card__media mdl-color-text--grey-50 info">
                <i class="material-icons" role="presentation">https</i>
                <span class="visuallyhidden">https</span>
                <p>This site has enabled full site SSL connection, your connection to it is encrypted.</p>
                <i class="material-icons" role="presentation">closed_caption</i>
                <span class="visuallyhidden">closed_caption</span>
                <p>The original posts are licensed under a <a rel="license" href="https://creativecommons.org/licenses/by-nc-sa/4.0/">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>.</p>
              </div>
              <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
                <i class="material-icons" role="presentation">chevron_right</i>
                <span class="visuallyhidden">chevron_right</span>
                <a href="<?php bloginfo( 'rss2_url' ); ?>">Subscribe to this site via RSS to get the newiest post.</a>
              </div>
            </div>
            <div class="mdl-card mdl-cell mdl-cell--8-col mdl-cell--4-col-desktop top author">
              <a href="<?php echo esc_url( home_url() );  ?>">
                <button class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent">
                  <i class="material-icons mdl-color-text--white" role="presentation">refresh</i>
                  <span class="visuallyhidden">refresh</span>
                </button>
              </a>
              <div class="mdl-card__media mdl-color--white mdl-color-text--grey-600">
                <a href="<?php echo esc_url( home_url() );  ?>" rel="home"><?php echo get_avatar( 1, 64 ); ?></a>
                <a href="<?php echo esc_url( home_url() );  ?>" rel="home"><?php the_author_meta( 'display_name', 1 ); ?></a>
              </div>
              <div class="mdl-card__supporting-text meta meta--fill mdl-color-text--grey-600">
                <div>
                  <strong><?php the_author_meta( 'description', 1 ); ?></strong>
                </div>
                <?php wp_nav_menu( array(
                  'theme_location' => 'primary',
                  'menu'           => 'menu',
                  'container'      => false,
                  'menu_class'     => 'mdl-menu mdl-js-menu mdl-menu--bottom-right',
                  'items_wrap'     => '<ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="menubtn">%3$s</ul>'
                 ) ); ?>
                <button id="menubtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                  <i class="material-icons" role="presentation">more_vert</i>
                  <span class="visuallyhidden">show menu</span>
                </button>
              </div>
            </div>
          <?php } ?>