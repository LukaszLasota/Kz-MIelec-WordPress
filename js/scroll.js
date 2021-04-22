

import $ from 'jquery';

// Customize Settings: For more information visit www.blogsynthesis.com/plugins/jquery-smooth-scroll/
 
  // When to show the scroll link
  // higher number = scroll link appears further down the page	
  var upperLimit = 100; 
    
  // Our scroll link element
  var scrollElem = $('a#scroll-to-top');
  
  // Scroll Speed. Change the number to change the speed
  var scrollSpeed = 700;
  
  // Choose your easing effect http://jqueryui.com/resources/demos/effect/easing.html
  var scrollStyle = 'swing';
  
/****************************************************
 *                                                  *
 *      JUMP TO ANCHOR LINK SCRIPT START            *
 *                                                  *
 ****************************************************/
  


  // Scroll to top animation on click
  $(scrollElem).click(function(){ 
    $('html, body').animate({scrollTop:0}, scrollSpeed, scrollStyle ); return false; 
  });

/****************************************************
 *                                                  *
 *      JUMP TO ANCHOR LINK SCRIPT START            *
 *                                                  *
 ****************************************************/

  $('a[href*="#"]:not([href="#"]):not([href^="#tab"]):not([href^="#collapse"])').click(function()
  {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
        || location.hostname == this.hostname) 
    {
      
      var target = $(this.hash),
      headerHeight = $(".header").height() + 5; // Get fixed header height
            
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              
      if (target.length) 
      {
        $('html,body').animate({ scrollTop: target.offset().top -65 }, scrollSpeed, scrollStyle );
        return false;
      }
    }
  });
  

/****************************************************
 *                                                  *
 *   FOLLOW BLOGSYNTHESIS.COM FOR WORDPRESS TIPS    *
 *                                                  *
 ****************************************************/
 
// });