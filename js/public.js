/* Add this block to the global.js file of your theme */
function initAdvantageOwl() {
    let advc = $('.owl-advantage');
    if(window.innerWidth < 768) {
        if(!advc.hasClass('owl-carousel')) {
            advc.removeClass('row');
            advc.addClass('owl-carousel owl-theme-square');
            if(advc.length > 0 && $.fn.owlCarousel !== undefined) {
                advc.owlCarousel(Object.assign({},owlOptions,{
                    nav: true,
                    autoplay: true,
                    autoplayHoverPause: true,
                    autoplayTimeout: 3000,
                    responsive:{
                        0:{
                            items:1,
                            margin: 0
                        },
                        480:{
                            items:2,
                            margin: 30
                        }
                    }
                }));
            }
        }
        /*else {
            advc.owlCarousel('refresh');
        }*/
    }
    else {
        if(advc.hasClass('owl-carousel')) {
            advc.owlCarousel('destroy');
            advc.removeClass('owl-carousel owl-theme-square');
        }
        if(!advc.hasClass('row')) {
            advc.addClass('row');
        }
    }
}
initAdvantageOwl();
$(window).resize(initAdvantageOwl);