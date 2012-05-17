(function($){
	
	$.randomImage = {
		defaults: {
			
			//you can change these defaults to your own preferences.
			path: '/resources/images/', //change this to the path of your images
			myImages: [['home-about-wendel.jpg', '/about' ],['home-personal-injury.jpg', '/practice_areas/personal_injury'], ['home-dui.jpg', '/practice_areas/ohio'] ]//put image names & corresponding links in brackets			
		}			
	}
	
	$.fn.extend({
			randomImage:function(config) {
				
				var config = $.extend({}, $.randomImage.defaults, config); 
				
				 return this.each(function() {
						
						var imageNames = config.myImages;
						
						//get size of array, randomize a number from this
						// use this number as the array index

						var imageNamesSize = imageNames.length;

						var lotteryNumber = Math.floor(Math.random()*imageNamesSize);

						var winnerImage = imageNames[lotteryNumber][0];

						var fullPath = config.path + winnerImage;
						
						var imageLink = imageNames[lotteryNumber][1];
						
						
						//put this image into DOM at class of randomImage
						// alt tag will be image filename.
						$(this).attr( {
										src: fullPath,
										alt: winnerImage
									});
				
        				$(this).parent().attr( {
										href: imageLink
									});
						
				});	
			}
			
	});
	
	
	
})(jQuery);