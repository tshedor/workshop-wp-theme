<?php
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'archive_thumb', 261, 250, true ); 
	add_image_size( 'feat_home', 360, 200, true ); 
}
