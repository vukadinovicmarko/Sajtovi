$(document).ready(function(){
	
	
	$("#sajt_gore").animate({"margin-top":"0px"},1000)
	
	
		
	
	
	var lastScrollTop = 0;
	var delta = 5;
	var navbarHeight = $('#menu').outerHeight();
	var sajtGore = $('#sajt_gore').outerHeight();
	
	
	var skrol_prvi_put;
	// on scroll, let the interval function know the user has scrolled
	$(window).scroll(function(event){
		 
	  skrol_prvi_put = true;
	  
	});
//	var mare = $("#menu").offset().top
			
	
	// run hasScrolled() and reset didScroll status
	setInterval(function(){
		if (skrol_prvi_put){
			skrolovano_je();
			skrol_prvi_put = false;
		}
	}, 250);

		function skrolovano_je(){
			
			var st = $(this).scrollTop();
		
			if (Math.abs(lastScrollTop-st) <= delta){
				return;
			}
		
			// If current position > last position AND scrolled past navbar...
			if (st > lastScrollTop && st > navbarHeight){
				
			
			
				// Scroll Down
				$("#sajt_gore").css({"box-shadow":"0px 10px 30px black"});
				// $("#sajt_sredina").css({"box-shadow":"0px 20px 150px black"});
				$("#menu").css({"box-shadow":"0px 5px 15px black"});
				$("#menu").css({"margin":"2px auto"});
				
				$("#heder_sadrzaj").fadeOut();
				$("#menu").hover(function(){
					$(this).css({"box-shadow":"0px 0px 25px black"})
				},
				function(){
					$(this).css({"box-shadow":"0px 0px 10px black"})
				});
			}
			
			else{
				// Scroll Up
				// If did not scroll past the document (possible on mac)...
				// $("#sajt_sredina").css({"box-shadow":"0px 20px 150px black"});
				
				
				if(st + $(window).height() < $(document).height()) { 
					
				}
			}
			if($(window).scrollTop() == 0){
				$("#heder_sadrzaj").fadeIn(1000);
				$("#menu").css({"box-shadow":"0px 5px 15px silver"});
				$("#menu").hover(function(){
					$(this).css({"box-shadow":"0px 0px 25px silver"})
				},
				function(){
					$(this).css({"box-shadow":"0px 0px 10px silver"})
				});
				// $("#sajt_sredina").css({"box-shadow":"0px 10px 30px black"});
				$("#sajt_gore").css({"box-shadow":"0px 15px 50px black"});
			}
			
			if($(window).scrollTop() + $(window).height() == $(document).height()){
				
				$("#sajt_dole").css({"box-shadow":"0px -25px 75px black"});	
				// $("#sajt_sredina").css({"box-shadow":"0px 10px 30px black"});
			}
			
			if (st > lastScrollTop && st > sajtGore-150){
				
				}
			
			
			
		
		
			lastScrollTop = st;
			// do stuff here...
			
		}
		
		
	
	
});

