; ( function ( factory ) {
	factory( jQuery );
})( function ( $ ) {
	
	var containerWidth = 0;
	
	$(document).ready( function() {
		containerWidth = $('.container').width();
		$('.sticky-container').css( 'left', ( $( window ).width() / 2 ) + containerWidth / 2 );		
	});
	
	$(window).scroll( function() {
		
	});
	
	$(window).resize( function() {
		$('.sticky-container').css( 'left', ( $( window ).width() / 2 ) + containerWidth / 2 );
	});
});
