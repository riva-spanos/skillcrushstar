<?php

function emojized_wp_admin_style()
{
	wp_enqueue_style( 'emojized-backend' , plugin_dir_url( __FILE__ ) . 'css/emojized.css');
}

add_action( 'admin_enqueue_scripts', 'emojized_wp_admin_style' );
function emojized_meta_boxes( $post )
{
	add_meta_box(
		'emojized-meta-box',
		__( 'Emojized' ),
		'render_emojized_meta_box',
		'emojize',
		'normal',
		'high'
	);
}

add_action( 'add_meta_boxes', 'emojized_meta_boxes' );

function render_emojized_meta_box()
{
	global $post;
	wp_nonce_field( plugin_basename( __FILE__ ), 'emojized_nonce' );
	echo '<div class="emojized-table">';

	echo '<div class="row">';
	// row start
	echo '<div class="column head">ID</div>';
	echo '<div class="column head">Emoji</div>';
	echo '<div class="column head">Count</div>';
	echo '<div class="column head">Initial Count</div>';
	echo '<div class="column head">Shortcode</div>';
	echo '</div>';
	// row end
	echo '<div class="row">';
	// row start
	echo '<div class="column"><h1>ID : '.$post->ID.'</h1></div>';

	echo '<div class="column">';
	$emoji = get_post_meta($post->ID, 'emoji', true);
	echo '<input name="emoji" type="text" class="emoji" value="' .esc_attr($emoji). '" /></div>';

	$count = get_post_meta($post->ID, 'count', true);
	echo '<div class="column"><input name="count" type="number" class="count" value="' .esc_attr($count). '" /></div>';

	$initial_count = get_post_meta($post->ID, 'initial_count', true);
	echo '<div class="column"><input name="initial_count" type="number"class="count" value="' .esc_attr($initial_count). '" /></div>';

	echo '<div class="column"><h2>[emojized id="' .$post->ID . '" count="true"]</h3></div>';
	echo '</div>';
	// row end
	echo '<div class="row">';
	echo '<div class="column head">Settings</div>';
	echo '</div>';

	echo '<div class="row">';
	echo '<div class="column">one vote per user</div>';
	$counted_once = get_post_meta($post->ID, 'counted_once', true);
	echo '<div class="column"><input type="checkbox" name="counted_once" ';
	if
	($counted_once) echo 'checked=checked ';
	echo '/>';
	echo '</div>';
	echo '</div>';

	echo '</div>';
	// table end
}

add_action( 'save_post', 'emojized_save_postdata' );

function emojized_save_postdata()
{
	if ( ! isset( $_POST['emojized_nonce'] ) || ! wp_verify_nonce( $_POST['emojized_nonce'], plugin_basename( __FILE__ ) ) )
		return;

	global $post;
	$emoji = sanitize_text_field( $_POST['emoji'] );
	$count = sanitize_text_field( $_POST['count'] );
	$initial_count = sanitize_text_field( $_POST['initial_count'] );
	$counted_once = $_POST['counted_once'];

	update_post_meta($post->ID, 'emoji', $emoji);
	update_post_meta($post->ID, 'count', $count);
	update_post_meta($post->ID, 'initial_count', $initial_count);
	update_post_meta($post->ID, 'counted_once', $counted_once);
}

?>