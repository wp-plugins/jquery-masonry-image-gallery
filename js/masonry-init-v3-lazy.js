jQuery(document).ready(function ($) {

    //Move the image src attribute to data-original, then remove the src attribute. A must for lazy load.

    $('.gallery-item img[src]').each(function () {

        var $images = $(this);

        $images.attr({'data-original': $images.attr('src')})

            .removeAttr('src');
    });

    //Prep gallery images by copying image width and heights to the parent container. Makes Masonry realtime layout not nearly as jarring. Then add hide class to each image.

    $(".gallery-item img").each(function () {

        $(this).closest('.gallery-item').css({

            'width': $(this).attr('width'),
            'height': $(this).attr('height')

        })

    }).css({

        'max-height': '100%',
        'max-width': '100%',
        'display': 'block'

    }).addClass('jmig-img-hide');

    //Lazy load does it thing using the standard masonry init as a function.

    $(".gallery-item img").lazyload({
        threshold: 400,
        load: function () {
            $(this).removeClass("jmig-img-hide").addClass("jmig-img-show");
            masonry_update();
        }
    });

    function masonry_update() {

        var $gallery = $('.gallery');

        $gallery.imagesLoaded(function () {
            $gallery.masonry({
                itemSelector: '.gallery-item',
                columnWidth: '.gallery-item',
                isFitWidth: true
            })

            setTimeout(function () {
                $('.gallery').addClass('jmig-gallery-loaded');
            }, 300);

        });


    }

    //BOOM BAM

});