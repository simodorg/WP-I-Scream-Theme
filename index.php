<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

  <?php
    while ( have_posts() ) : the_post();
      get_template_part( 'content', get_post_format() );
    endwhile;

  else :
      get_template_part( 'content', 'none' );
  endif;
?>

<nav class="nav mdl-cell mdl-cell--12-col">
  <?php if ( get_next_post() ) : ?>
    <?php previous_posts_link( '
      <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
        <i class="material-icons"role="presentation">arrow_back</i>
      </button>
      Newer
      ' );
    ?>
  <?php elseif ( get_previous_post() ) : ?>
    <div class="section-spacer"></div>
    <?php next_posts_link( '
      Older
      <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
        <i class="material-icons"role="presentation">arrow_forward</i>
      </button>
      ' );
    ?>
  <?php endif; ?>
</nav>

<?php get_footer(); ?>