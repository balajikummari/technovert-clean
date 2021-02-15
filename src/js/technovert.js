(function ($) {
  "use strict"; // Start of use strict

  $(document).ready(function () {
    // Mark current page in sub navigation menu
    $("ul.subnav li").each(function (i) {
      console.log(window.location.href);
      if ($(this).attr("rel") === window.locationi.href) {
        $(this).addClass("active");
      }
    });
  });
})(jQuery); // End of use strict
