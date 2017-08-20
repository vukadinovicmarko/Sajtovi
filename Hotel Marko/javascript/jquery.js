$(document).ready(function(){
	$("#leva_kolona").fadeOut(100);
	
	$(".tekst").animate({"width":"650px","height":"+=20px","margin-left":"-250px","margin-right":"150px"}, 1000);
	$(".naslov").css({"text-align":"center"});
	$(".tekst").animate({"width":"500px","margin-left":"-250px","margin-right":"50px"}, 1000);
	$(".slika").fadeIn("slow");
	$(".tekst2").animate({"margin-top":"-40px"});
	$(".tekst").hover(function(){
		
		$(this).css({"background-color":"rgba(232,153,53,0.1)","font-size":"+=0.1px"},1000);
	},
	function(){
		$(this).css({"background":"none","font-size":"-=0.1px"},1000);
		
	});
	$(".tekst1").fadeIn(1000);
	$(".leva_kolona1").animate({"margin-left":"+=20px"},1000);
	$(".leva_kolona").animate({"margin-left":"+=20px"},1000);
	
	
	
		
		$(".deoSlika").show(1000);	
		$(".deoSlika").animate({"margin-left":"-=80px"},1000);	
		$(".bla").hide();
		
	
	
	$(".galerija").fadeIn(2000);
	$(".galerija:odd").hover(function(){
		$(this).css({"background-color":"rgba(215,55,50,0.1)"});
	},
		function(){
			$(this).css({"background":"none"});	
			
		});
	$(".galerija:even").hover(function(){
		$(this).css({"background-color":"rgba(255,215,15,0.1)"});
	},
		function(){
			$(this).css({"background":"none"});	
			
		});
	$(".dvokrevetne img").hover(function(){
		$(this).css({"transform": "scale(1.2,1.2)"}, 1000);
		$(".dvokrevetne h2").css({"padding-bottom":"20px"}, 1000);
		},        
    function(){
		$(this).css({"transform": "none"}, 1000);
		$(".dvokrevetne h2").css({"padding-bottom":"5px"}, 1000);
		});
		
	$(".junior img").hover(function(){
		$(this).css({"transform": "scale(1.2,1.2)"}, 1000);
		$(".junior h2").css({"padding-bottom":"20px"}, 1000);
		},        
    function(){
		$(this).css({"transform": "none"}, 1000);
		$(".junior h2").css({"padding-bottom":"5px"}, 1000);
		});
		
	$(".senior img").hover(function(){
		$(this).css({"transform": "scale(1.2,1.2)"}, 1000);
		$(".senior h2").css({"padding-bottom":"20px"}, 1000);
		},        
    function(){
		$(this).css({"transform": "none"}, 1000);
		$(".senior h2").css({"padding-bottom":"5px"}, 1000);
		});
		
	$(".restoran img").hover(function(){
		$(this).css({"transform": "scale(1.2,1.2)"}, 1000);
		$(".restoran h2").css({"padding-bottom":"20px"}, 1000);
		},        
    function(){
		$(this).css({"transform": "none"}, 1000);
		$(".restoran h2").css({"padding-bottom":"5px"}, 1000);
		});
		
	$(".conference img").hover(function(){
		$(this).css({"transform": "scale(1.2,1.2)"}, 1000);
		$(".conference h2").css({"padding-bottom":"20px"}, 1000);
		},        
    function(){
		$(this).css({"transform": "none"}, 1000);
		$(".conference h2").css({"padding-bottom":"5px"}, 1000);
		});	
		
	$(".galerija1").slideDown(1500);

		
	$(".galerija1 img").hover(function(){
		$(this).css({"transform": "scale(1.2,1.2)"});
		
		},        
    function(){
		$(this).css({"transform": "none"});
		
		});	
		
	$(".sitemap").animate({"margin-top":"-40px"},1000);	
	
	$(".tekst3").animate({"margin-top":"-30px"},1000);
	$(".slike_desno").animate({"margin-top":"-30px"},1000);
	
});