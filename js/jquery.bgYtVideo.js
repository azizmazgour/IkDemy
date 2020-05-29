v = [];

(function( $ ) {

	$.fn.bgYtVideo = function() {

		this.each(function() {
			$(this).append('<div></div>');

			var videoId = $(this).data('videoid');
			v[v.length] = [$(this).find('div')[0], videoId]
		});

		return this;
	};

}( jQuery ));



//Load YouTube API
$( document ).ready(function() {
	var tag = document.createElement('script');
	tag.src = "http://www.youtube.com/iframe_api";

	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
});


function onYouTubeIframeAPIReady() {

	for (i = 0; i<v.length; i++){
		var container = v[i][0];
		var videoid = v[i][1];
		var ytParams = {
			'autoplay': 1,
			'controls': 0,
			'loop': 1,
			'modestbranding': 1,
			'origin': window.location.origin,
			'playlist': v[i][1],
			'rel': 0,
			'showinfo': 0,
			'wmode': 'transparent',
		};

		vSize = calculateSize($(container).parent(), videoid)

		new YT.Player( container, {
				videoId: videoid,
				width: vSize[0],
				height: vSize[1],
				playerVars:  ytParams,
				events: { 
					'onReady': function(event){ 
						event.target.mute();
						event.target.playVideo();
						$(event.target.a).css('border', 'none');
						$(event.target.a).css('position', 'relative');
						$(event.target.a).css('margin-top', vSize[2]);
					} 
				}
		});


		
	}
}

function getAspectRatio(videoid){
	$.ajax({ 
		url: 'http://gdata.youtube.com/feeds/api/videos/'+videoid+'?v=2&alt=jsonc', 
		dataType: 'json', 
		async: false, 
		success: function(json){ 
			aspectRatio = (json.data.aspectRatio == 'widescreen')? (16/9) : (4/3);
		} 
	});

	return aspectRatio
}

function calculateSize($container, videoid){
	var cWidth = $container.width();
	var cHeight = $container.height();
	var cRatio = cWidth / cHeight;
	var vRatio = getAspectRatio(videoid);

	if(cRatio > vRatio) {
		vWidth = cWidth
		vHeight = cWidth / vRatio
		vMarginTop = (cHeight - vHeight)/2
	} else {
		vHeight = cHeight
		vWidth = vHeight * vRatio
		vMarginTop = 0
	}
	
	return [vWidth, vHeight, vMarginTop]
}