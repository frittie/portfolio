var $ = jQuery;

$(document).ready(function(){
	setHeight();
	updateHeight();

	//Stänger mobilmenyn när man har klickat på ett menyalternativ
	$('.overlay-menu').on('click',function() {
		$('#overlay').toggleClass('open');
		$('.button_container').toggleClass('active');
	});

	//Klickfunktion för menyn i mobile/tablet
	$('#toggle').click(function() {
		$(this).toggleClass('active');
   		$('#overlay').toggleClass('open');
	});

	//När man har scrollat förbi header och kommer till #about adderas en class för att menyn ska få en annan bakgrundsfärg
	$(window).scroll(function () {
		var header = $(this).scrollTop();
		var about = $('#about').offset().top -50;

		if (header >= about) {
		    $(".menu").addClass("menu-color");
		} else{
		    $(".menu").removeClass("menu-color");
		}
	});

	//Menu, scroll to section
	var isScrolling = false;
	
	if($('body').hasClass('home')) {
		$('.menu li a').click(function(e) {
			var url = $(this).attr('href');
			
			if(url.indexOf('#') > -1) {
				e.preventDefault();

				var target = url.substring(url.indexOf('#'), url.length);

				isScrolling = true;

				$(".menu li").each(function() {
					$(this).removeClass('current_page');
				})

				$('html, body').stop().animate({
					scrollTop: $(target).offset().top
				}, 500, 'swing', function(){
					isScrolling = false;
				});
			}
		});
	}

	//När man klickar på pilen i header scrollas man till nästa section
	TweenMax.to($(".fa-chevron-down"), 2, {repeat: -1, y: "10px", alpha: 0});

	$('.fa-chevron-down').bind('click',function(e){
		$('html, body').stop().animate({
			scrollTop: $("#about").offset().top
		}, 500);
		
		e.preventDefault();
	});	
	
	//Toggle description on project, bara i desktop
	$('.project-image').hover(function(){
		if($(window).width() >= 768) {
			$(this).find('.project-description').fadeToggle('slow');
	    } else {

    	}
	});
});

//För att kunna sätta height '100vh' i safari kollar vi höjden på fönstret
function setHeight() {
	var height = $(window).height();
	var width = $(window).width();

	$('header').css('height', height);
	$('#contact').css('height', height);
}

//Funktion som uppdaterar window.height() när man resizear fönstret
function updateHeight() {
	$(window).resize(function() {
		var height = $(window).height();
		var width = $(window).width();

		$('header').css('height', height);
		$('#contact').css('height', height);
	});
}
	

