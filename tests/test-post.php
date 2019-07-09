<?php
/**
 * Class TestPost
 *
 * @package Basic
 */

class TestPost extends WP_UnitTestCase {
  function setUp() {
		parent::setUp();
		switch_theme( 'phpunit-demo' );
	}

  function testActiveTheme() {
    $this->assertTrue( wp_get_theme() == 'phpunit-demo' );
    $this->assertFalse( wp_get_theme() == 'Twenty Twelve' );
	}

  /**
   * @depends testActiveTheme
   */
  function testMockPost() {
    $user_ID = get_current_user_id();

    $mock_post = array(
      'post_title' => 'A New Post',
      'post_content' => 'Lorem ipsum dolor sit amet...',
      'post_status' => 'publish',
      'post_date' => date('Y-m-d H:i:s'),
      'post_author' => $user_ID,
      'post_type' => 'post',
      'post_category' => array(0)
      );
    $post_id = wp_insert_post($mock_post);

    $post_result = get_post($post_id);
    $this->assertTrue( $post_result->post_title == 'A New Post' );
  }
}
