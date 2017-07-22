$(document).ready(function () {
  $('[data-toggle="offcanvas"]').click(function () {
console.log('clicked');
    $('.row-offcanvas').toggleClass('active')
  });
});