<?php
$action = isset($action)? $action : '';
if ( isset($_GET['message']) )
	$_GET['message'] = (int)$_GET['message'];
$messages[1] = sprintf( __( 'Post updated. Continue editing below or <a href="%s">go back</a>.' ), attribute_escape( stripslashes( $_GET['_wp_original_http_referer'] ) ) );
$messages[2] = __('Custom field updated.');
$messages[3] = __('Custom field deleted.');
$messages[4] = __('Post updated.');
?>
<?php if (isset($_GET['message'])) : ?>
<div id="message" class="updated fade"><p><?php echo $messages[$_GET['message']]; ?></p></div>
<?php endif; ?>

<form name="post" action="post.php" method="post" id="post">
<?php if ( (isset($mode) && 'bookmarklet' == $mode) || isset($_GET['popupurl']) ): ?>
<input type="hidden" name="mode" value="bookmarklet" />
<?php endif; ?>

<div class="wrap">
<h2><?php _e('Edit Post','wap') ?></h2>
<?php

if (!isset($post_ID) || 0 == $post_ID) {
	$form_action = 'post';
	$temp_ID = -1 * time(); // don't change this formula without looking at wp_write_post()
	$form_extra = "<input type='hidden' id='post_ID' name='temp_ID' value='$temp_ID' />";
	wp_nonce_field('add-post');
} else {
	$post_ID = (int) $post_ID;
	$form_action = 'editpost';
	$form_extra = "<input type='hidden' id='post_ID' name='post_ID' value='$post_ID' />";
	wp_nonce_field('update-post_' .  $post_ID);
}

$form_pingback = '<input type="hidden" name="post_pingback" value="' . (int) get_option('default_pingback_flag') . '" id="post_pingback" />';

$form_prevstatus = '<input type="hidden" name="prev_status" value="' . attribute_escape( $post->post_status ) . '" />';

$form_trackback = '<input type="text" name="trackback_url" style="width: 415px" id="trackback" tabindex="7" value="'. attribute_escape( str_replace("\n", ' ', $post->to_ping) ) .'" />';

if ('' != $post->pinged) {
	$pings = '<p>'. __('Already pinged:') . '</p><ul>';
	$already_pinged = explode("\n", trim($post->pinged));
	foreach ($already_pinged as $pinged_url) {
		$pings .= "\n\t<li>" . wp_specialchars($pinged_url) . "</li>";
	}
	$pings .= '</ul>';
}

$saveasdraft = '<input name="save" type="submit" id="save" class="button" tabindex="3" value="' . attribute_escape( __('Save and Continue Editing') ) . '" />';

?>

<input type="hidden" id="user-id" name="user_ID" value="<?php echo (int) $user_ID ?>" />
<input type="hidden" id="hiddenaction" name="action" value="<?php echo $form_action ?>" />
<input type="hidden" id="originalaction" name="originalaction" value="<?php echo $form_action ?>" />
<input type="hidden" name="post_author" value="<?php echo attribute_escape( $post->post_author ); ?>" />
<input type="hidden" id="post_type" name="post_type" value="<?php echo $post->post_type ?>" />
<input type="hidden" id="original_post_status" name="original_post_status" value="<?php echo $post->post_status ?>" />
<input name="referredby" type="hidden" id="referredby" value="<?php
if ( !empty($_REQUEST['popupurl']) )
	echo clean_url(stripslashes($_REQUEST['popupurl']));
else if ( url_to_postid(wp_get_referer()) == $post_ID && strpos( wp_get_referer(), '/wp-admin/' ) === false )
	echo 'redo';
else
	echo clean_url(stripslashes(wp_get_referer()));
?>" />
<?php if ( 'draft' != $post->post_status ) wp_original_referer_field(true, 'previous'); ?>

<?php echo $form_extra ?>

<div id="poststuff">

<div id="post-body">

<!-- 标题 -->
<div id="titlediv">
<h3><?php _e('Title','wap') ?></h3>
<div id="titlewrap">
	<input type="text" name="post_title" size="22" tabindex="1" value="<?php echo attribute_escape($post->post_title); ?>" id="title" autocomplete="off" />
</div>

</div>

<!-- 内容 -->
<div>
    <h3><?php _e('Content','wap') ?></h3>
    <?php
     $rows = get_option('default_post_edit_rows');
     if (($rows < 3) || ($rows > 100)) {
         $rows = 10;
     }
    ?>
	<script language="javascript">
		function outTagBR(){
			var eContent = document.getElementById("content");
			eContent.innerHTML += "&lt;br&gt;";
		}
	</script>
    <div><div class="stamp">HTML</div>
	<div><input type="button" onclick="javascript:outTagBR();" value="<?php _e('Insert a Blank Line','wap') ?>" /><div>
	<textarea rows="5" cols="20" name="content" tabindex="2" id="content"><?php echo $post->post_content ?></textarea></div>
