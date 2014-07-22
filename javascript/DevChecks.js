(function($) {

	var data = "$Data".split('[]');

	for(var i = 0; i < data.length; i++) {
		if(data[i]) {
			var arr = data[i].split('||');
			if(arr[2] == 'true') {
				arr[2] = '1';
			} else if(arr[2] == 'false') {
				arr[2] = '0';
			}
			console.log(arr);
			var current = {
				'type': parseInt(arr[1]),
				'value': parseInt(arr[2]),
				'message': arr[3]
			};
			if(current['value'] == 1) {
				switch(current['type']) {
					case 0:
						$('.cms-login-status').append(createSerious(arr[3]));
						break;
					case 1:
						$('.cms-login-status').append(createWarning(arr[3]));
						break;
					case 2:
						$('.cms-login-status').append(createInfo(arr[3]));
						break;
				}
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