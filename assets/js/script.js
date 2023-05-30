'use strict';

/**
 * navbar variables
 */
const menuToggleBtn = document.querySelector("[data-navbar-toggle-btn]");
const navbar = document.querySelector("[data-navbar]");

/**
 * element toggle function
 */

const elemToggleFunc = function (elem) { elem.classList.toggle("active"); }

menuToggleBtn.addEventListener("click", function () { elemToggleFunc(navbar); });




/**
 * go to top
 */

const goTopBtn = document.querySelector("[data-go-top]");

window.addEventListener("scroll", function () {

  if (window.scrollY >= 800) {
    goTopBtn.classList.add("active");
  } else {
    goTopBtn.classList.remove("active");
  }

});




function loopGif() {
  var gifImage = document.getElementById("gif-image");
  gifImage.src = gifImage.src; // Reload the same source to restart the GIF
}

// Set the loop interval to 10 seconds (10000 milliseconds)
setInterval(loopGif, 5000);

  var btn1 = document.getElementsByClassName("btn1");
  var slide = document.getElementById("slide");
  btn1[0].onclick = function(){
      slide.style.transform ="translateX(0px)";
      for(i=0; i<4; i++)
      {
          btn1[i].classList.remove("active");
      }
      this.classList.add("active");
  }
  btn1[1].onclick = function(){
      slide.style.transform ="translateX(-800px)";
      for(i=0; i<4; i++)
      {
          btn1[i].classList.remove("active");
      }
      this.classList.add("active");
  }
  btn1[2].onclick = function(){
      slide.style.transform ="translateX(-1600px)";
      for(i=0; i<4; i++)
      {
          btn1[i].classList.remove("active");
      }
      this.classList.add("active");
  }
  btn1[3].onclick = function(){
      slide.style.transform ="translateX(-2400px)";
      for(i=0; i<4; i++)
      {
          btn1[i].classList.remove("active");
      }
      this.classList.add("active");
  }