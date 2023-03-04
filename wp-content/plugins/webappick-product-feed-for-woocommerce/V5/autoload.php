<?php
defined( 'ABSPATH' ) || die();


if ( ! class_exists( 'V5_Loader' ) ) {
	class V5_Loader {
		public function __construct() {
			spl_autoload_register( [ $this, 'ctx_feed_v5_autoloader' ] );
		}

		public function ctx_feed_v5_autoloader( $class ) {
			if ( strpos( $class, 'CTXFeed\V5' ) !== false ) {
				$path = str_replace( [ "CTXFeed\\V5\\", "\\" ], [ '', '/' ], $class );

				$file_path = __DIR__ . DIRECTORY_SEPARATOR . $path . '.php';

				$file_path = str_replace( 'WebAppick' . DIRECTORY_SEPARATOR . 'Feed', '', $file_path );

				if ( file_exists( $file_path ) ) {
					require_once $file_path;
				}
			}
		}
	}
}

new V5_Loader();
