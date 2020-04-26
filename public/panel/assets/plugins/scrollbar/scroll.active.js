 
      
      var winHeight = $(window).height();
      var height = winHeight - 200;
      $(".scrollbar").css("height", height);
      
      $(".nice_scroll").niceScroll({cursorfixedheight: 100});  

$(window).resize( 
    function() {
      var winHeight = $(window).height();
      var height = winHeight - 200;
      
      $(".scrollbar").css("height", height);
});