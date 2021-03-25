(function ($) {
  "use strict"; // Start of use strict

  $(document).ready(function () {
    // Mark current page in sub navigation menu, do the same with insights-nav
    $("ul.subnav li a").each(function (i) {
      if ($(this).attr("href") === window.location.href) {
        $(this).addClass("active");
      }
    });

    // Does the same thing but for blue ribbon navigation bar
    $(".sub-nav-bar ul li a").each(function (i) {
      if (window.location.href.includes($(this).attr("href"))) {
        $(this).addClass("active");
      } else {
        $(this).removeClass("active");
      }
    });

    // Does the same thing for vertical category nav
    $(".vertical-nav li a").each(function (i) {
      if (window.location.href.includes($(this).attr("href"))) {
        $(this).addClass("active");
      } else {
        $(this).removeClass("active");
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

    $("#post-search-field").val("");
    const fetchPost = () => {
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "filter_post_by_title",
          inputValue: $.trim($("#post-search-field").val()),
          postType: "case-studies",
        },
        success: function (res) {
          if (res == "empty") {
            console.log(res);
            $("#suggestion-container")
              .addClass("d-none")
              .removeClass("d-block");
          } else {
            console.log(res);
            $("#suggestion-container")
              .removeClass("d-none")
              .addClass("d-block")
              .html(res);
          }
        },
      });
    };
    $("#post-search-field").on("keyup", function () {
      fetchPost();
    });
  });
})(jQuery); // End of use strict
