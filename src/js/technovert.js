(function ($) {
  "use strict"; // Start of use strict

  $(document).ready(function () {
    // for navbar
    $(window).scroll(function () {
      var scroll = $(window).scrollTop();

      if (
        scroll > 80 &&
        $(".hero-section").length &&
        !$(".sub-navbar").length
      ) {
        $("header").addClass("shadow-nav");
        $("header .navbar").addClass("bg-clay-10");
      } else if ($(".hero-section").length) {
        $("header").removeClass("shadow-nav ");
        $("header .navbar").removeClass("bg-clay-10");
      }
    });
    // for sticky subnavbar

    if ($(".sub-navbar").length > 0) {
      // need to modify
      $("header").removeClass("fixed-header");
    } else {
      $("header").addClass("fixed-header");
    }

    // change header when no hero section
    if (!$(".hero-section").length) {
      $("header .navbar").addClass("bg-clay-10");
    }

    // Open Header Overlay
    function addHeaderOverlay() {
      $("body").css({
        overflowY: "hidden",
      });

      $("header").addClass("overlay-header");
    }

    // Close Header Overlay
    function removeHeaderOverlay() {
      $("body").css({
        overflowY: "scroll",
      });

      $("header").removeClass("overlay-header");
    }

    let isHeaderOpen = false;

    // for the menubar close

    $(".navbar-toggler").click(function () {
      if (!isHeaderOpen) {
        addHeaderOverlay();
        isHeaderOpen = true;

        // Add fixed-header class to header while open the menu
        if ($(".sub-navbar").length > 0) {
          $("header").addClass("fixed-header");
          $(".sub-navbar-title.mobile-visibility").css({
            marginTop: "62.13px",
          });
        }
      } else {
        removeHeaderOverlay();
        isHeaderOpen = false;

        $(".nav-header").removeClass("sticky-nav-header");

        // Remove fixed-header class to header while close the menu
        if ($(".sub-navbar").length > 0) {
          setTimeout(function () {
            $("header").removeClass("fixed-header");
            $(".sub-navbar-title.mobile-visibility").css({
              marginTop: "0",
            });
          }, 330);
        }
      }

      $("#middle-line").toggleClass("animate-middle-line");
      $("#first-line").toggleClass("animate-first-line");
      $("#third-line").toggleClass("animate-third-line");
    });

    // Remove header overlay for big screen
    $(window).resize(function () {
      if ($(window).width() < 991) {
        if (isHeaderOpen) {
          addHeaderOverlay();
        }
      } else {
        removeHeaderOverlay();
      }
    });

    // Close Header Overlay When click outside
    $("header").on("click", function (e) {
      if (e.target.tagName == "HEADER") {
        $(".navbar-toggler").click();
      }
    });

    // Add sticky header when scroll
    $("header").scroll(function () {
      let headerScroll = $("header").scrollTop();
      if (headerScroll > 10 && isHeaderOpen) {
        $(".nav-header").addClass("sticky-nav-header");
      }
    });

    // Mark current page in sub navigation menu, do the same with insights-nav
    $(".sub-navbar li a").each(function (i) {
      if ($(this).attr("href") === window.location.href) {
        $(this).addClass("active");
      }
    });

    // Does the same thing but for blue ribbon navigation bar
    $(".sub-navbar ul li a").each(function (i) {
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

    // for the case-studies post search
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

  // End Jquery code
})(jQuery); // End of use strict
