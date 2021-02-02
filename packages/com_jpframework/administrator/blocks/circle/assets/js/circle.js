
	let i=2;

	
	jQuery(document).ready(function(){
		var radius = 200;
		var fields = jQuery('.itemDot');
		var container = jQuery('.dotCircle');
		var width = container.width();
 radius = width/2.5;
 
		 var height = container.height();
		var angle = 0, step = (2*Math.PI) / fields.length;
		fields.each(function() {
			var x = Math.round(width/2 + radius * Math.cos(angle) - jQuery(this).width()/2);
			var y = Math.round(height/2 + radius * Math.sin(angle) - jQuery(this).height()/2);
			if(window.console) {
				console.log(jQuery(this).text(), x, y);
			}
			
			jQuery(this).css({
				left: x + 'px',
				top: y + 'px'
			});
			angle += step;
		});
		
		
		jQuery('.itemDot').click(function(){
			
			var dataTab= jQuery(this).data("tab");
			jQuery('.itemDot').removeClass('active');
			jQuery(this).addClass('active');
			jQuery('.CirItem').removeClass('active');
			jQuery( '.CirItem'+ dataTab).addClass('active');
			i=dataTab;
			
			jQuery('.dotCircle').css({
				"transform":"rotate("+(360-(i-1)*36)+"deg)",
				"transition":"2s"
			});
			jQuery('.itemDot').css({
				"transform":"rotate("+((i-1)*36)+"deg)",
				"transition":"1s"
			});
			
			
		});
		
		setInterval(function(){
			var dataTab= jQuery('.itemDot.active').data("tab");
			if(dataTab>6||i>6){
			dataTab=1;
			i=1;
			}
			jQuery('.itemDot').removeClass('active');
			jQuery('[data-tab="'+i+'"]').addClass('active');
			jQuery('.CirItem').removeClass('active');
			jQuery( '.CirItem'+i).addClass('active');
			i++;
			
			
			jQuery('.dotCircle').css({
				"transform":"rotate("+(360-(i-2)*36)+"deg)",
				"transition":"2s"
			});
			jQuery('.itemDot').css({
				"transform":"rotate("+((i-2)*36)+"deg)",
				"transition":"1s"
			});
			
			}, 5000);
		
	});

