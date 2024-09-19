( function( api ) {

	// Extends our custom "preventive-maintenance" section.
	api.sectionConstructor['preventive-maintenance'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );