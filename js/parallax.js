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
				const elW = el.width();
				const elY = itemYPositions[ index ] + ( elW / 2 ); //el.offset().top;
				// const progress = 1 - ( elY / y );
				const progress = ( y - elY ) / window.innerHeight;


				// const progress = ( y - elY ) / window.innerHeight;
				if ( index === 0 ) {
					console.log( { y, elY } );
					console.log(progress);
				}
				if ( progress > 0 ) {
					if ( y >= elY || elY < window.innerHeight ) {
						el.css( 'transform', 'rotate(90deg) translateX(-' + ( 50 * progress ) + '%)' );
					}
				}
			} );
		};

		$( window ).scroll( function() {
			handleScroll();
		} );
	} );
} )( jQuery );
