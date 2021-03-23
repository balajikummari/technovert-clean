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
  });
})(jQuery); // End of use strict
