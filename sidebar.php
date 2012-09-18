	<div class="span4" id="right-sidebar">
        <div class="single_sb_ad">
		<?php global $post; $pid = $post->ID; $tags = wp_get_post_tags($post->ID);?>
        <?php if( get_cat_id( single_cat_title("",false)) == get_option('udk_news_cat')) {
            echo stripslashes(get_option('udk_ad_news_bigbox'));
        } elseif (get_cat_id( single_cat_title("",false)) == get_option('udk_sports_cat')) {
            echo stripslashes(get_option('udk_ad_sports_bigbox'));
        } elseif (get_cat_id( single_cat_title("", false)) == get_option('udk_entertainment_cat') || get_cat_id( single_cat_title("", false)) == get_option('udk_opinion_cat')) {
            echo stripslashes(get_option('udk_ad_freeforall_bigbox'));
        } else {
            echo stripslashes(get_option('udk_ad_bigbox'));
        }  ?>
        </div>
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <?php if(is_single() && (has_tag())) { ?><li><a href="#related" data-toggle="tab">Related</a></li><?php } ?>
                <?php if(!is_page()){ ?><li><a href="#recent" data-toggle="tab">Recent</a></li><?php } ?>
                <?php if(is_single()) { ?>
                <li><a href="#author_box" data-toggle="tab">Author</a></li>
                <li><a href="#comments_box" data-toggle="tab">Comments</a></li>
                <?php } ?>
            </ul>
            <div class="tab-content">
                <?php if((is_single()) && (!is_page()) && (has_tag())) { ?>
                <div class="tab-info" id="related">
                    <ul class="tabbed-widget-listings">
                        <?php  if ($tags) { $first_tag = $tags[0]->term_id; $args=array( 'tag__in' => array($first_tag), 'post__not_in' => array($post->ID), 'showposts'=>5, ); $my_query = new WP_Query($args);
                                if( $my_query->have_posts() ) : while ($my_query->have_posts()) : $my_query->the_post();
                                    get_template_part('loop', 'widget');
                                endwhile; endif; wp_reset_query();
                            } ?>
                    </ul>
                </div>
                <?php } if(!(is_page())){ ?>
                <div class="tab-info" id="recent">
                    <ul class="tabbed-widget-listings">
                        <?php $category = get_the_category($pid);
                        $string = 'cat='.$category[0]->term_id.'&showposts=5';
                        query_posts($string); if (have_posts()) : while (have_posts()) : the_post();
                            get_template_part('loop', 'widget');
                        endwhile; endif; wp_reset_query(); ?>
                    </ul>
                </div>
                <?php } if(is_single()){ ?>
                <div class="tab-info" id="author_box">
                    <ul class="tabbed-widget-listings">
                        <?php global $post; query_posts('author='.get_the_author_meta('ID').'&showposts=5'); if (have_posts()) : while (have_posts()) : the_post();
                            get_template_part('loop', 'widget');
                        endwhile; endif; wp_reset_query(); ?>
                    </ul>
                </div>
                <div class="tab-info" id="comments_box">
                    <?php $comments = get_comments( array('post_id' => $pid));
                    if($comments) :
                    foreach ($comments as $comment){ ?>
                    <div class="comment">
                        <div class="comment-meta">
                            <?php echo get_avatar( $comment, 38 ); ?>
                            <h3 class="comment-author"><?php comment_author_link() ?></h3>
                            <h3 class="comment-date"><?php comment_date('M. j, Y') ?><?php comment_time() ?></h3>
                        </div>
                            <div class="comment-text">
                                <?php echo $comment->comment_content; ?>
                            </div>
                        </div>
                   <?php } else : 
                        echo '<div class="comment">
                        <div class="comment-text">No comments yet. <a href="#comments">Start the conversation</a>.</div></div>';
                        endif; ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="tabbable">
            <ul class="nav nav-tabs2">
                <li><a href="#most_viewed" data-toggle="tab">Most Viewed</a></li>
                <li><a href="#most_discussed" data-toggle="tab">Most Discussed</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-info2" id="most_viewed">
                    <ul class="tabbed-widget-listings">
                        <?php query_posts('meta_key=post_views_count&orderby=meta_value_num&order=DESC&showposts=5&w='.date('W')); if (have_posts()) : while (have_posts()) : the_post();
                            get_template_part('loop', 'widget');
                        endwhile; endif; wp_reset_query(); ?>
                    </ul>
                </div>
                <div class="tab-info2" id="most_discussed">
                    <ul class="tabbed-widget-listings">
                        <?php query_posts('orderby=comment_count&showposts=5&w='.date('W')); if (have_posts()) : while (have_posts()) : the_post();
                            get_template_part('loop', 'widget');
                        endwhile; endif; wp_reset_query(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="widget">
            <!--/*  <div class="widget-title">
                <span>Scores</span>
            </div>
            <div class="widget-content">
              <table class="sports-scores">
                    <tbody>
                        <tr>
                            <td>Men's Basketball</td>
                            <td>@K-State</td>
                            <td>87-90</td>
                            <td>Feb. 9</td>
                        </tr>
                        <tr>
                            <td>Men's Basketball</td>
                            <td>@K-State</td>
                            <td>87-90</td>
                            <td>Feb. 9</td>
                        </tr>
                        <tr>
                            <td>Men's Basketball</td>
                            <td>@K-State</td>
                            <td>87-90</td>
                            <td>Feb. 9</td>
                        </tr>
                        <tr>
                            <td>Men's Basketball</td>
                            <td>@K-State</td>
                            <td>87-90</td>
                            <td>Feb. 9</td>
                        </tr>
                    </tbody>
                </table> */-->
            </div>
        </div>
	<?php dynamic_sidebar( 'Right'); ?> 
</div>