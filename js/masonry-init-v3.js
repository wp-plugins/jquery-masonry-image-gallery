var galleries = document.querySelectorAll('.gallery');
for (var i = 0, len = galleries.length; i < len; i++) {
    var gallery = galleries[i];
    initMasonry(gallery);
}
function initMasonry(container) {
    var imgLoad = imagesLoaded(container, function () {
        new Masonry(container, {
            itemSelector: '.gallery-item',
            columnWidth: '.gallery-item',
            isFitWidth: true
        });
        container.className += " jmig-gallery-loaded";
    });
}