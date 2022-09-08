// eslint-disable-next-line
(function ($) {
	$( document ).ready( function() {
		const items = $( '.parallaxBG' );
		if ( ! items || items.lengt === 0 ) {
			return;
		}
		const itemYPositions = [];
		items.each( function() {
			itemYPositions.push( $( this ).offset().top );
		} );
		const handleScroll = function() {
			items.each( function( index ) {
				const el = $( this );
				const y = window.scrollY + window.innerHeight;
				const elY = itemYPositions[ index ]; //el.offset().top;
				const progress = 1 - ( elY / y );
				if ( progress > 0 ) {
					if ( y >= elY || elY < window.innerHeight ) {
						el.css( 'transform', 'rotate(90deg) translateX(' + ( 150 * progress ) + '%)' );
					}
				}
			} );
		};

		$( window ).scroll( function() {
			handleScroll();
		} );
	} );
} )( jQuery );
