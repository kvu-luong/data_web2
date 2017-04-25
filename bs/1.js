$(function(){

 	$(window).scroll(function(){
 		var vitrihientai = $('body').scrollTop();

 		if(vitrihientai > 50){
 			$('.navbar-default').addClass('navbar-fixed-top');
  		}else{
  			$('.navbar-default').removeClass('navbar-fixed-top');
  		}

 	});

 	/*price filter*/
 	$(document).ready(function(){
 		var outputSpan = $('#spanOutput');
 		var sliderElement = $('#slider');

 		sliderElement.slider({//this line will create slider
 			range: true,
 			min: 0,
 			max: 1000,
 			values: [0, 300],
 			//this line below will get min and max value when we touch slider
 			slide : function(event, ui){
 				outputSpan.html(ui.values[0] + ' - ' + ui.values[1] + ' VND')
 			},
 			//this line below will get value and put it into textbox
 			stop: function(event, ui){
 				$('#txtMinPrice').val(ui.values[0]);
 				$('#txtMaxPrice').val(ui.values[1])
 			},
 		});
 		//get the min max default value.
 		outputSpan.html(sliderElement.slider('values',0)+' - '+sliderElement.slider('values',1)+' VND');
 		//this line below will put default value of max and min in textbox
 		$('#txtMinPrice').val(sliderElement.slider('values',0));
 		$('#txtMaxPrice').val(sliderElement.slider('values',1));

 	}) 


   /*display topbuttom*/
   $(window).scroll(function(){

   	var vitrihientai = $('body').scrollTop();
   
   if(vitrihientai > 100){
   		$('.topbutton').css({'opacity':1});
   }else{
   		$('.topbutton').css({'opacity':0});
   }
   });
   $('.topbutton').click(function(){
      $('body').animate({scrollTop:0},1000, "easeInQuad");
   });
   
  
}) ; 

 
   
   
 