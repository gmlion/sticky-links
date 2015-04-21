; ( function ( factory ) {
	factory( jQuery );
})( function ( $ ) {
	
	var containerWidth = 0;
	var positionContainer = function(containerWidth) {
			if ($(window).width() > 1000) {
				resetContainer();
				$('.sticky-container').css( 'left', ( $( window ).width() / 2 ) + containerWidth / 2 );
				
			} else {
				resetContainer();
				$('.sticky-container').css('padding-left', ( $( window ).width() / 2 ) - 240 / 2);
			}
			
	};
	
	var resetContainer = function() {
		$('.sticky-container')	.css('padding-left', 5)
								.css('left', 0);
	};
	
	$(document).ready( function() {
		positionContainer($('.container').width());
				
	});
	
	$(window).scroll( function() {
		
	});
	
	$(window).resize( function() {
		positionContainer($('.container').width());
	});
});
