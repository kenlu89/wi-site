function change_image(src) {
	//$("main_image").src = src;
	// preview a new image.
	new Asset.image(src, {
		onload: function() { // sucess 
			var fx = new Fx.Morph('main_image', { duration: 300, transition: Fx.Transitions.Sine.easeOut });
			fx.start({ opacity: [1, 0] }).chain(function() {
				$('main_image').src = src;
				fx.start({ opacity: [0, 1] });
			});
		},
		onerror: function() { // 
			alert("No image!");
		}
	});
}
