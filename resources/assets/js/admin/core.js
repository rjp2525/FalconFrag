$(function() {
    // Core Variables
    var body = $('body');

    // Loading Overlay
    var loading = body.find('.page-loading-overlay');
    if(loading.length) {
        $(window).load(function() {
            loading.addClass('loaded');
        });
    }
    // In case something fails
    window.onerror = function() {
        loading.addClass('loaded');
    };

    // Save sidebar preferences to cookie
    var sidebar_toggle = $('#sidebar-collapse-toggle');

    // Click functions
    sidebar_toggle.on('click', function(e) {
        e.preventDefault();

        // Set a default preference variable
        var sidebar_pref = 1;

        // Set class
        $('.sidebar-menu').toggleClass('collapsed');

        // Set a date for 1 week
        var date = new Date();
        date.setTime(date.getTime() + (1000 * 60 * 60 * 24 * 7));

        // Determine what to set in the cookie
        if($('.sidebar-menu').hasClass('collapsed'))
            sidebar_pref = 0;

        // Set the cookie to whatever sidebar_pref is
        Cookies.set('sidebar_display_preference', sidebar_pref, { expires: date, path: '/', secure: true, domain: '.falconfrag.com' });

        //////////////////////////////////////////////

        // Save the cookie for a week
        /*var date = new Date();
        date.setTime(date.getTime() + (1000 * 60 * 60 * 24 * 7));
        $.cookie('sidebar_display_preference', '1', { expires: date, path: '/' });

        // Set class
        $('.sidebar-menu').toggleClass('collapsed');

        if($('.sidebar-menu').hasClass(''))

        setTimeout(function() {
            try {
                reconstructRevolution();
            } catch(err) {
                console.log(err);
            }
        }, 10);*/
    });

    // Check for an existing sidebar preference cookie
    if(!Cookies.get('sidebar_display_preference') || Cookies.get('sidebar_display_preference') == 0) {
        $('.sidebar-menu').addClass('collapsed');
    } else if(Cookies.get('sidebar_display_preference') == 1) {
        $('.sidebar-menu').removeClass('collapsed');
    }

    // Initialize perfect scrollbars

    // Perfect Scrollbar
    if($('.sidebar-menu').hasClass('fixed'))
        $('.sidebar-menu-inner').perfectScrollbar({ wheelSpeed: 2, wheelPropagation: true });

    $('.ps-scrollbar').each(function(i, el) {
        $(el).perfectScrollbar({ wheelPropagation: true });
    });

    // Chat Scrollbar
    var chat_inner = $('#chat .chat-inner');

    if(chat_inner.parent().hasClass('fixed'))
        chat_inner.css({ maxHeight: $(window).height() }).perfectScrollbar();

    // User profile dropdown trigger Perfect Scrollbar update on open
    $('.user-info-navbar .dropdown:has(.ps-scrollbar)').each(function(i, el) {
        var scrollbar = $(this).find('.ps-scrollbar');

        $(this).on('click', '[data-toggle="dropdown"]', function(ev) {
            ev.preventDefault();

            setTimeout(function() {
                scrollbar.perfectScrollbar('update');
            }, 1);
        });
    });

    // Scrollable elements
    $('.scrollable').each(function(i, el) {
        var $this = $(el);
        var max_height = parseInt(attrDefault($this, 'max-height', 300), 10);

        max_height = max_height < 0 ? 300 : max_height;

        $this.css({ maxHeight: max_height }).perfectScrollbar({ wheelPropagation: true });
    });

});

// Element Attribute Helper
function attrDefault(el, data_var, default_val) {
    if(typeof el.data(data_var) != 'undefined')
        return el.data(data_var);

    return default_val;
}
