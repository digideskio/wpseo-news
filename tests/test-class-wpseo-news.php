<?php
/**
 * Yoast SEO: News plugin test file.
 *
 * @package WPSEO_News\Tests
 */

/**
 * Class WPSEO_News_Test.
 */
class WPSEO_News_Test extends WPSEO_News_UnitTestCase {

	/**
	 * Tests the check dependencies function.
	 *
	 * @dataProvider check_dependencies_data
	 *
	 * @param bool   $expected              The expected value.
	 * @param string $wordpress_seo_version The WordPress SEO version to check.
	 * @param string $wordpress_version     The WordPress version to check.
	 * @param string $message               Message given by PHPUnit after assertion.
	 *
	 * @covers WPSEO_News::check_dependencies()
	 */
	public function test_check_dependencies( $expected, $wordpress_seo_version, $wordpress_version, $message ) {
		$class_instance = $this
			->getMockBuilder( 'WPSEO_News_Double' )
			->disableOriginalConstructor()
			->setMethods( array( 'get_wordpress_seo_version' ) )
			->getMock();

		$class_instance
			->expects( $this->any() )
			->method( 'get_wordpress_seo_version' )
			->will( $this->returnValue( $wordpress_seo_version ) );


		$this->assertEquals( $expected, $class_instance->check_dependencies( $wordpress_version ), $message );
	}

	/**
	 * Data provider for the check dependencies test.
	 *
	 * [0]: Expected
	 * [1]: WordPress SEO Version
	 * [2]: WordPress Version
	 * [3]: Message for PHPUnit.
	 *
	 * @return array
	 */
	public function check_dependencies_data() {
		return array(
			array( false, '7.0', '3.0', 'WordPress is below the minimal required version.' ),
			array( false, '7.0', '3.5', 'WordPress is below the minimal required version.' ),
			array( false, false, '5.0', 'WordPress SEO is not installed.' ),
			array( false, '6.0', '5.0', 'WordPress SEO is below the minimal required version.' ),
			array( true, '7.0', '5.0', 'WordPress (5.0) and WordPress SEO have the minimal required versions.' ),
			array( true, '8.0', '4.8', 'WordPress (4.8) and WordPress SEO have the minimal required versions.' ),
		);
	}
}
