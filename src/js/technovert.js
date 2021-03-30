(function ($) {
  "use strict"; // Start of use strict

  $(document).ready(function () {
    const ptype = $(".posts-wrapper").attr("data-ptype");

    // for navbar
    let defaultScroll = window.scrollY; // default when page loads
    if (
      defaultScroll > 80 &&
      $(".hero-section").length &&
      !$(".sub-navbar").length
    ) {
      $("header").addClass("shadow-nav");
      $("header .navbar").addClass("bg-clay-10");
    }

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

    // Mark current page in sub navigation menu
    $("ul.subnav li a").each(function (i) {
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
        filterBySelectElem("industry", $(this).val(), ptype);
      } else {
        fetchAllByPostType(ptype);
      }
    });

    $("select#solution").change(function () {
      if ($(this).val() != "Solution") {
        filterBySelectElem("solution_category", $(this).val(), ptype);
      } else {
        fetchAllByPostType(ptype);
      }
    });

    const filterBySelectElem = (filterBy, searchVal, postType) => {
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "filter_post_by_select",
          filterBy: filterBy,
          searchVal: searchVal,
          postType: postType,
        },
        success: function (res) {
          console.log(res);
          $(".case-study-wrapper").html(res);
        },
        error: function (err) {
          console.log(err);
        },
      });
    };

    // hide unwanted stuff from wpcf7 form plugin
    $(".ajax-loader").hide();
    $(".wpcf7-response-output").addClass("d-none");

    var wpcf7Elm = document.querySelector(".wpcf7");

    if (wpcf7Elm) {
      wpcf7Elm.addEventListener(
        "wpcf7mailsent",
        function (event) {
          // for form in case study page
          if ($("#case-study-pdf-form").length) {
            $("#case-study-pdf-form p").hide();
            $(".wpcf7-response-output").removeClass("d-none");
            $("#pdf-download-btn").toggleClass("d-none");
          }

          // for form in blog detail page
          if ($("#email-subscribe").length) {
            $(".wpcf7-response-output").removeClass("d-none");
            setTimeout(() => {
              $(".wpcf7-response-output").addClass("d-none");
            }, 5000);
          }
        },
        false
      );
    }

    $("#pdf-download-btn").on("click", function () {
      $("#downloadPdf").modal("hide");
      $("#case-study-pdf-form p").show();
      $(".wpcf7-response-output").addClass("d-none");
      $("#pdf-download-btn").toggleClass("d-none");
    });

    let emailSubscribeModal = document.getElementById("downloadPdf");
    if (emailSubscribeModal) {
      emailSubscribeModal.addEventListener("hidden.bs.modal", function (event) {
        $(".wpcf7-not-valid-tip").html("");
      });
    }

    // End Jquery code
    const fetchAllByPostType = (postType) => {
      $.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        dataType: "html",
        data: {
          action: "fetch_all_by_post_type",
          postType: postType,
        },
        success: function (res) {
          console.log(res);
          $(".posts-wrapper").html(res);
        },
        error: function (err) {
          console.log(err);
        },
      });
    };
  });
  // End Jquery code
})(jQuery);
