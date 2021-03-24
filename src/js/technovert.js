(function ($) {
  "use strict"; // Start of use strict

  $(document).ready(function () {
    // Mark current page in sub navigation menu
    $("ul.subnav li a").each(function (i) {
      if ($(this).attr("href") === window.location.href) {
        $(this).addClass("active");
      }
    });

    // change header when no hero section
    var isHeroSectionExist = $(".hero-section").length;
    if (!isHeroSectionExist) {
      $("header").addClass("coloured-header");
    }

    function searchFilter(itemClass, searchElement) {
      var query = jQuery("#search").val();

      if (query.length > 0) {
        jQuery(itemClass).each(function () {
          if (jQuery(this).find(searchElement).text().indexOf(query) !== -1) {
            jQuery(this).show();
          } else {
            jQuery(this).hide();
          }
        });
      } else {
        jQuery(itemClass).show();
      }
    }

    function locFilter() {
      var selected = jQuery("select#location :selected").text();
      if (selected !== "All") {
        jQuery(".jobRecord").each(function () {
          var loc = jQuery(this).find("h3 + span").text();

          if (selected === loc) {
            jQuery(this).show();
          } else {
            jQuery(this).hide();
          }
        });
      } else {
        jQuery(".jobRecord").show();
      }
    }
  });
})(jQuery); // End of use strict
