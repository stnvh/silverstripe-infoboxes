(function($) {

	var data = "$Data".split('[]');

	for(var i = 0; i < data.length; i++) {
		if(data[i]) {
			var arr = data[i].split('||');
			var current = {
				'type': parseInt(arr[1]),
				'message': arr[2]
			};
			switch(current['type']) {
				case 0:
					$('.cms-login-status').append(createSerious(current['message']));
					break;
				case 1:
					$('.cms-login-status').append(createWarning(current['message']));
					break;
				case 2:
					$('.cms-login-status').append(createInfo(current['message']));
					break;
			}
		}
	}

	function createInfo(text) {
		return '<div class="devcheck info">' + text + '</a>';
	}

	function createWarning(text) {
		return '<div class="devcheck warning">' + text + '</a>';
	}

	function createSerious(text) {
		return '<div class="devcheck serious">' + text + '</a>';
	}

})(jQuery);