(function($){
	'use strict'

	$.fn.printElement = function(options){
		let settings = $.extend({
			title	: jQuery('title').text(),
			css		: 'extend',
			ecss	: null,
			lcss	: [],
			keepHide: [],
			wrapper : {
						wrapper: null,
						selector: null,
					}
		}, options);

		const element = $(this).clone();
		let html = document.createElement('html');

		let head = document.createElement('head');
		if(settings.title != null && settings.title != ''){
			head = $(head).append($(document.createElement('title')).text(settings.title));
		}
		else{
			head = $(head);
		}

		if(settings.css == 'extend' || settings.css == 'link'){
			$('link[rel=stylesheet]').each(function(index, linkcss){
				head = head.append($(document.createElement('link')).attr('href', $(linkcss).attr('href')).attr('rel', 'stylesheet').attr('media', 'print'));
			})
		}

		for(var i = 0; i < settings.lcss.length; i++){
			head = head.append($(document.createElement('link')).attr('href', settings.lcss[i]).attr('rel', 'stylesheet').attr('media', 'print'));
		}

		if(settings.css == 'extend' || settings.css == 'style'){
			head.append($(document.createElement('style')).append($('style').clone().html()));
		}

		if(settings.ecss != null){
			head.append($(document.createElement('style')).html(settings.ecss));
		}

		if (settings.wrapper.wrapper === null){
			var body = document.createElement('body');
			body = $(body).append(element);
		}
		else{
			var body = $(settings.wrapper.wrapper).clone();
			body.find(settings.wrapper.selector).append(element);
		}

		for(let i = 0; i < settings.keepHide.length; i++){
			$(body).find(settings.keepHide[i]).each(function(index, data){
				$(this).css('display', 'none');
			})
		}

		html = $(html).append(head).append(body);

		const fn_window = document.open('', settings.title, 'width='+$(document).width()+',height=' + $(document).width() + '');
		fn_window.document.write(html.clone().html());
		setTimeout(function(){fn_window.print();fn_window.close()}, 250);

		return $(this);
	}
}(jQuery));
