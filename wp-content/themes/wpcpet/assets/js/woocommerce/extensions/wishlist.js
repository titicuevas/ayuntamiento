(
	function ( $ ) {
		"use strict";

		$( "body" ).on( "woosw_change_count", function ( event, count ) {
			$( ".header-wishlist .count, .footer-wishlist .count" ).html( count );
		} );
	}
)( jQuery );
