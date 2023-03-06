/* Custom JS */

$(document).ready(function () {
  $(".exhibutionImages").slick({
    arrows: true,
    centerPadding: "0px",
    dots: false,
    slidesToShow: 1,
    infinite: true,
    autoplay: true,
		autoplaySpeed: 3000,
		draggable: false,
		fade: true,
    prevArrow:
      '<div class="prevArrow"><img src="/site_data/arrow_previous.png"></div>',
    nextArrow:
      '<div class="nextArrow"><img src="/site_data/arrow_next.png"></div>',
  });
});
