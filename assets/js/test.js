$(function () {
    $(window).scroll(function() {
        if ($(window).scrollTop() >= 80) {
            $(".js-navbar-scroll").addClass("scroll");
        }
        else {
            $(".js-navbar-scroll").removeClass("scroll");
        }
    })
})


$(document).ready(function () {  
    $(".card-body").click(function() {
      $(this).toggleClass("active");
      if ($(this).hasClass("active")) {
        $(this).text("Dr Radwan's response");
      } else {
        $(this).text("What is cataract ?");
      }
    });
});

