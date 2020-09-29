// Fix the navbar and change its size
$(function () {
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 80) {
            $(".js-navbar-scroll").addClass("scroll");
        } else {
            $(".js-navbar-scroll").removeClass("scroll");
        }
    })
});

// Showing the popup about eye disease (cataract)
$('.modal-toggle-cataract').on('click', function (e) {
    e.preventDefault();
    $('.modal-disease-cataract').addClass('is-visible');
});

// Showing the popup about eye disease (glaucoma)
$('.modal-toggle-glaucoma').on('click', function (e) {
    e.preventDefault();
    $('.modal-disease-glaucoma').addClass('is-visible');
});

// Close the popup about eye disease (cataract)
$('.modal-close').on('click', function (e) {
    e.preventDefault();
    $('.modal-disease-cataract').removeClass('is-visible');
});

// Close the popup about eye disease (glaucoma)
$('.modal-close').on('click', function (e) {
    e.preventDefault();
    $('.modal-disease-glaucoma').removeClass('is-visible');
});

// Open Lightbox (gallery)
$('.open-lightbox').on('click', function (e) {
    e.preventDefault();
    let image = $(this).attr('href');
    $('html').addClass('no-scroll');
    $('.gallery').append('<div class="lightbox-opened"><img src="' + image + '"></div>').fadeIn();
});

// Close Lightbox (gallery)
$('body').on('click', '.lightbox-opened', function () {
    $('html').removeClass('no-scroll');
    $('.lightbox-opened').remove();
});

// Scroll to the top of the page using a button
let btn = $('#scroll-to-top');
$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

// Scroll smoothly when clicking on a link
$('.js-anchor-link').click(function (e) {
    e.preventDefault();
    let target = $($(this).attr('href'));
    if(target.length){
      let scrollTo = target.offset().top;
      $('body, html').animate({scrollTop: scrollTo+'px'}, 850);
    }
});