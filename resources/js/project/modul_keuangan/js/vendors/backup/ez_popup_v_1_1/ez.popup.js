(function($){

	$.fn.ezPopup = function(action, option){

		var settings = $.extend({
			closable: true
        }, option);

        var context = this;

		$(this).on('click', '.close-popup', function(e){
			e.stopImmediatePropagation();
			$(context).fadeOut(300);
				// $('body').css('overflow', 'scroll')
		});

		$(this).on('keydown', function(e){
			if(e.keyCode == 27){
				e.stopImmediatePropagation();
				$(context).fadeOut(300);
				// $('body').css('overflow', 'scroll')
			}
		});

		$(this).on('DOMMouseScroll mousewheel', function(ev) {
		    var $this = $(this),
		        scrollTop = this.scrollTop,
		        scrollHeight = this.scrollHeight,
		        height = $this.height(),
		        delta = (ev.type == 'DOMMouseScroll' ?
		            ev.originalEvent.detail * -40 :
		            ev.originalEvent.wheelDelta),
		        up = delta > 0;

		    var prevent = function() {
		        ev.stopPropagation();
		        ev.preventDefault();
		        ev.returnValue = false;
		        return false;
		    }

		    if (!up && -delta > scrollHeight - height - scrollTop) {
		        // Scrolling down, but this will take us past the bottom.
		        $this.scrollTop(scrollHeight);
		        return prevent();
		    } else if (up && delta > scrollTop) {
		        // Scrolling up, but this will take us past the top.
		        $this.scrollTop(0);
		        return prevent();
		    }
		});

		switch(action){
			case 'show':
				$(this).fadeIn(150);
				$(this).attr('tabindex', '100');
				$(this).focus();
				// $('body').css('overflow', 'hidden')
				break;

			case 'close':
				$(this).fadeOut(15);
				// $('body').css('overflow', 'scroll')
				// console.log('closed');
				break;
		}
	}

}(jQuery))