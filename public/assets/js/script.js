
$(function () {
    
    var serviceSlider = $(".slides-carousel").slick({
        infinite: false,
        arrows: false,
        autoplaySpeed: 3000,
        autoplay: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                slidesToShow: 3,
                infinite: true
                }
        
            }, {
        
                breakpoint: 600,
                settings: {
                slidesToShow: 2,
                dots: true
                }
        
            }
        ]
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
            strings: [ '<h1> <strong>GRATUIS ,</strong>Méthodes d&#39;attirer les Clients</h1>' ],
            typeSpeed: 40,
            onComplete: (self) => {
                $(self.cursor).fadeOut(2000, function () {
                    $(this).remove();
                });
            },
        });
    }


    console.log('efef');
    //Fade in delay for the background overlay (control timing here)
	$("#bkgOverlay").delay(4800).fadeIn(400);
    //Fade in delay for the popup (control timing here)
      $("#delayedPopup").delay(5000).fadeIn(400);
      
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


$(document).ready(function ()
{});
	



