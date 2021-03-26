(function ($) {
  "use strict"; // Start of use strict

  $(document).ready(function () {
    // Mark current page in sub navigation menu
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
            $("#suggestion-container")
              .addClass("d-none")
              .removeClass("d-block");
          } else {
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

    $("select#industry").change(function () {
      if ($(this).val() != "Industry") {
        filterBySelectElem("industry", $(this).val());
      }
    });

    $("select#solution").change(function () {
      if ($(this).val() != "Solution") {
        filterBySelectElem("solution_category", $(this).val());
      }
    });

    const filterBySelectElem = (filterBy, searchVal) => {
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "filter_post_by_select",
          filterBy: filterBy,
          searchVal: searchVal,
          postType: "case-studies",
        },
        success: function (res) {
          console.log(res);
        },
        error: function (err) {
          console.log(err);
        },
      });
    };
  });
})(jQuery); // End of use strict
