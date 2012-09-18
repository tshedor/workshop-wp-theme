<article class="post" id="<?php the_ID(); ?>">
				<?php get_the_image(array('size' => 'medium', 'image_class' => 'pull-left')); ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h1><?php the_title(); ?></h1></a>
				<div class="entry">
				<?php the_content(); ?>
			</div>
				<?php the_category(', '); ?> | <?php the_tags('',', '); ?> | <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
				<hr />
</article>