var public_vars = public_vars || {};

;(function($, window, undefined){
    "use strict";

    $(document).ready(function() {
        public_vars.$body                 = $("body");
        public_vars.$pageContainer        = public_vars.$body.find(".page-container");
        public_vars.$chat                 = public_vars.$pageContainer.find("#chat");
        public_vars.$sidebarMenu          = public_vars.$pageContainer.find('.sidebar-menu');
        public_vars.$mainMenu             = public_vars.$sidebarMenu.find('.main-menu');
        
        public_vars.$horizontalNavbar     = public_vars.$body.find('.navbar.horizontal-menu');
        public_vars.$horizontalMenu       = public_vars.$horizontalNavbar.find('.navbar-nav');
        
        public_vars.$mainContent          = public_vars.$pageContainer.find('.main-content');
        public_vars.$mainFooter           = public_vars.$body.find('footer.main-footer');
        
        public_vars.$userInfoMenuHor      = public_vars.$body.find('.navbar.horizontal-menu');
        public_vars.$userInfoMenu         = public_vars.$body.find('nav.navbar.user-info-navbar');
        
        public_vars.$settingsPane         = public_vars.$body.find('.settings-pane');
        public_vars.$settingsPaneIn       = public_vars.$settingsPane.find('.settings-pane-inner');
        
        public_vars.wheelPropagation      = true; // used in Main menu (sidebar)
        
        public_vars.$pageLoadingOverlay   = public_vars.$body.find('.page-loading-overlay');
        
        public_vars.defaultColorsPalette = ['#68b828','#7c38bc','#0e62c7','#fcd036','#4fcdfc','#00b19d','#ff6264','#f7aa47'];

        var loading;
        loading = $('body').find('.page-loading-overlay');
        if (loading.length) {
          $(window).load(function() {
            loading.addClass('loaded');
          });
        }
        window.onerror = function() {
          loading.addClass('loaded');
        };

        // Mobile Menu Trigger
        $('a[data-toggle="mobile-menu"]').on('click', function(ev)
        {
            ev.preventDefault();
            
            public_vars.$mainMenu.toggleClass('mobile-is-visible');
            ps_destroy();
        });



        // Mobile Menu Trigger for Horizontal Menu
        $('a[data-toggle="mobile-menu-horizontal"]').on('click', function(ev)
        {
            ev.preventDefault();
            
            public_vars.$horizontalMenu.toggleClass('mobile-is-visible');
            
        });



        // Mobile Menu Trigger for Sidebar & Horizontal Menu
        $('a[data-toggle="mobile-menu-both"]').on('click', function(ev)
        {
            ev.preventDefault();
            
            public_vars.$mainMenu.toggleClass('mobile-is-visible both-menus-visible');
            public_vars.$horizontalMenu.toggleClass('mobile-is-visible both-menus-visible');
            
        });



        // Mobile User Info Menu Trigger
        $('a[data-toggle="user-info-menu"]').on('click', function(ev)
        {
            ev.preventDefault();
            
            public_vars.$userInfoMenu.toggleClass('mobile-is-visible');
            
        });



        // Mobile User Info Menu Trigger for Horizontal Menu
        $('a[data-toggle="user-info-menu-horizontal"]').on('click', function(ev)
        {
            ev.preventDefault();
            
            public_vars.$userInfoMenuHor.find('.nav.nav-userinfo').toggleClass('mobile-is-visible');
            
        });

        function ps_destroy()
        {
            if(jQuery.isFunction(jQuery.fn.perfectScrollbar))
            {
                public_vars.$sidebarMenu.find('.sidebar-menu-inner').perfectScrollbar('destroy');
            }
        }
    });
})(jQuery, window);