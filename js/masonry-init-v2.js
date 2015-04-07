(function ($) {
    var $container = $('.gallery');
    $container.imagesLoaded(function () {
        $container.masonry({
            itemSelector: '.gallery-item',
            isAnimated: true,
            animationOptions: {
                duration: 250,
                easing: 'linear',
                queue: false
            },
            isFitWidth: true
        });
    });
})(jQuery);