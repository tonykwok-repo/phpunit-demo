<?php
include_once('../functions.php');

class Test_Basic_Theme extends WP_UnitTestCase {

	function setUp() {
		parent::setUp();
		switch_theme( 'Basic Theme', 'Basic Theme' );
	}

	function testActiveTheme() {
		$this->assertTrue( 'Basic Theme' == get_current_theme() );
	}

	function testInactiveTheme() {
		$this->assertFalse( 'Twenty Eleven' == get_current_theme() );
	}

	function testjQueryIsLoaded() {
		$this->assertFalse( wp_script_is( 'jquery' ) );

		do_action( 'wp_enqueue_scripts' );
		$this->assertTrue( wp_script_is( 'jquery' ) );
	}

	function testBasicMetaDescription() {
		$meta_description = '<meta name="description" content="' . get_bloginfo( 'description' ) . '" />';
		$this->expectOutputString( $meta_description, basic_meta_description() );
	}
}
?>
