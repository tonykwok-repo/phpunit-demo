<?php
/**
 * Class SampleTest
 *
 * @package Basic
 */

class SampleTest extends WP_UnitTestCase {
  function setUp() {
		parent::setUp();
		switch_theme( 'basic', 'basic' );
	}

	function testActiveTheme() {
		$this->assertTrue( 'basic' == wp_get_theme() );
	}

	function testInactiveTheme() {
		$this->assertFalse( 'Twenty Eleven' == wp_get_theme() );
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
