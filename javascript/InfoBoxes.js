(function($) {

	var data = $Data;

	for(var i = 0; i < data.length; i++) {
		if(data[i]) {
			var curr = data[i];
			switch(curr[0]) {
				case 0:
					$('.cms-login-status').append(createBox('serious', curr[1]));
					break;
				case 1:
					$('.cms-login-status').append(createBox('warning', curr[1]));
					break;
				case 2:
					$('.cms-login-status').append(createBox('info', curr[1]));
					break;
			}
		}
	}

	/**
	 * Creates the info box element markup
	 * @param {String} type either serious, warning or info
	 * @param {String} text the text to display in the markup
	 * @return {String}
	 */
	function createBox(type, text) {
		return '<div class="devcheck ' + type + '">' + text + '</a>';
	}

})(jQuery);