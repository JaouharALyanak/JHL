import { Collapse } from 'bootstrap';
import Typed from 'typed.js';
import $ from 'jquery';
window.$ = $;

$(function () {

    var pageMenu = document.querySelector('#pageMenu');
    pageMenu.addEventListener('hide.bs.collapse', function () {
        $('#mainContent').show();
        $('footer').show();
    })
    pageMenu.addEventListener('shown.bs.collapse', function () {
        $('#mainContent').hide();
        $('footer').hide();
    })

    $(".slides-carousel").slick({
        infinite: false,
        arrows: false,
        autoplaySpeed: 2000,
        autoplay: true,
        slidesToShow: 1,
        lazyLoad: 'ondemand',
    });

    $('.slides-carousel').on('afterChange', function(event, slick, currentSlide){
        $('#thumbSlider .nav-link').removeClass('active');
        $("#thumbSlider .nav-link[data-index='"+ currentSlide +"']").addClass('active');
    });

    $('#thumbSlider .nav-link').on('click', function (e) {
        e.preventDefault();
        var position = $(this).data('index');
        $('.slides-carousel').slick('slickGoTo', position);
        $('#thumbSlider .nav-link').removeClass('active');
        $(this).addClass('active');
    });


    // type js
    if ($('#typed').length && $('#typed-strings').length) {
        var typed = new Typed('#typed', {
          stringsElement: '#typed-strings',
          loop: true,
          typeSpeed: 40,
          backSpeed: 40,
          backDelay: 2000,
          startDelay: 1000,
        });
    }

    if ($('#typpedCaption').length) {
        var typed = new Typed('#typpedCaption', {
            strings: [ '<h1> <strong>GRATUIS,</strong> Méthodes d&#39;attirer les Clients</h1>' ],
            typeSpeed: 40,
            onComplete: (self) => {
                $(self.cursor).fadeOut(2000, function () {
                    $(this).remove();
                });
            },
        });
    }
});
