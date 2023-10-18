$(document).ready(function () {
    $("#showHide").click(function () {
      $("#content").fadeToggle(500);
      if ($("#cb").prop("checked")) {
        $("#cb").prop("checked", false);
        $("#showHide").html("Show More");
      } else {
        $("#showHide").html("Show Less");
        $("#cb").prop("checked", true);
      }
    });
  
    $(".card-slider").slick({
      dots: false,
      infinite: false,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 4,
      autoplay: false,
      autoplaySpeed: 2000,
      arrows: true,
      prevArrow:
      '<span class="priv_arrow_index rotate-180"><img class="p-4 w-full h-full" src="./assets/image/next_arr.svg"></span>',
      nextArrow:
      '<span class="next_arrow_index "><img class="p-4 w-full h-full" src="./assets/image/next_arr.svg"></span>',
      responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,

          },
        },
        {
          breakpoint: 900,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            prevArrow:
              '<span class="priv_arrow rotate-180"><img class="p-4 w-full h-full" src="./assets/image/next_arr.svg"></span>',
            nextArrow:
              '<span class="next_arrow "><img class="p-4 w-full h-full" src="./assets/image/next_arr.svg"></span>',
          },
        },
        {
          breakpoint: 700,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow:
              '<span class="priv_arrow rotate-180"><img class="p-4 w-full h-full" src="./assets/image/next_arr.svg"></span>',
            nextArrow:
              '<span class="next_arrow "><img class="p-4 w-full h-full" src="./assets/image/next_arr.svg"></span>',
          },
        },
      ],
    });
  });
  