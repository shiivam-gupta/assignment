(function($) {
	"use strict";
	$(".app-sidebar a").each(function() {
		var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) {
			$(this).addClass("active");
			$(this).parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().prev().click(); // click the item to make it drop
		}
	});
	var sp = document.querySelector('.search-open');
	var searchbar = document.querySelector('.search-inline');
	var shclose = document.querySelector('.search-close');

	function changeClass() {
		searchbar.classList.add('search-visible');
	}

	function closesearch() {
		searchbar.classList.remove('search-visible');
	}
	sp.addEventListener('click', changeClass);
	shclose.addEventListener('click', closesearch);
	var searchField = $('.search');
	var searchInput = $("input[type='search']");
	var checkSearch = function() {
		var contents = searchInput.val();
		if (contents.length !== 0) {
			searchField.addClass('full');
		} else {
			searchField.removeClass('full');
		}
	};
	$("input[type='search']").focus(function() {
		searchField.addClass('isActive');
	}).blur(function() {
		searchField.removeClass('isActive');
		checkSearch();
	});
	$(".cover-image").each(function() {
		var attr = $(this).attr('data-image-src');
		if (typeof attr !== typeof undefined && attr !== false) {
			$(this).css('background', 'url(' + attr + ') center center');
		}
	});
	if ($('#ms-menu-trigger')[0]) {
		$('body').on('click', '#ms-menu-trigger', function() {
			$('.ms-menu').toggleClass('toggled');
		});
	}
	// ______________Full screen
	$(document).on("click", "#fullscreen-button", function toggleFullScreen() {
		if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
			if (document.documentElement.requestFullScreen) {
				document.documentElement.requestFullScreen();
			} else if (document.documentElement.mozRequestFullScreen) {
				document.documentElement.mozRequestFullScreen();
			} else if (document.documentElement.webkitRequestFullScreen) {
				document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
			} else if (document.documentElement.msRequestFullscreen) {
				document.documentElement.msRequestFullscreen();
			}
		} else {
			if (document.cancelFullScreen) {
				document.cancelFullScreen();
			} else if (document.mozCancelFullScreen) {
				document.mozCancelFullScreen();
			} else if (document.webkitCancelFullScreen) {
				document.webkitCancelFullScreen();
			} else if (document.msExitFullscreen) {
				document.msExitFullscreen();
			}
		}
	})
	// ______________ PAGE LOADING
	$(window).on("load", function(e) {
		$("#global-loader").fadeOut("slow");
	})
	// ______________ BACK TO TOP BUTTON
	$(window).on("scroll", function(e) {
		if ($(this).scrollTop() > 0) {
			$('#back-to-top').fadeIn('slow');
		} else {
			$('#back-to-top').fadeOut('slow');
		}
	});
	$(document).on("click", "#back-to-top", function(e) {
		$("html, body").animate({
			scrollTop: 0
		}, 600);
		return false;
	});

	if ($('.chart-circle').length) {
		$('.chart-circle').each(function() {
			let $this = $(this);
			$this.circleProgress({
				fill: {
					color: $this.attr('data-color')
				},
				size: $this.height(),
				startAngle: -Math.PI / 4 * 2,
				emptyFill: '#f5f5f5',
				lineCap: 'round'
			});
		});
	}
	/** Constant div card */
	const DIV_CARD = 'div.card';
	/** Initialize tooltips */
	$('[data-toggle="tooltip"]').tooltip();
	/** Initialize popovers */
	$('[data-toggle="popover"]').popover({
		html: true
	});
	/** Function for remove card */
	$(document).on('click', '[data-toggle="card-remove"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.remove();
		e.preventDefault();
		return false;
	});
	/** Function for collapse card */
	$(document).on('click', '[data-toggle="card-collapse"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-collapsed');
		e.preventDefault();
		return false;
	});
	$(document).on('click', '[data-toggle="card-fullscreen"]', function(e) {
		let $card = $(this).closest(DIV_CARD);
		$card.toggleClass('card-fullscreen').removeClass('card-collapsed');
		e.preventDefault();
		return false;
	});
	$(document).on('click','.delete-record',function(){
		var method = $(this).attr('data-method');
		var dataurl = $(this).attr('data-href');
		var message = $(this).attr('data-button-confirm');
		var after_confirm_message = $(this).attr('data-after-confirm');
		var result = confirm(message);
		if (result) {
			$.ajax({
			    url: dataurl,
			    type: method,  // user.destroy
			    success: function(result) {
			        alert(after_confirm_message);
			        location.reload(true);
			    }
			});
		}
	});

	$(document).on('click','.selectResult',function(){
		var result = $(this).val();
		if(result == 0){
			$('.chooseWinner').hide();
		} else {
			$('.chooseWinner').show();
		}
	});

})(jQuery);