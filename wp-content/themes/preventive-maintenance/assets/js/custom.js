jQuery(function($){
  "use strict";

    // Search focus handler
    function searchFocusHandler() {
        const searchFirstTab = $('.inner_searchbox input[type="search"]');
        const searchLastTab = $('button.search-close');

        $(".open-search").click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            $('body').addClass("search-focus");
            searchFirstTab.focus();
        });

        $("button.search-close").click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            $('body').removeClass("search-focus");
            $(".open-search").focus();
        });

        // Redirect last tab to first input
        searchLastTab.on('keydown', function(e) {
            if ($('body').hasClass('search-focus') && e.which === 9 && !e.shiftKey) {
                e.preventDefault();
                searchFirstTab.focus();
            }
        });

        // Redirect first shift+tab to last input
        searchFirstTab.on('keydown', function(e) {
            if ($('body').hasClass('search-focus') && e.which === 9 && e.shiftKey) {
                e.preventDefault();
                searchLastTab.focus();
            }
        });

        // Allow escape key to close menu
        $('.inner_searchbox').on('keyup', function(e) {
            if ($('body').hasClass('search-focus') && e.keyCode === 27) {
                $('body').removeClass('search-focus');
                searchLastTab.focus();
            }
        });
    }

    // Initialize search focus handler
    searchFocusHandler();
    
});

function preventive_maintenance_menu_open() {
  jQuery(".sidenav").addClass('open');
}
function preventive_maintenance_menu_close() {
  jQuery(".sidenav").removeClass('open');
}

jQuery(function($){
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {
      $('#return-to-top').fadeIn(200);
    } else {
      $('#return-to-top').fadeOut(200);
    }
  });
  $('#return-to-top').click(function() {
    $('body,html').animate({
      scrollTop : 0
    }, 500);
  });
});

jQuery(function($){
  $(window).load(function() {
    $(".loader").delay(2000).fadeOut("slow");
  })
});
