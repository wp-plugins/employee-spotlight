jQuery.noConflict();
jQuery.fn.styleTable = function (options) {
        var defaults = {
            css: 'ui-theme-default'
        };
        options = jQuery.extend(defaults, options);

        return jQuery(this).each(function () {
            jQuery(this).addClass(options.css);

            jQuery(this).on('mouseover mouseout', 'tbody tr', function (event) {
                jQuery(this).children().toggleClass("ui-state-hover", event.type == 'mouseover');
            });

            jQuery(this).find("th").addClass("ui-state-default");
            jQuery(this).find("table").addClass("ui-state-default");
            jQuery(this).find("td").addClass("ui-widget-content").css('text-align','left');
            jQuery(this).find("tr:last-child").addClass("last-child");
        });
    };
jQuery(document).ready(function($){
jQuery("table").styleTable();
jQuery(".p2p-connections").addClass("ui-widget-content widefat");
jQuery(".postbox").addClass("ui-widget-content");
jQuery("#col-left").addClass("ui-widget-content");
jQuery(".postbox h3").addClass("ui-state-default");
jQuery(".form-field.form-required").addClass("ui-state-default");
jQuery(".postbox h3").css("text-shadow","none");
jQuery(".wp-list-table").addClass("ui-widget-content");
var mycolor = jQuery("table.ui-state-default").css('color');

jQuery("table.widefat").find("td").css('color',mycolor);
jQuery(".inline-edit-col").css('color',mycolor);
jQuery("p.howto").css('color',mycolor);
jQuery(".emd-mb-input p.description").css('color',mycolor);
jQuery(".wp-list-table").find("th").css("text-shadow","none");
jQuery("#col-left").find("label,p").css("text-shadow","none").css('color',mycolor);
jQuery("#edittag").addClass("ui-widget-content");
jQuery("#edittag").find("th").removeClass("ui-state-default").addClass("ui-widget-content");
jQuery("#edittag").find("label,.description").css("text-shadow","none").css('color',mycolor);
jQuery("#operations-wrap").addClass("ui-widget-content");
jQuery("a.nav-tab-active").addClass("ui-widget-content");
jQuery("#operations-header").addClass("ui-state-default");
});