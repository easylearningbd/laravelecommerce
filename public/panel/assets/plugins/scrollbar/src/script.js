$(document).ready(
    function() {  
      
      var winHeight = $(window).height();
      var height = winHeight - 200;
      $("nav").css("height", height);
      
      $("#nice-scroll").niceScroll({cursorfixedheight: 100});  
});

$(window).resize( 
    function() {
      var winHeight = $(window).height();
      var height = winHeight - 200;
      
      $("nav").css("height", height);
});

