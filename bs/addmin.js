 $(function(){

 	$("#menu-toggle").click(function(e){
 		e.preventDefault();
 		$("#wrapper").toggleClass("menuDisplayed");

 	});

 	$(".search_wrapper").click(function(e){
 		e.preventDefault();
 		$(".search").show();
 	});
});
