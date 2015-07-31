<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
  <div class="mdl-card__media mdl-color-text--grey-50">
    <a class="title" href="<?php the_permalink(); ?>"><?php the_title( '<h3>', '</h3>' ); ?></a>
  </div>
  <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><div class="minilogo"></div></a>
    <div>
      <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><strong><?php echo get_the_author_link(); ?></strong></a>
      <span><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
    </div>
    <div class="section-spacer"></div>
    <div class="meta__views">
      <?php if ( function_exists( 'the_views' ) ) { the_views(); } ?>
      <i class="material-icons" role="presentation">person</i>
      <span class="visuallyhidden">person</span>
    </div>
  </div>
  <div class="mdl-color-text--grey-700 mdl-card__supporting-text">
    <?php the_content(); ?>
  </div>

  <?php
    if ( comments_open() || get_comments_number() ) :

    	comments_template();

    endif;

    endwhile;
  ?>
</div>

<nav class="nav mdl-cell mdl-cell--12-col">
  <?php if ( get_next_post() ) : ?>
  <a href="<?php echo get_previous_posts_page_link();; ?>" class="nav__button">
    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
      <i class="material-icons" role="presentation">arrow_back</i>
    </button>
    Newer
  </a>
  <?php elseif ( get_previous_post() ) : ?>
  <div class="section-spacer"></div>
  <a href="<?php echo get_next_posts_page_link(); ?>" class="nav__button">
    Older
    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
      <i class="material-icons" role="presentation">arrow_forward</i>
    </button>
  </a>
  <?php endif; ?>
</nav>

<?php get_footer(); ?>