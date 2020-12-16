 /* Inicialização do WOW */
 new WOW().init();
 /* Fim do wow */

 /*Inserção do parallax*/
  $(document).ready(function(){
    $('.parallax').parallax();
  });

 /*Js do slider*/

   window.onload = function() {
    var elems = document.querySelectorAll('.carousel');
    var options = {
    	//fullWidth: true,
  		numVisible: 3,
  		indicators: true
    }
    var instances = M.Carousel.init(elems, options);


	  var b = document.querySelector("#btn-proximo");

	  setInterval(next, 5000);

};
	
	//Funções de movimentação do Slider

  	function next(){
  		var elem = document.querySelector('.carousel');
	 	var instance = M.Carousel.getInstance(elem);
	  	instance.next();
  	}

 	function previous(){
  		var elem = document.querySelector('.carousel');
	 	var instance = M.Carousel.getInstance(elem);
	  	instance.prev();
  	}

  	//Movimentação por setas

  	document.onkeydown = checkKey;

	function checkKey(e) {

    	e = e || window.event;

	    if (e.keyCode == '37') {
	    	previous();
	       // left arrow
	    }
	    else if (e.keyCode == '39') {
	    	next();
	       // right arrow
	    }
}

  // Menu transparente/solido com scroll

  $(document).ready(function(){
          
          $(window).scroll(function(){

            if($(window).scrollTop()>400){
              $('nav').addClass('menu-solido');
            }else{
              $('nav').removeClass('menu-solido');
            }

          });

     });

// Menu responsívo
  $(document).ready(function(){
    $('.sidenav').sidenav();
  })

// Zoom imagem
   $(document).ready(function(){
    $('.materialboxed').materialbox();
  });

// Scroll suave
// Select all links with hashes

$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 600);
});