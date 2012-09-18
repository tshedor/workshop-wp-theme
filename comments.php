<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { ?>
			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
			<?php return;
		}
	}
	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- Start editing here. -->

<?php if ($comments) : ?>
	<h3 class="comment-head"><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h3>

	<ul class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
		
			<div class="comment-meta">
				<?php echo get_avatar( $comment, 38 ); ?>
				<h3 class="comment-author"><?php comment_author_link() ?></h3>
				<h3 class="comment-date">
					<?php comment_date('M. j, Y') ?>
					<?php comment_time() ?>
				</h3>
			<?php //edit_comment_link('edit','&nbsp;&nbsp;',''); ?>
			</div>

			<div class="comment-text">
				<?php if ($comment->comment_approved == '0') : echo "<em>Your comment is awaiting moderation.</em>"; endif; ?>

				<?php comment_text() ?>
			</div>

		</li>

		<?php $oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : ''; ?>

	<?php endforeach; ?>

	</ul>

	<?php else : // this is displayed if there are no comments so far ?>

		<?php if ('open' == $post->comment_status) : ?>

		<?php else : ?>
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h3 class="comment-head">REPLY</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="row-fluid" id="commentform">

<?php if ( $user_ID ) : ?>

	<p class="logged-in">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>

<?php else : ?>

	<p class="clearfix"><label for="author">Name <?php if ($req) echo "(required)"; ?></label> <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /></p>

	<p class="clearfix"><label for="email">Email (will not be shared<?php if ($req) echo ", required"; ?>)</label> <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /></p>

	<p class="clearfix"><label for="url">Website</label> <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></p>

<?php endif; ?>

	<p><textarea name="comment" id="comment" rows="10" tabindex="4" style="width:97%;"></textarea></p>

	<p class="clearfix"><input name="submit" type="submit" id="submit" tabindex="5" class="btn btn-info" value="Submit Comment"  style="float:right; margin-right:5px"/></p>
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; endif; ?>
