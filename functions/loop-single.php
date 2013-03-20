<div class="row-fluid clearfix">
	<div class="span8">
		<article class="post" id="<?php the_ID(); ?>">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h1><?php the_title(); ?></h1></a>
			<div class="entry clearfix">
				<?php the_content(); ?>
			</div>
			<?php if(!is_page()){ ?>
			<div class="entry-meta clearfix">
				<?php echo get_the_date('M. j, Y') ?> / <?php the_category(', '); ?> / <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?> / By <?php the_author_posts_link(); ?>
			</div>
			<?php } ?>
			<hr />
		</article>
		<div id="comment-area">
			<?php comments_template() ?>
		</div>
	</div>
	<div class="related-bar">
		<?php $related = get_the_terms($post->ID, 'related_tag');
		if($related){
			foreach($related as $p) :
				echo '<div class="related" data-role="related" data-target="'.str_replace(' ','',$p->name).'" data-post="'.get_the_ID().'">
			<h2>Curious?</h2><ul>';
			$q9 = new WP_Query('related_tag='.$p->slug.'&post_type=related&showposts=-1'); if($q9->have_posts()) : while($q9->have_posts()) : $q9->the_post(); $c = get_post_custom();
				echo '<li><a href="'.$c['related_url'][0].'" title="'.get_the_title().'" target="_blank">'.get_the_title().' ['.$c['related_source'][0].']</a></li>';
			endwhile; endif; wp_reset_query();
			echo '</ul></div>';
			endforeach;
		} ?>

	</div>
</div>
