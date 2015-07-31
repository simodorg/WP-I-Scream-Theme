<?php get_header(); ?>

<div class="mdl-card mdl-cell mdl-cell--12-col">
  <div class="mdl-card__media mdl-color-text--grey-50">
    <h3><?php _e( 'Oops! That page can&rsquo;t be found.', 'iscream' ); ?></h3>
  </div>
  <div class="mdl-color-text--grey-600 mdl-card__supporting-text entry">
      <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'iscream' ); ?></p>
    <?php get_search_form(); ?>
  </div>
</div>

<?php get_footer(); ?>
