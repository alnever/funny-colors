(function () {
    'use strict';

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

    /**
     * NavBar: mark and deine an action to open collapsed menu
     */

    $(function() {
        var navbarCounter = 0;

        // identify toggle and collapsed navbar
        $('.swtk-navbar').each(function() {
            $(this).children('.swtk-brand-toggle').first()
                .children('.swtk-toggle').first().attr("swtk-id","Navbar" + navbarCounter);
            $(this).children('.swtk-collapsed').first().attr("swtk-id","Navbar" + navbarCounter);

            navbarCounter++;
        });

        // perfom toggle click action
        $('.swtk-toggle').each(function() {
            $(this).on('click', function() {

                console.log($(this).attr('swtk-id'));
                var collapsed = $('[swtk-id=' + $(this).attr('swtk-id') + '].swtk-collapsed');
                console.log(collapsed);
                if (collapsed.css('display') == 'none') {
                    collapsed.css('display','flex');
                } else {
                    collapsed.css('display','none');
                }
            });
        });
    });

    /*
    * NavBar: mark and define an action to open submenu
    */
    $(function() {
        $('.page_item_has_children, .menu-item-has-children').each(function() {
            // add a button to open submenu
            $(this).append('<a href="javascript:void(0)" class="swtk-submenu-button">\u25BC</a>');
            // wrap menu-link and submenu-button into one div
            $(this).children('a').wrapAll('<div class="swtk-super-item"></div>');
            // define a reaction on click for each submenu button
            $(this).children('.swtk-super-item').first()
                .children('.swtk-submenu-button').first()
                .on('click', function () {
                    // $('.children, .sub-menu').css('display','none');
                    if ($(this).parent().siblings('ul').first().css('display') == 'none') {
                        $(this).parent().siblings('ul').first().css('display', 'flex');
                    } else {
                        $(this).parent().siblings('ul').first().css('display', 'none');
                    }
                });
        });
    });

}());
