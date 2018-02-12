<?php

/**
 * TestCase base class for convenience methods.
 */
class WPSEO_News_UnitTestCase extends WP_UnitTestCase {

	/**
	 * @param string $key
	 * @param mixed $value
	 */
	protected function set_post( $key, $value ) {
		$_REQUEST[ $key ] = addslashes( $value );
		$_POST[ $key ]    = $_REQUEST[ $key ];
	}

	/**
	 * @param string $key
	 */
	protected function unset_post( $key ) {
		unset( $_POST[ $key ], $_REQUEST[ $key ] );
	}

	/**
	 * Fake a request to the WP front page
	 */
	protected function go_to_home() {
		$this->go_to( home_url( '/' ) );
	}

	/**
	 * @param string $string
	 */
	protected function expectOutput( $string ) {
		$output = ob_get_contents();
		ob_clean();
		$this->assertEquals( $output, $string );
	}
}
