<?php
/**
 * Enqueues jQuery with the Basic Theme so that it's loaded on page request.
 */
function basic_add_jquery() {
	wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'basic_add_jquery' );

function basic_meta_description() {
	echo '<meta name="description" content="' . get_bloginfo( 'description' ) . '" />';
}
add_action( 'wp_head', 'basic_meta_description' );

?>
