
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
    $('.tag-link-count').each(function() {
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
