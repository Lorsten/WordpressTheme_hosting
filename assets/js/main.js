//Create an object to check if button is active
var active_button = new Object();
active_button.button = false;


$(document).ready(function () {

  //Change class when hovering of the post element
    $('#articles .post').hover(function(){
    $(this).toggleClass('post-animation');
  });
  $(window).scroll(function(){
    var scrollTop = $(window).scrollTop();
    if(scrollTop > 50){
      $('#header-bar').css('background', 'rgba(73, 133, 196, 0.9');
    }
    else{
      if(scrollTop < 100){
        $('#header-bar').css('background', 'none');
      }
    }
    
  });
  // Function for openeing the hamburgermenu
  $(".hamburger").on("click", function () {
    //Disable the button
    $(this).attr("disabled", true);
    //Check if the h1 element is not visible and create a timeout for it to appear
    if ($('header h1').css('display') === 'none') {
      $(function () {
        function showH1() {
          $('header h1').css('display', 'block');
        }
        window.setTimeout(showH1, 450); // 5 seconds
      });
    } else {
      $('header h1').css('display', 'none');
    }
     //Change class on the menu to animate
    $(".hamburger").toggleClass('hamburger--elastic is-active');
    //Create a sldie toogle for the menu
    $("header nav").slideToggle('slow', function(){
     if(active_button.button === false){
      active_button.button = true;
     }
     else{
      active_button.button = false;
     }
    });

   //Set a timeout for the button when to make it active again
    function disableButton() {
      $(".hamburger").removeAttr("disabled");
    }
    window.setTimeout(disableButton, 700); // 5 seconds
  });
});
//Create a function when window resizing
window.onresize = function () {
  var element = document.querySelector('header h1');
  //Check if the window size is larger than 801 and make the header nav visible and the header
  if (document.body.clientWidth > 801) {
    document.querySelector('header nav').style.display = 'block';
      element.style.display = 'block';
      //Else if width is less than 801 and button is active make the header h1 invisible
  } else if (document.body.clientWidth < 801) {
    document.querySelector('header nav').style.display = 'none';
    if (active_button.button === true){
      document.querySelector('header nav').style.display = 'block'; 
      element.style.display = 'none';
      // IF both header h1 and nav is visible make header h1 invisible
    } else if (element.style.display == 'block' && document.querySelector('header nav').style.display == 'block') {
      element.style.display = 'none';
    }
    // else make menu invisible and header h1 visible
    else{
      document.querySelector('header nav').style.display = 'none'; 
      element.style.display = 'block';
    }
  }
}

