<?php

    wp_enqueue_scripts('jquery-ui-datepicker');
    //wp_enqueue_script('jquery-ui-slider');
    wp_enqueue_scripts('custom-js', get_template_directory_uri().'/js/admin-functions.js');
    //wp_enqueue_style('jquery-ui-custom', get_template_directory_uri().'/functions/tuts/css/jquery-ui-custom.css');
add_editor_style();

function register_custom_menu() {
register_nav_menu('footer_menu', __('Footer Links'));
register_nav_menu('top_menu', __('Main Navigation'));
register_nav_menu('global_menu', __('Global Navigation'));
} 
add_action( 'init', 'register_custom_menu' );

require_once locate_template('/functions/view-count.php');
require_once locate_template('/functions/thumbnails.php');

$themename = "University Daily Kansan";
$shortname = "udk_";

$options = array (

array(  "name" => "Lead Story",
        "desc" => "Pick a story from the list to be the dominant story",
        "id" => $shortname."home_feat_story",
        "std" => "",
        "type" => "posts"),

array(  "name" => "Sidekick Story 1",
        "desc" => "Pick a story from the list to feature on the left above all else.",
        "id" => $shortname."sidekick_story_1",
        "std" => "",
        "type" => "posts"),

array(  "name" => "Sidekick Story 2",
        "desc" => "Pick a story from the list to feature on the left below the first one.",
        "id" => $shortname."sidekick_story_2",
        "std" => "",
        "type" => "posts"),

array(  "name" => "Sidekick Story 3",
        "desc" => "Pick a story from the list to feature on the left below the second one.",
        "id" => $shortname."sidekick_story_3",
        "std" => "",
        "type" => "posts"),

array(  "name" => "Photos Category",
        "desc" => "A category that is visually-dominant",
        "id" => $shortname."hero_category_1",
        "std" => "",
        "type" => "categories"),

array(  "name" => "Multimedia Category",
        "desc" => "A category that is features multimedia content",
        "id" => $shortname."hero_category_2",
        "std" => "",
        "type" => "categories"),

array(  "name" => "Editor's Picks Category",
        "desc" => "A category that is features the best of the best",
        "id" => $shortname."hero_category_3",
        "std" => "",
        "type" => "categories"),

array( "name" => "Sitewide",
        "type" => "break",
        "id" => $shortname."break1",
        "std" => ""
     ),

array(  "name" => "Breaking news",
        "desc" => "Pick a story from the list that is breaking news. To deactivate, save options on -Select-.",
        "id" => $shortname."breaking_news_story",
        "std" => "",
        "type" => "posts"),

array(  "name" => "Featured Category",
        "desc" => "The category sitewide that is featured",
        "id" => $shortname."featured_cat",
        "std" => "",
        "type" => "categories"),

array(  "name" => "Opinion Category",
        "desc" => "The category sitewide that is opinion",
        "id" => $shortname."opinion_cat",
        "std" => "",
        "type" => "categories"),

array(  "name" => "News Category",
        "desc" => "The category sitewide that is news",
        "id" => $shortname."news_cat",
        "std" => "",
        "type" => "categories"),

array(  "name" => "Sports Category",
        "desc" => "The category sitewide that is sports",
        "id" => $shortname."sports_cat",
        "std" => "",
        "type" => "categories"),

array(  "name" => "Entertainment Category",
        "desc" => "The category sitewide that is entertainment",
        "id" => $shortname."entertainment_cat",
        "std" => "",
        "type" => "categories"),

array(  "name" => "PDF Category",
        "desc" => "The category sitewide that is PDF",
        "id" => $shortname."pdf_cat",
        "std" => "",
        "type" => "categories"),

array(  "name" => "FFA Category",
        "desc" => "The category sitewide that is Free For All",
        "id" => $shortname."freeforall_cat",
        "std" => "",
        "type" => "categories"),

);

function mytheme_add_admin() {
	global $themename, $shortname, $options;
	foreach ($options as $value) {
		add_option($value['id']);
		if($_POST[$value['id']] && isset($_POST[$value['id']])) {
			update_option( $value['id'], $_POST[ $value['id'] ] ); 
		}
		elseif($_POST[$value['id']] == $value['id']){} 
		else {
			update_option($value['id'], $_POST[$value['id']]);
		}
	}
}

