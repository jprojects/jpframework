// Initialize WOW.js Scrolling Animations
new WOW().init();

jQuery(document).ready(function($) {

	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
	//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
	offset_opacity = 1200,
	//duration of the top scrolling animation (in ms)
	scroll_top_duration = 700,
	//grab the "back to top" link
	$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	jQuery(window).scroll(function(){
		( jQuery(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( jQuery(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		jQuery('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

	//Replace all SVG images with inline SVG
	jQuery('img.svg').each(function(){
		var $img = jQuery(this);
		var imgID = $img.attr('id');
		var imgClass = $img.attr('class');
		var imgURL = $img.attr('src');
		jQuery.get(imgURL, function(data) {
		    // Get the SVG tag, ignore the rest
		    var $svg = jQuery(data).find('svg');
		    // Add replaced image's ID to the new SVG
		    if(typeof imgID !== 'undefined') {
		        $svg = $svg.attr('id', imgID);
		    }
		    // Add replaced image's classes to the new SVG
		    if(typeof imgClass !== 'undefined') {
		        $svg = $svg.attr('class', imgClass+' replaced-svg');
		    }
		    // Remove any invalid XML tags as per http://validator.w3.org
		    $svg = $svg.removeAttr('xmlns:a');
		    // Replace image with new SVG
		    $img.replaceWith($svg);

		}, 'xml');
	});
	
	jQuery('.tos').click(function() {
		if(jQuery(this).is(':checked')) {  
            jQuery('.submit').removeAttr('disabled');  
        } else {  
            jQuery('.submit').attr('disabled', 'disabled');  
        } 
	});
	
	jQuery('.cr').click(function() {
		if(jQuery(this).is(':checked')) {  
            jQuery('.newsletter').val(1);  
        } else {  
            jQuery('.newsletter').val(0);  
        } 
	});

	jQuery('.lang-es').click(function(e){
    	e.preventDefault();
		var href = jQuery('#es').attr('data-href');
		document.location.href = href;
    });
    jQuery('.lang-ca').click(function(e){
    	e.preventDefault();
		var href = jQuery('#ca').attr('data-href');
		document.location.href = href;
    });
	
	setTimeout(function() {
    $('.message-container').fadeOut('fast');
	}, 8000);
	
	$('[data-toggle="tooltip"]').tooltip(); 
	
	//Performs a smooth page scroll to an anchor on the same page.
	jQuery('a[href*=#]:not([href=#])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		  //if( jQuery(this).attr("href")=="#bcarousel-home") return;//This is the exception change the id
		  var target = jQuery(this.hash);
		  target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
		  if (target.length) {
		    jQuery('html,body').animate({
		      scrollTop: target.offset().top -80
		    }, 1000);
		    return false;
		  }
		}
	});

});
