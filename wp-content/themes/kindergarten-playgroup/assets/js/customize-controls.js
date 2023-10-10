( function( api ) {

	// Extends our custom "kindergarten-playgroup" section.
	api.sectionConstructor['kindergarten-playgroup'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );