<?php

class WPSEO_News_Head {

	/**
	 * Display the optional sources link elements in the <code>&lt;head&gt;</code>.
	 */
	public function add_head_tags() {

		if ( is_singular() ) {
			global $post;

			$meta_news_keywords = trim( wpseo_get_value( 'newssitemap-keywords', $post->ID ) );
			if ( ! empty( $meta_news_keywords ) ) {
				echo '<meta name="news_keywords" content="' . $meta_news_keywords . '" />' . "\n";
			}

			$original_source = trim( wpseo_get_value( 'newssitemap-original', $post->ID ) );
			if ( ! empty( $original_source ) ) {
				echo '<link rel="original-source" href="' . get_permalink( $post->ID ) . '" />' . "\n";
			} else {
				$sources = explode( '|', $original_source );
				foreach ( $sources as $source ) {
					echo '<link rel="original-source" href="' . $source . '" />' . "\n";
				}
			}
		}

	}

}