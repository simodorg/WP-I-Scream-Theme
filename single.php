<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <div class="mdl-card__media mdl-color-text--grey-50" <?php post_class( $classes ); ?> onclick="location.href='<?php the_permalink(); ?>';" style="<?php if ( !has_post_thumbnail( $post->ID ) ): ?>height: auto; text-shadow: none;<?php else : ?>background: linear-gradient(to bottom,rgba(0,0,0,0),rgba(0,0,0,.5)),url(<?php echo $image[0]; ?>) 50%; background-size: cover<?php endif; ?>">
    <a class="title" href="<?php the_permalink(); ?>"><?php the_title( '<h3 class="post-title">', '</h3>' ); ?></a>
  </div>
  <div class="mdl-color-text--grey-700 mdl-card__supporting-text meta">
    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><div class="minilogo"></div></a>
    <div>
      <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><strong><?php echo get_the_author_link(); ?></strong></a>
      <span><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
    </div>
    <div class="post-meta">
      <div class="post-category">
        <i class="material-icons" role="presentation">chevron_right</i>
        <span class="visuallyhidden">chevron_right</span>
        <?php the_category(', '); ?>
      </div>
      <div class="post-tags">
        <i class="material-icons" role="presentation">local_offer</i>
        <span class="visuallyhidden">local_offter</span>
        <?php the_tags( '', ', ', '' ); ?>
      </div>
    </div>
    <div class="section-spacer"></div>
    <?php if ( function_exists( 'the_views' ) ) { ?>
      <div class="meta__views">
        <?php the_views();  ?>
        <i class="material-icons" role="presentation">visibility</i>
        <span class="visuallyhidden">visibility</span>
      </div>
    <?php } ?>
  </div>
  <div class="mdl-color-text--grey-700 mdl-card__supporting-text entry">
    <?php the_content(); ?>
    <?php wp_link_pages(); ?>
  </div>

  <?php
    if ( comments_open() || get_comments_number() ) :

    	comments_template();

    endif;

    endwhile;
  ?>
</div>

<nav class="nav mdl-cell mdl-cell--12-col">
  <?php if ( get_next_post() ) { ?>
    <a href="<?php echo get_permalink( get_adjacent_post( false, '', false ) ); ?>" class="nav__button">
      <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
        <i class="material-icons" role="presentation">arrow_back</i>
      </button>
      Newer
    </a>
  <?php } if ( get_previous_post() ) { ?>
    <div class="section-spacer"></div>
    <a href="<?php echo get_permalink( get_adjacent_post( false, '', true ) ); ?>" class="nav__button">
      Older
      <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
        <i class="material-icons" role="presentation">arrow_forward</i>
      </button>
    </a>
  <?php } ?>
</nav>

<?php get_footer(); ?>