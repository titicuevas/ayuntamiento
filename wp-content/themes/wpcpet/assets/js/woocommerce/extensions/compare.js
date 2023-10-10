(
	function ( $ ) {
		"use strict";

		$( "body" ).on( "woosc_change_count", function ( event, count ) {
			$( ".header-compare .count, .footer-compare .count" ).html( count );
		} );
	}
)( jQuery );