function mytheme_admin() {

    global $themename, $shortname, $options;
	if ( isset($_POST['update_themeoptions']) && $_POST['update_themeoptions'] == 'true' ) { mytheme_add_admin(); }

?>
<style>
td { min-width:20%; vertical-align: top; padding:10px 0px;}
td.desc { width:30%; padding-left:10px;}
td.label { width:20%;}
td.cell { width:45%;}
textarea {width:100%;}
</style>
    <div class="wrap" id="poststuff">
        <h2><?php echo $themename; ?> settings</h2>
        <form method="post">
        <input type="hidden" name="update_themeoptions" value="true" />
        <div class="postbox" style="width:800px">
            <h3 class="hndle">Homepage</h3>
            <div class="inside">
                    <table>
                        <tbody>

<?php foreach ($options as $value) { 
        $meta =  get_option( $value['id'] );
    switch ( $value['type'] ) { 
case 'textareacode': ?>

<tr>
    <td class="label"><?php echo $value['name']; ?></td>
    <td class="cell"><textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="18" rows="5"><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo stripslashes($value['std']); } ?></textarea></td>
    <td class="desc"><?php echo $value['desc']; ?></td>
</tr>

<?php break; case 'textarea': ?>

<tr>
    <td class="label"><?php echo $value['name']; ?></td>
    <td class="cell"><textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="18" rows="5"><?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>
    <td class="desc"><?php echo $value['desc']; ?></td>
</tr>

<?php break; case 'categories': ?>

<tr>
    <td class="label"><?php echo $value['name']; ?></td>
    <td class="cell">
        <select name="<?php echo $value['id']; ?>">
            <option value="">Select One</option>
            <?php $cats = get_categories(); foreach ($cats as $cat) { 
                echo '<option value="'.$cat->cat_ID.'"',($meta == $cat->cat_ID ? 'selected="selected"' : ''). '>' . $cat->cat_name . '</option>';
            } ?>
        </select>
    </td>
    <td class="desc"><?php echo $value['desc']; ?></td>
</tr>

<?php break; case 'posts' ?>

<tr>
    <td class="label"><?php echo $value['name']; ?></td>
    <td class="cell">
        <select name="<?php echo $value['id']; ?>">
            <option value="">Select One</option>
            <?php $rps = wp_get_recent_posts(); foreach ($rps as $recent) { 
                echo '<option value="'.$recent["ID"].'"',($meta == $recent["ID"] ? 'selected="selected"' : ''). '>'.$recent["post_title"].'</option>';
            } ?>
        </select>
    </td>
    <td class="desc"><?php echo $value['desc']; ?></td>
</tr>

<?php break; case 'pages' ?>

<tr>
    <td class="label"><?php echo $value['name']; ?></td>
    <td class="cell">
        <select name="<?php echo $value['id']; ?>">
            <option value="">Select One</option>
            <?php $rp = get_pages(); foreach ($rp as $page) { 
                echo '<option value="'.$page->ID.'"',($meta == $page->ID ? 'selected="selected"' : ''). '>'.$page->post_title.'</option>';
            } ?>
        </select>
    </td>
    <td class="desc"><?php echo $value['desc']; ?></td>
</tr>

<?php break; case 'text' ?>

<tr>
    <td class="label"><?php echo $value['name']; ?></td>
    <td class="cell"><input name="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
    <td class="desc"><?php echo $value['desc']; ?></td>
</tr>

<?php break; case 'break' ?>
    </tbody>
</table>
</div>
</div>
<input type="hidden" name="<?php echo $value['id']; ?>" value="" /> 
<div class="postbox" style="width:800px">
            <h3 class="hndle"><?php echo $value['name']; ?></h3>
            <div class="inside">
                    <table>
                        <tbody>
<?php break; } } ?>
</tbody>
</table>
</div>
</div>
<p class="submit">
    <input name="save" type="submit" value="Save changes" />
    <input type="hidden" name="action" value="save" />
</p>
</form>

</div>
<?php
}

function themeoptions_admin_menu()  {
    $themename = "University Daily Kansan";
    $shortname = "udk_";
    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
add_action('admin_menu', 'themeoptions_admin_menu');

?>