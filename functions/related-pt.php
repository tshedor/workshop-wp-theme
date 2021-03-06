<?php
add_action('init', 'related_register');
function related_register() {
	$labels = array(
		'name' => _x('Relateds', 'post type general name'),
		'singular_name' => _x('Related Link', 'post type singular name'),
		'add_new' => _x('Add New Link', 'related item'),
		'add_new_item' => __('Add New Related Link'),
		'edit_item' => __('Edit Related Link'),
		'new_item' => __('New Related Link'),
		'view_item' => __('View Related Link'),
		'search_items' => __('Search Related Links'),
		'not_found' =>	__('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array('title')
		);

	register_post_type( 'related' , $args );

	register_taxonomy("related_tag", array("related", "post"), array("hierarchical" => false, "label" => "Related Tags", "singular_label" => "Related Tag", "rewrite" => true));
add_action("init", "admin_init");

register_post_type( 'related' , $args );
	flush_rewrite_rules();
}
function add_related_meta_box() {
	add_meta_box(
	'related_meta_box', // $id
	'Related Information', // $title
	'show_related_meta_box', // $callback
	'related', // $page
	'normal', // $context
	'core'); // $priority
}
add_action('add_meta_boxes', 'add_related_meta_box');
// Field Array
$prefix = 'related_';
$related_meta_fields = array(
	array(
		'label'	=> 'Related URL',
		'desc'	=> '',
		'id'	=> $prefix.'url',
		'type'	=> 'text'
	),
	array(
		'label'	=> 'Source Site Name',
		'desc'	=> '',
		'id'	=> $prefix.'source',
		'type'	=> 'text'
	),
);

function show_related_meta_box() {
	global $related_meta_fields, $post;
	// Use nonce for verification
	 wp_nonce_field( basename( __FILE__ ), 'related_meta_box_nonce' );
	// Begin the field table and loop
	echo '<table class="form-table">';
	echo '<script src="'.get_template_directory_uri().'/functions/admin_fields.js"></script>';
	foreach ($related_meta_fields as $field) {
		// get value of this field if it exists for this post
		$meta = get_post_meta($post->ID, $field['id'], true);
		// begin a table row with
		echo '<tr>';
				switch($field['type']) {
					case 'text' :
						echo '<td class="label">'.$field['label'].'</td>
							<td class="cell"><input name="'.$field['id'].'" type="text" placeholder="'.$field['label'].'" value="'.$meta.'" /></td>
						<td class="desc">'.$field['desc'].'</td>';
					break;
				}
		echo '</tr>';
	} // end foreach
	echo '</table>'; // end table
}
// Save the Data
function save_related_meta($post_id) {
	global $related_meta_fields;

	// verify nonce
	if ( !isset( $_POST['related_meta_box_nonce'] )  || !wp_verify_nonce($_POST['related_meta_box_nonce'], basename(__FILE__)))
		return $post_id;
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return $post_id;
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return $post_id;
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
	}

	// loop through fields and save the data
	foreach ($related_meta_fields as $field) {
		if($field['type'] == 'tax_select') continue;
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	} // enf foreach

}
add_action('save_post', 'save_related_meta');

?>