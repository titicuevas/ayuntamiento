/**
  * Theme Js file.
**/

// ===== Mobile responsive Menu ====

function kindergarten_playgroup_menu_open_nav() {
  jQuery(".sidenav").addClass('open');
}
function kindergarten_playgroup_menu_close_nav() {
  jQuery(".sidenav").removeClass('open');
}

// ===== Scroll to Top ====

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

// ===== Loader ====

jQuery('document').ready(function($){
  setTimeout(function () {
  jQuery(".loader").fadeOut("slow");
  },1000);
});

function myFunction() {
var popup = document.getElementById("myPopup");
popup.classList.toggle("show");

if (popup.paused){
    popup.play();
    }
  else{
    popup.pause();
    }

}

//Video popup onclick
jQuery('document').ready(function(){
  jQuery(".v-btn").click(function(){
    var modal_url= jQuery(this).attr("data-videos-url");
    var elem = document.getElementById('video_url');
    elem.src = modal_url;
  }); 
});

jQuery(window).scroll(function() {
  var data_sticky = jQuery('.headerbox').attr('data-sticky');

  if (data_sticky == "true") {
    if (jQuery(this).scrollTop() > 1){
      jQuery('.headerbox').addClass("stick_head");
    } else {
      jQuery('.headerbox').removeClass("stick_head");
    }
  }
});
