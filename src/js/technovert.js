(function ($) {
  "use strict"; // Start of use strict

  $(document).ready(function () {
    // Mark current page in sub navigation menu
    $("ul.subnav li").each(function (i) {
      if ($(this).find("a").attr("href") === window.locationi.href) {
        $(this).find("a").addClass("active");
      }
    });
  });
})(jQuery); // End of use strict
