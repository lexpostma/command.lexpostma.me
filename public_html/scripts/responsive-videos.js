$(function() {
   
//     var $allVideos = $("iframe[src^='//player.vimeo.com'], iframe[src^='//www.youtube.com'], iframe[src^='http://www.dumpert.nl'], object, embed"),
    var $allVideos = $("iframe[src^='//player.vimeo.com'], iframe[src^='//www.youtube.com'], iframe[src^='https://www.kickstarter.com/'], iframe[src^='http://www.dumpert.nl'], object, embed"),

    $fluidEl = $("figure");
	    	
	$allVideos.each(function() {
	
	  $(this)
	    // jQuery .data does not work on object/embed elements
	    .attr('data-aspectRatio', this.height / this.width)
	    .removeAttr('height')
	    .removeAttr('width');
	
	});
	
	$(window).resize(function() {
	
	  var newWidth = $fluidEl.width();
	  $allVideos.each(function() {
	  
	    var $el = $(this);
	    $el
	        .width(newWidth)
	        .height(newWidth * $el.attr('data-aspectRatio'));
	  
	  });
	
	}).resize();

});

//VIDEO
//<iframe width="480" height="360" src="https://www.kickstarter.com/projects/nativeunion/jump-the-first-charging-solution-that-fits-your-li/widget/video.html" frameborder="0" scrolling="no"> </iframe>

//EMBED
//<iframe frameborder="0" height="380" scrolling="no" src="https://www.kickstarter.com/projects/nativeunion/jump-the-first-charging-solution-that-fits-your-li/widget/card.html" width="220"></iframe>

//   iframe[src^='https://www.kickstarter.com/.../video.html'],