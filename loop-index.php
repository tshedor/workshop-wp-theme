<div class="home_article">
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<?php get_the_image( array( 'size' => 'medium', 'image_class' => 'home_feature', 'echo' => true, 'default_image' => false ) ); ?>
	</a>
	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		<h3 class="title"><?php the_title(); ?> <span class="date meta_home"></span></h3>
	</a>
	<div class="excerpt"><?php $c = strip_shortcodes(strip_tags(get_the_content())); echo substr($c, 0, 200) . "..." ?></div>
	<div class="row-fluid" id="meta_home">
			<span class="comments"><a href="<?php the_permalink() ?>#comments" title="<?php the_title(); ?> Comments"><?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?></a></span>
			<!--/* <span class="share">Share</span> */-->
			<span class="author">By <?php the_author_posts_link(); ?></span>
			<a href="http://kansan.com/<?php echo get_the_date('Y/m/d') ?>" title="Articles from <?php echo get_the_date('M j'); ?>" class="date-link"><span class="date"><?php echo get_the_date('M j'); ?></span></a>
	</div>
</div>
