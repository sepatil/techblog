$(document).ready(function () {
  $(window).scroll(function () {
    if ($(window).scrollTop() > 10) {
      $("#navBar").addClass("floatingNav");
    } else {
      $("#navBar").removeClass("floatingNav");
    }
  });
});

var onResize = () => {
  $("body").css("padding-top", $(".fixed-top").height());
};
$(window).resize(onResize);

$(function () {
  onResize();
});
