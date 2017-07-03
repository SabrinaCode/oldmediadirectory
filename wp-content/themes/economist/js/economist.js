/* global $ */
var Economist = (function() {

/**
 * Initialisation
 */
	var init = (function() {

		var dr_start, wl_start, wr_start;

		var __d = function() {
			dr_start = new Date().getTime();

			_handleSearchForm();
			moveAsterisks();
			_instantiateFancyBox();
			_resetSearch();

			__log('"document.ready" events executed in: ' + __getExecutionTime(dr_start));
		};

		var __w = function() {
			wl_start = new Date().getTime();



			__log('"window.load" events executed in: ' + __getExecutionTime(wl_start));
		};

		var __r = function() {
			wr_start = new Date().getTime();



			__log('"window.resize" events executed in: ' + __getExecutionTime(wr_start));
		};

		return {
			__d: __d,
			__w: __w,
			__r: __r
		};

	})();

/**
 * Global variables
 */
	var _w = $(window);

	var _d = $(document);

	var _b = $('body');

/**
 * Site-specific methods
 */
 	var _instantiateFancyBox = function() {
 		var fancybox = $('.fancybox');

 		if ( fancybox.length ) {
 			fancybox.fancybox({
 				padding: 0,
 				tpl: {
 					image: [
 						'<div class="icons">',
	 						'<div class="icon icon-zoom-out"><img src="' + window.themeUri + '/images/zoom-out.png""></div>',
	 						'<div class="icon icon-download"><a href="' + fancybox.data('url') + '" download><img src="' + window.themeUri + '/images/download-large.png"></a></div>',
	 					'</div>',
 						'<img class="fancybox-image" src="{href}">'
 					].join('')
 				},

 				afterShow: function() {
 					$('.icon-zoom-out').on('click', function() {
 						$.fancybox.close();
 					});
 				}
 			});
 		}
 	};

 	var _resetSearch = function() {
 		$('.initial-reset, .advanced-reset, .return-to-list').on('click', function() {
 			setTimeout(function() {
 				$('.advanced-submit').click();
 			}, 0);
 		});
 	};

	var _handleSearchForm = function() {
		var form = $('.media-directory-search');

		form.on('submit', function(event) {
			event.preventDefault();

			var _this = $(this),
				resultWrap = $('ul', '.directory-results');

			if ( !resultWrap.length ) {
				var dr = $('<div />', {
					'class' : 'directory-results left'
				});

				var resultWrap = $('<ul />');

				$('<div />', {
					'class' : 'loading-overlay',
					'html'  : '<span class="fa fa-circle-o-notch fa-spin"></span>'
				}).appendTo(dr);

				dr.insertBefore( $('.profile-details') );
				resultWrap.appendTo(dr);
				$('.profile-details').remove();
			}

			var request = $.ajax({
				url: window.themeUri + '/includes/ajax/search.php',
				type: 'GET',
				data: _this.serializeArray()
			});

			$('.loading-overlay').show();

			request.done(function(response) {
				console.log(response);
				resultWrap.empty();

				if ( response ) {
					var temp  = $('<div />'), total;

					temp.html(response);

					total = temp.children('li').length;

					temp.children('li').each(function() {
						resultWrap.append( $(this) );

						if ( !--total ) {
							$('.loading-overlay').hide();
						}
					});
				} else {
					var error = $('<p />', {
						'class' : 'result-error',
						'text'  : "There was no one matching your query. Please try broadening your search."
					});

					error.appendTo(resultWrap);
					$('.loading-overlay').hide();
				}
			});
		});

		$('.advanced-fields').children('span').on('click', function() {
			$(this).toggleClass('active');
			$(this).siblings('.fields').stop().slideToggle();
		});

		$('.fields').find('.field-title').on('click', function() {
			$(this).siblings('.field').stop().slideToggle();
			$(this).toggleClass('active');
		});
	};

	var moveAsterisks = function() {
		var asterisks = $('.gfield_required');

		if ( asterisks.length ) {
			for ( var i = 0; i < asterisks.length; i++ ) {
				var asterisk = $(asterisks[i]);
				asterisk.prependTo( asterisk.parent('label') );
			}
		}
	};

/**
 * Development methods
 */
	var __log = function( output ) {
		if ( window.debug ) {
			console.log('[Economist] ' + output);
		}
	};

	var __getExecutionTime = function( start ) {
		var time = new Date().getTime() - start;
		time = time / 1000;
		return (time % 60) + 's';
	};

	return {
		init: init
	};

})();
