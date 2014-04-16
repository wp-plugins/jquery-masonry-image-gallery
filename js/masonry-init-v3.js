var container = document.querySelector('.gallery');
var msnry = imagesLoaded( container, function() {
			msnry = new Masonry( container, {
			itemSelector: '.gallery-item',
			columnWidth: '.gallery-item',
			isFitWidth: true
			});
	});
msnry.on( 'always', function() {
	for ( var i = 0, len = msnry.images.length; i < len; i++ ) {
    	var image = msnry.images[i];
    	image.img.className += " jmig-img-loaded";
    }
});