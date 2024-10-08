(function () {
    'use strict';
    $(document).ready(function () {
        const $menuOverlay = $('.site-main-menu');
        const $menuToggle = $('.js-menu-toggle');
        let lastWindowWidth = $(window).width();

        $menuToggle.on('click', function () {
            $(this).toggleClass('open');
            $menuOverlay.fadeToggle();
            closeSubmenus();
        });

        $('ul.header-main-menu li.menu-item-has-children > a').on('click', function (e) {
            e.preventDefault();
            const $this = $(this);
            const submenuLevel = $this.data('depth');
            if ($this.hasClass('active')) {
                $this.siblings('.submenu').stop().slideUp();
                $this.parent().removeClass('open');
                $this.removeClass('active');
            } else {
                closeSubmenus(submenuLevel);
                $this.siblings('.submenu').stop().slideToggle();
                $this.parent().toggleClass('open');
                $this.toggleClass('active');
            }
        });

        if (window.matchMedia("(min-width: 768px)").matches) {
            unclickCloseElement('.site-main-menu', closeMenuSubmenus, ['.js-menu-toggle']);
        }

        if (window.matchMedia("(max-width: 767px)").matches) {
            unclickCloseElement('.site-main-menu', closeMenuMobile, ['.js-menu-toggle']);
        }

        function closeMenuSubmenus() {
            closeSubmenus();
        }
        function closeMenuMobile() {
            $menuToggle.removeClass('open');
            $menuOverlay.fadeOut();
            closeSubmenus();
        }

        $(window).resize(function(){
            if($(window).width() !== lastWindowWidth){
                closeMenuSubmenus();
                lastWindowWidth = $(window).width();
            }
        });

        function closeSubmenus(dataLevel = 1) {
            $('ul[data-level="' + dataLevel + '"] li.menu-item-has-children > a.active').each(function () {
                $(this).siblings('.submenu').stop().slideToggle(function () {
                    $(this).css('display', '')
                });
                $(this).removeClass('active');
                $(this).parent().removeClass('open');
            });
        }
    });
}(jQuery));