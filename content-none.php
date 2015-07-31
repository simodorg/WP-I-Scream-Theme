<div class="mdl-card mdl-cell mdl-cell--12-col">
  <div class="mdl-card__media mdl-color-text--grey-50">
    <h3><?php _e( 'Nothing Found' ); ?></h3>
  </div>
  <div class="mdl-color-text--grey-600 mdl-card__supporting-text entry">
    <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
      <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
    <?php elseif ( is_search() ) : ?>
      <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.' ); ?></p>
    <?php get_search_form(); ?>
      <?php else : ?>
    <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.' ); ?></p>
      <?php get_search_form(); ?>
    <?php endif; ?>
  </div>
</div>