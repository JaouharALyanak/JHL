import { Collapse, Modal } from 'bootstrap';
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

    const urlParams = new URLSearchParams(window.location.search);
    const utm_source = urlParams.get('utm_source');

    if ($('#modalId').length && utm_source != null ) {
        const modalForm = new Modal('#modalId');
        modalForm.show();
    }




    console.log('efef');
    //Fade in delay for the background overlay (control timing here)
	$("#bkgOverlay").delay(4000).fadeIn(400);
    //Fade in delay for the popup (control timing here)
    //   $("#modalId").delay(5000).fadeIn(400);
    //   const modalForm = new Modal('#modalId');
    //   modalForm.delay(5000).show();
    setTimeout(function() {
        const modalForm = new Modal('#modalId');
        modalForm.show();
    }, 4000);
      //Hide dialouge and background when the user clicks the close button
      $("#btnClose").click(function (e)
      {
          HideDialog();
          e.preventDefault();
      });
  
  



});


//Controls how the modal popup is closed with the close button
function HideDialog()
{
    $("#bkgOverlay").fadeOut(400);
    $("#delayedPopup").fadeOut(300);
}
