(function ($) {
  "use strict"; // Start of use strict

  $(document).ready(function () {
    // Mark current page in sub navigation menu
    $("ul.subnav li a").each(function (i) {
      if ($(this).attr("href") === window.location.href) {
        $(this).addClass("active");
      }
    });
  });
})(jQuery); // End of use strict
