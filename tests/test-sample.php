<?php
/**
 * Class SampleTest
 *
 * @package Basic
 */

class SampleTest extends WP_UnitTestCase {
  function setUp() {
		parent::setUp();
		switch_theme( 'phpunit-demo' );
	}

  function testActiveTheme() {
    $this->assertTrue( wp_get_theme() == 'phpunit-demo' );
	}

	function testInactiveTheme() {
    $this->assertFalse( wp_get_theme() == 'Twenty Twelve' );
	}

	function testjQueryIsLoaded() {
		$this->assertFalse( wp_script_is( 'jquery' ) );

		do_action( 'wp_enqueue_scripts' );
		$this->assertTrue( wp_script_is( 'jquery' ) );
	}

	function testBasicMetaDescription() {
    var_dump(basic_meta_description());
		$meta_description = '<meta name="description" content="' . get_bloginfo( 'description' ) . '" />';
		$this->expectOutputString( $meta_description, basic_meta_description() );
	}
}