</div>


<?php echo $form_pingback ?>
<?php echo $form_prevstatus ?>

<div id="tagsdiv" class="postbox">
<h3><?php _e('Tags','wap'); ?></h3>
<div class="inside">
<p id="jaxtag"><input type="text" name="tags_input" class="tags-input" id="tags-input" size="22" tabindex="3" value="<?php echo get_tags_to_edit( $post_ID ); ?>" /></p>
<div id="tagchecklist"></div>
</div>
</div>

<div id="categorydiv" class="postbox">
    <h3><?php _e('Categories','wap') ?></h3>
    <div class="inside">
        <div id="categories-all" class="ui-tabs-panel">
            <ul id="categorychecklist" class="list:category categorychecklist form-no-clear">
                <?php dropdown_categories(); ?>
            </ul>
        </div>
    </div>
</div>

<!-- 评论选项 -->
<div>
<h3 class="dbx-handle"><?php _e('Discussion','wap') ?></h3>
<div class="dbx-content">
<input name="advanced_view" type="hidden" value="1" />
<label for="comment_status" class="selectit">
<input name="comment_status" type="checkbox" id="comment_status" value="open" <?php checked($post->comment_status, 'open'); ?> />
<?php _e('Allow Comments','wap') ?></label>
<label for="ping_status" class="selectit"><input name="ping_status" type="checkbox" id="ping_status" value="open" <?php checked($post->ping_status, 'open'); ?> /> <?php _e('Allow Pings','wap') ?></label>
</div>
</div>

<div class="submitbox" id="submitpost">

<div class="inside">

<p><h3 class="dbx-handle"><?php _e('Publish Status','wap') ?></h3></p>
<p>
<select name='post_status' tabindex='4'>
<?php if ( current_user_can('publish_posts') ) : // Contributors only get "Unpublished" and "Pending Review" ?>
<option<?php selected( $post->post_status, 'publish' ); selected( $post->post_status, 'private' );?> value='publish'><?php _e('Published','wap') ?></option>
<?php if ( 'future' == $post->post_status ) : ?>
<option<?php selected( $post->post_status, 'future' ); ?> value='future'><?php _e('Scheduled') ?></option>
<?php endif; ?>
<?php endif; ?>
<!--<option<?php selected( $post->post_status, 'pending' ); ?> value='pending'><?php _e('Pending Review') ?></option>-->
<option<?php selected( $post->post_status, 'draft' ); ?> value='draft'><?php _e('Unpublished','wap') ?></option>
</select>
</p>

</div>

<p class="submit">
<input type="submit" name="save" id="save-post" value="<?php _e('Save','wap'); ?>" tabindex="4" class="button button-highlighted" />
<?php
if ( !in_array( $post->post_status, array('publish', 'future') ) || 0 == $post_ID ) {
?>
<?php if ( current_user_can('publish_posts') ) : ?>
	<input name="publish" type="submit" class="button" id="publish" tabindex="5" accesskey="p" value="<?php _e('Publish','wap') ?>" />
<?php else : ?>
	<input name="publish" type="submit" class="button" id="publish" tabindex="5" accesskey="p" value="<?php _e('Submit for Review','wap') ?>" />
<?php endif; ?>
<?php
}

echo "&nbsp;<a class='submit' href='post.php?action=append&post=$post_ID'>" . __('Append post','wap') . "</a>";

if ( ( 'edit' == $action) && current_user_can('delete_post', $post_ID) )
{    
	echo "&nbsp;<a class='submitdelete' href='post.php?deletepost=true&post=$post_ID'>" . __('Delete post','wap') . "</a>";
}
if ( 'publish' == $post->post_status ) { ?>&nbsp;<a href="<?php echo clean_url(_get_permalink($post->ID)); ?>" target="_blank" tabindex="4"><?php _e('View this Post','wap'); ?></a>
<?php } ?>

<br class="clear" />
<?php if ($post_ID): ?>
<span class="stamp">
<?php if ( $last_id = get_post_meta($post_ID, '_edit_last', true) ) {
	$last_user = get_userdata($last_id);
	printf(__('Last edited by %1$s on %2$s at %3$s','wap'), wp_specialchars( $last_user->display_name ), mysql2date(get_option('date_format'), $post->post_modified), mysql2date(get_option('time_format'), $post->post_modified));
} else {
	printf(__('Last edited on %1$s at %2$s','wap'), mysql2date(get_option('date_format'), $post->post_modified), mysql2date(get_option('time_format'), $post->post_modified));
}
?>
</span>
<br class="clear" />
<?php endif; ?>
<span id="autosave"></span>
</p>



</div>

</form>

<?php if ((isset($post->post_title) && '' == $post->post_title) || (isset($_GET['message']) && 2 > $_GET['message'])) : ?>
<script type="text/javascript">
try{document.post.title.focus();}catch(e){}
</script>
<?php endif; ?>
