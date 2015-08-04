<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

  <header>
    <?php
      the_archive_title( '<h1 class="page-title">', '</h1>' );
      the_archive_description( '<div class="taxonomy-description">', '</div>' );
    ?>
  </header>

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
    <a href="<?php echo get_previous_posts_page_link(); ?>" class="nav__button">
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