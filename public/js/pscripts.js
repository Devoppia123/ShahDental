//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
var a = 0;
function nextbutton(){
	if(animating) return false;
	animating = true;
	a += 1;
    //current_fs = $(this).parent();
	if(a == 1){
    current_fs = $("#fieldset-step");
   next_fs = current_fs.next();
   }else if(a == 2){
     current_fs = $("#fieldset-step2");
   next_fs = current_fs.next();
       
   }else if(a == 3){
    current_fs = $("#fieldset-step3");
   next_fs = current_fs.next();    
   }else if(a == 4){
    current_fs = $("#fieldset-step4");
   next_fs = current_fs.next();    
   }
    else{
       
       current_fs = $(this).parent();
    next_fs = $(this).parent().next();
       
   } 
   // alert(current_fs);
    //current_fs = current_fs.parent();
    //next_fs = $(this).parent().next();
//	next_fs = current_fs.next();
    
	
	//activate next step on progressbar using the index of next_fs
    if(a == 1 ){
	$("#progressbar li.step2").eq($(".fieldset-step2").index(next_fs)).addClass("active");
	}
    if(a == 2){
	$("#progressbar li.step3").eq($(".fieldset-step3").index(next_fs)).addClass("active");
	}
	
	if(a == 3 ){
		$("#progressbar li.step4").eq($(".fieldset-step4").index(next_fs)).addClass("active");
	}
    
    if(a == 4){
      
        $("#progressbar li.step5").eq($(".fieldset-step5").index(next_fs)).addClass("active");
    }
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 500, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
	
	//activate next step on progressbar using the index of next_fs
//	$("#progressbar li.step2").eq($(".fieldset-step2").index(next_fs)).addClass("active");
    
    
    
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 500, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
}




$(".bck-btn").click(function(){
	if(animating) return false;
	animating = true;
	a -= 1;
    
   // alert("helo");
  /*  if(a == 0){
    current_fs = $("#fieldset-step");
   previous_fs = current_fs.prev();
   }
    */
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($(".fieldset-step").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 500, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
	
	
});


$(".bck-btn").click(function(){
    if(animating) return false;
    animating = true;
    a -= 1;
    
   // alert("helo");
  /*  if(a == 0){
    current_fs = $("#fieldset-step");
   previous_fs = current_fs.prev();
   }
    */
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //de-activate current step on progressbar
    $("#progressbar li").eq($(".fieldset-step").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show(); 
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            left = ((1-now) * 50)+"%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'left': left});
            previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
        }, 
        duration: 500, 
        complete: function(){
            current_fs.hide();
            animating = false;
        }, 
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
    
    
});

$(".submit").click(function(){
	return false;
})

