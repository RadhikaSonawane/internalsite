<?php

exec( 'composer show -f json -o', $output );
$json          = implode( '', $output );
$plugin_api    = 'https://wpvulndb.com/api/v2/plugins/';
$wordpress_api = 'https://wpvulndb.com/api/v2/wordpresses/';
$updates       = array();

if ( ! empty( $json ) ) {

	$packages = json_decode( $json );

	if ( ! empty( $packages ) && ! empty( $packages->installed ) ) {

		foreach ( $packages->installed as $package ) {

			if ( 'johnpbloch/wordpress' === $package->name ) { // Handle as WordPress Core
				$wordpress_version = str_replace( '.', '', $package->version );
				$api_url           = $wordpress_api . $wordpress_version;
			} else { // Handle as plugin

				$re = '/\/(.*)/';
				preg_match_all( $re, $package->name, $matches );
				$package_name = $matches[1];
				$api_url      = $plugin_api . $package_name[0];
			}

			// Setup Curl and execute
			$ch = curl_init( $api_url );
			@curl_setopt( $ch, CURLOPT_HEADER, true );
			@curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			$response    = curl_exec( $ch );
			$curl_info   = curl_getinfo( $ch );
			$header_size = $curl_info['header_size'];
			$httpcode    = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
			curl_close( $ch );

			if ( 200 === $httpcode && ! empty( $response ) ) { // If found in the wp vuln db api.

				$json_response   = substr( $response, $header_size );
				$response_object = json_decode( $json_response );
				$upgrade_to      = null;

				foreach ( reset( $response_object )->vulnerabilities as $vuln ) {

					if ( ! empty( $vuln->fixed_in ) && $vuln->fixed_in > $package->version ) {
						$upgrade_to = $vuln->fixed_in;
					}
				}

				if ( null !== $upgrade_to ) {
					$updates[ $package->name ] = $upgrade_to;
				}
			}
		}

		if ( empty( $updates ) ) {

			print_message( '' );
			print_message( 'No plugins in need of upgrade.', 'success' );
			print_message( '' );

		} else {

			print_message( '' );
			print_message( sprintf( 'Found %s plugin(s) in need of upgrading. To fix, run the following commands:', sizeof( $updates ) ), 'error' );

			foreach ( $updates as $package_name => $version ) {

				$message = sprintf( 'composer require "%s:%s"', $package_name, $version );

				if ( 'johnpbloch/wordpress' === $package_name ) {
					$message .= ' --update-with-dependencies';
				}

				print_message( $message );
			}

			print_message( '' );

		}
	}
}

function print_message( $message, $type = null ) {

	if ( 'error' === $type ) {
		$message = "\033[31m" . $message . "\033[0m";
	}

	if ( 'success' === $type ) {
		$message = "\033[32m" . $message . "\033[0m";
	}

	// phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
	echo $message . "\n";
	// phpcs:enable
}

die( 0 );
