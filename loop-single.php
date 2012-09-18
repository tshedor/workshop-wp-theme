<article class="post" id="<?php the_ID(); ?>">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h1><?php the_title(); ?></h1></a>
				<div class="entry">
				<?php the_content(); ?>
			</div>
				<?php echo get_the_date('M. j, Y') ?> | <?php the_category(', '); ?> | <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
				<hr />
</article>