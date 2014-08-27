;(function ($){
	//147....258....369....样式设置
	var _POST = $('#POST'),
		_post_box = _POST.find('section.post-box');

	$.each(_post_box,function (n){
		var _mod = n % 3,
			_t = $(this);

		switch (_mod) {
		case 0:
			_t.addClass('post-box_1');
		    break;
		case 1:
			_t.addClass('post-box_2');
			break;
		default:
			_t.addClass('post-box_3');

		}

	});

})(jQuery);