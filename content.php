<?php
  $classes = array(
    'mdl-card',
    'mdl-cell',
    'mdl-cell--12-col',
  );
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?> <?php if ( !has_post_thumbnail( $post->ID ) ) : ?>style="min-height: auto;"<?php endif; ?>>
  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
  <div class="mdl-card__media mdl-color-text--grey-50" <?php post_class( $classes ); ?> onclick="location.href='<?php the_permalink(); ?>';" style="<?php if ( !has_post_thumbnail( $post->ID ) ) : ?>height: auto; text-shadow: none;<?php else : ?>background: linear-gradient(to bottom,rgba(0,0,0,0),rgba(0,0,0,.5)),url(<?php echo $image[0]; ?>) 50%;<?php endif; ?>">
    <a class="title" href="<?php the_permalink(); ?>"><h3 class="post-title"><?php echo get_the_title(); ?></h3></a>
  </div>
  <div class="mdl-color-text--grey-600 mdl-card__supporting-text entry">
    <?php the_content(); ?>
  </div>
  <div class="mdl-card__supporting-text meta mdl-color-text--grey-600">
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
  </div>
</div>