(function($){
	var $container = $('.gallery');
		$container.imagesLoaded(function(){
			$container.masonry({
				itemSelector : '.gallery-item',
				isFitWidth: true
				});
			});
		$container.imagesLoaded()
			.always( function( instance ) {
				$( ".gallery" ).addClass( "jmig-img-loaded" );
			})
})(jQuery);