import $ from 'jquery';

//HAMBURGER//

$(document).ready(function () {
  $(".hamburger").click(function () {
      $(this).toggleClass("is-active")
      $('.nav').toggleClass('activ');

  });
});


// MENU PRZYKLEJONE

window.onload = function() {
  
  // Variables
  var nav = document.querySelector('.fixed');
  var navTop = nav.offsetTop;
      
   // Functions
  function navFixed(e) {
      if(window.scrollY >= 240 & $(window).width() > 800) {
          nav.classList.add('is-fixed');
      } else {
        nav.classList.remove('is-fixed');
      }
  }

  // Event Listener
  window.addEventListener('scroll', navFixed);
  
}


$(function(){
  var fix = document.querySelector('.menu');
  
      $('.menu').each(function(){
          
        if( $(window).width() <= 800){
          $('.menu').addClass('fix');
        } else{
          $('.menu').removeClass('fix');
        }
      });
});




