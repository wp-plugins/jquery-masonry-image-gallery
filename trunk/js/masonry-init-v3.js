var container = document.querySelector('.gallery');
var msnry = imagesLoaded( container, function() {
			msnry = new Masonry( container, {
			itemSelector: '.gallery-item',
			columnWidth: '.gallery-item',
			isFitWidth: true
			});
	});
msnry.on( 'always', function() {
	container.className += " jmig-img-loaded";
});