<?php
if ( function_exists('register_sidebar') ) {
register_sidebar(array(
'name' => 'Bottom',
'id' => 'bottom',
'before_widget' => '<div class="span3"><div class="widget">',
'after_widget' => '</div></div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
register_sidebar(array(
'name' => 'Right',
'id' => 'right',
'before_widget' => '<div class="widget">',
'after_widget' => '</div>',
'before_title' => '<h2>',
'after_title' => '</h2>',
));
}
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : endif;