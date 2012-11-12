<?php

add_editor_style();

function register_custom_menu() {
register_nav_menu('footer_menu', __('Footer Links'));
register_nav_menu('top_menu', __('Main Navigation'));
register_nav_menu('global_menu', __('Global Navigation'));
} 
add_action( 'init', 'register_custom_menu' );

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'archive_thumb', 261, 250, true ); 
    add_image_size( 'feat_home', 360, 200, true ); 
}

function example_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'just_code' => 'false',
        'lang' => 'markup',
    ), $atts ) );
    $code = strip_tags($content, '<!doctype><a><img><div><body><html><head><script><style><h1><h2><h3><h4><h5><h6><hr><video><audio><ul><ol><li><table><tbody><tr><td><th><link><strong><em><code><pre><span><embed><b><i><dd><dt><dl><blockquote><header><footer><article><aside><form><input><textarea><button><section><address><cite><embed><object>');
    $code = str_replace('<p>', '', $code);
    $code = str_replace('</p>', '', $code);
    $code = str_replace('<', '&lt;', $code);
    $code = '<pre><code class="language-'.$lang.'">'.$code.'</code></pre>';
    $code_and_example = '<div class="span6 code-block">'.$content.'</div><div class="span6">'.$code.'</div>';
    if($just_code == 'true'){
        return '<div class="row-fluid clearfix"><div class="span12 full-code">'.$code.'</div></div>';
    } else {
        return '<div class="row-fluid example-row clearfix">'.$code_and_example.'</div>';
    }
}
add_shortcode( 'example', 'example_shortcode' );

function possum_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'target' => '',
    ), $atts ) );
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $target);
    $clean = strtolower(trim($clean, '_'));
    $clean = preg_replace("/[\/_|+ -]+/", '_', $clean);
    $possum = '<div class="possum" data-role="possum" id="'.$clean.'_'.get_the_ID().'">
        <h2>Curious?</h2>'.
        strip_tags($content,'<a><ul><li><img><strong><em>').'
    </div>';
    return $possum;
}
add_shortcode( 'possum', 'possum_shortcode' ); 
function warning_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'bonus' => false,
        'tip' => false,
    ), $atts ) );
    if($bonus){
        $wsc = '<span class="label label-success">Bonus</span>';
    } elseif ($tip) {
        $wsc = '<span class="label label-info">'.esc_attr($tip).'</span>';
    } else {
        $wsc = '<span class="label label-important">Heads up</span>';
    }
    return '<p>'.$wsc.' '.$content.'</p>';
}
add_shortcode( 'warning', 'warning_shortcode' ); 
?>