
/**
 * Archive Widget: wrap number of records with span
 */

$(function() {
    $('.widget_archive > ul > li').each(function() {
        $(this).html(
            $(this).html().replace(/\((\d+)\)/ig, '<span class="swtk-widget-archive-count">$1</span>')
        );
    });
});

/**
 * Categories Widget: wrap number of records with span
 */

$(function() {
    $('.widget_categories > ul > li').each(function() {
        $(this).html(
            $(this).html().replace(/\((\d+)\)/ig, '<span class="swtk-widget-category-count">$1</span>')
        );
    });
});

/**
 * Categories Widget: mark categories with children
 */

$(function() {
    $('li.cat-item').has('ul.children').addClass('swtk-super-category');

    $('li.swtk-super-category').each(function() {
        $(this).children("a, span")
            .wrapAll('<div class="swtk-super-category-title"></div>');
    });
});


/**
 * Tags cloud - remove brakets
 */
$(function() {
    $('.swtk-tag-link-count').each(function() {
        $(this).text(
            $(this).text().replace(/\((\d+)\)/i, '$1')
        );
    });
});

/*
* Media library - set caption width equal to the icon's width
*/

$(function() {
    $('.gallery-icon').each(function() {
        $(this).siblings('dd.gallery-caption').width($(this).innerWidth());
    });
});

/*
* Media gallery : make it more configurable
*/

$(function() {
    var imageCounter = 0;

    $('.widget_media_gallery a').each(function() {
        // prevent default click action on a with href
        $(this).attr('href', 'javascript:void(0)');
        $(this).attr('swtk-image-counter', imageCounter);

        // add a hidden layer for the full-size image
        $(this).parent().append( '<div class="swtk-gallery-full-image"></div>' );
        $(this).siblings('div.swtk-gallery-full-image')
            .attr('swtk-image-counter', imageCounter);

        // add a close button
        $(this).siblings('div.swtk-gallery-full-image')
            .append('<a href="javascript:void(0)" class="swtk-close">X</div>');

        // add a full-size images
        $(this).siblings('div.swtk-gallery-full-image')
            .append('<img />');

        // get a name of the full-size image file
        var thumbnailName = $(this).children('img').first().attr('src');
        var fullName = thumbnailName.replace(/-\d+x\d+/i,"");
        $(this).siblings('div.swtk-gallery-full-image')
            .children('img')
            .attr('src', fullName);

        // define a new click-action for the link - show the full-size image
        //  on the top-level layer
        $(this).on('click',function(){
            $(this).siblings('div.swtk-gallery-full-image').css('display', 'flex');

            // define width and height of the full-size image div
            $(this).siblings('div.swtk-gallery-full-image').each(function() {

                // calculate div margins to positionate it in the center of screen
                var marginLeft = $(this).outerWidth() / 2;
                var marginTop = $(this).outerHeight() / 2;

                $(this).css('margin-left', '-' + marginLeft + 'px' );
                $(this).css('margin-top', '-' + marginTop + 'px' );
                $(this).css('margin-right', marginLeft + 'px' );
                $(this).css('margin-bottom',  marginTop + 'px' );
            });
        })

        // define on-click action for close buttons
        $(this).siblings('div.swtk-gallery-full-image')
            .children('.swtk-close')
            .on('click', function() {
                $(this).parent().css('display', 'none');
            });

        imageCounter++;
    });
})
