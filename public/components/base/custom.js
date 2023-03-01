/* Custom JS */

$(document).ready(function () {
  console.log("Load demo");
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
      '<div class="prevArrow"><img src="images/arrow_previous.png"></div>',
    nextArrow:
      '<div class="nextArrow"><img src="images/arrow_next.png"></div>',
  });
});
