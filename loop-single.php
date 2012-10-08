<div class="row-fluid clearfix">
	<div class="span8">
		<article class="post" id="<?php the_ID(); ?>">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h1><?php the_title(); ?></h1></a>
			<div class="entry clearfix">
				<?php the_content(); ?>
			</div>
			<?php if(!is_page()){ ?>
			<div class="entry-meta clearfix">
				<?php echo get_the_date('M. j, Y') ?> / <?php the_category(', '); ?> / <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
			</div>
			<?php } ?>
			<hr />
		</article>
		<div id="comment-area">
			<?php comments_template() ?>
		</div>
	</div>
	<div class="possum-bar"></div>
</div>
