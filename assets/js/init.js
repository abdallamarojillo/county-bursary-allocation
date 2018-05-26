(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();
    
    
     $('#explanatory-carousel').carousel({full_width: true,time_constant:200});

     
     //make the carousel to autoplay
     function carouselAutoplay(c,i) {
        //
        window.setInterval(function(){
      $(c).carousel('next')},i); //time interval
        
        
     }
     
    
     
     carouselAutoplay($('#explanatory-carousel'),15000);
     
  }); // end of document ready
})(jQuery); // end of jQuery name space