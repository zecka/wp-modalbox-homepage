jQuery(document).ready(function($){
	
	
	function openModalNewsletter(){
		//window.location.hash = "newsletter";
		$('.zk-modal').addClass('active');
	}
	function setCookieHidePopup(){
		if ($('.zk-hidepopup input').is(':checked')) {
			//console.log('zk-close-modal and dont show again');
			$.cookie('hidepopup', 'hide', { expires: 180 });
		}else{
    		//console.log('zk-close-modal');
    	}
	}
	
	if ($("body").hasClass("home") && $.cookie('hidepopup') != 'hide') {
		 setTimeout(openModalNewsletter, 3000)
	}

	
	$('.zk-close-modal').click(function() {
		$('.zk-modal').removeClass('active');
		setCookieHidePopup();
	})
	

	
	$(document).keyup(function(e) {
	     if (e.keyCode == 27) { // escape key maps to keycode `27`
	        if(window.location.hash=="#newsletter"){
       	        window.location.hash = "close"; 
	   			setCookieHidePopup();
	        }
	    }
	});
		
	
});