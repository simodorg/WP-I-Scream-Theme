<div class="mdl-card__supporting-text comments">

  <?php

    $comments_args = array(
      'id_form'           => 'commentform',
      'id_submit'         => 'submit',
      'class_submit'      => 'submit',
      'name_submit'       => 'submit',
      'title_reply'       => __( 'Leave a Reply' ),
      'title_reply_to'    => __( 'Leave a Reply to %s' ),
      'cancel_reply_link' => __( '
        <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
          <i class="material-icons" role="presentation">clear</i>
          <span class="visuallyhidden">cancel reply</span>
        </button>' ),
      'label_submit'      => __( 'Post Comment' ),
      'format'            => 'xhtml',
      'must_log_in' => '',
      'logged_in_as' => '',
      'comment_notes_before' => '',
      'comment_notes_after' => '',
    
      'comment_field' =>  '
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <textarea class="mdl-textfield__input" id="comment" name="comment" rows="1" aria-required="true" required="required"></textarea>
          <label for="comment" class="mdl-textfield__label">Join the discussion</label>
        </div>',
    
      'fields' => '
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input id="author" class="mdl-textfield__input" name="author" type="text" value="" aria-required="true" required="required" />
          <label class="mdl-textfield__label" for="author">Name</label> <span class="required">*</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input id="email" class="mdl-textfield__input" name="email" type="text" value="" aria-required="true" required="required" />
          <label class="mdl-textfield__label" for="email">Email</label> <span class="required">*</span>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <input id="url" class="mdl-textfield__input" name="url" type="text" value="" />
          <label class="mdl-textfield__label" for="url">Website</label>
        </div>',
    );
    
    comment_form($comments_args);

    wp_list_comments( 'type=comment&callback=mytheme_comment' );

  ?>

</div>