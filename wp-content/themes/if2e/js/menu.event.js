;(function ($){
	function FMenuEffect(selector) {

		if (typeof selector === 'undefined') return;

		if (!(selector.nodeType)) {
			if ($(selector).length === 0) return;
		}

		var _this = this;

		_this.selector = $(selector);

		_this.selector.on('click mouseenter mouseleave','li[data-box="subMenu"]',function (e){
			var _t = $(this),
				_arrow = _t.find('i'),
				_subMenu = _t.find('ul.menu-child'),
				nChild = _subMenu.children().length;

			if (e.type === 'click') {
				_subMenu.height(nChild * 56);

			}else if(e.type === 'mouseleave'){
				_arrow.removeClass('arrow-down-white')
					.addClass('arrow-down-blue');
				_subMenu.height(0);
			}else{
				_arrow.removeClass('arrow-down-blue')
					.addClass('arrow-down-white');
			}

			return false;
		});


	}

	FMenuEffect.prototype = {
		constructor: FMenuEffect,
		init: function (){

		}
	};

	var fMenuEffect = new FMenuEffect('#MENU');
})(jQuery);
