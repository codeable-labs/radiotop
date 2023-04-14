// Avoid `console` errors in browsers that lack a console.
(function() {
  var method;
  var noop = function () {};
  var methods = [
    'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
    'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
    'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
    'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
  ];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];
    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }
}());

// Place any jQuery/helper plugins in here.



'use strict';
const site = (function(){

	const dom = {
		ACTIVE_CLASS : '-active-',
		$header : $('.header'),
		$header_button : $('.fnHeaderButton'),
		$header_nav : $('.fnHeaderNav')
	};

	const siteFunctions = function(){

		events.header();
		events.ranking();
		events.metodologia();
		events.forms();
	
	};

	const events = { 

		header : function() {

			dom.$header_button.on('click', function(){
				$(this).toggleClass(dom.ACTIVE_CLASS);
				dom.$header_nav.toggleClass(dom.ACTIVE_CLASS);
			})

		},

		ranking : function() {

			$('.fnSetRanking')
				.on('click', function(){
					const target =  $(this).data('ranking');
					$(target).trigger('click');
				});

			$('.fnRankingOption')
				.on('click', function(){

					const region_options = $('.fnRegionOptions');
					const genero_musical_options = $('.fnGeneroMusicalOptions');
					const artistas = $('[name="artistas"]:checked');
					const region = $('[name="region"]:checked');
					const genero_musical = $('[name="genero_musical"]:checked');

					const isPeruanos = artistas.val() === 'peruanos';

					isPeruanos ? genero_musical_options.addClass('-disable-') : genero_musical_options.removeClass('-disable-') ;

					let isRankingOptionsComplete = (artistas.length>0 && genero_musical.length>0 && region.length>0);
					isRankingOptionsComplete = (artistas.length>0 && region.length>0 && isPeruanos) || isRankingOptionsComplete;
					
					
					if ( !isRankingOptionsComplete && !isPeruanos ) return;	

					const query = { 
						artistas : artistas.val(),
						region: region.val(), 
						genero_musical: isPeruanos ? 'empty' : genero_musical.val()
					};

					/*$.ajax({ url: '/get_ranking.php', type: 'POST', dataType: 'json', data: query, })
						.done(function(response) {
							if ( response.data !== 'empty' ) {
								
								const title = getCardTitle(artistas, '') + getCardTitle(region) + getCardTitle(genero_musical, ' / ',artistas.val());

								$('.fnRankingResults').removeClass('m--empty');
								$('.fnRankingGenderImage').attr('src', 'assets/public/images/'+genero_musical.val()+'.png');
								$('.fnRankingName').html(title);
								$('.fnRankingButtonDownload').attr('href', response.data);
								$('.fnRankingButtonDetail').attr('href', '/ranking.php?genero_musical='+query.genero_musical+'&region='+query.region+'&artistas='+query.artistas);
							}
						});*/

				});

		},

		metodologia : function() {

			$('.fnButtonShowAcordeon')
				.on('click', function(e){

					const $target = $(this).closest('.fnAcordeonItem');

					if ( $target.hasClass(dom.ACTIVE_CLASS) ) {
						$target.removeClass(dom.ACTIVE_CLASS);
					} else {
						const $acordeon_items = $('.fnAcordeonItem');
						$acordeon_items.removeClass(dom.ACTIVE_CLASS);
						$target.addClass(dom.ACTIVE_CLASS);
					}

				});

		},

		forms : function(){

			/*let formBlock = true;
			$('form').on('submit', function(e){

				let f = $(this);
				let fields = f.find('input, textarea, select');
				let tipoForm = f.data('tipo');
				let method = f.attr('method').toLowerCase();
				let lightbox = f.data('gracias');
				let error = 0;
				let btn = f.find('button');
				let dataForm = '';
				let validCorreo = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				let num = /[^0-9]/g;

				$.each(fields, function(index, val) {
					let t = $(this);
					if(t.attr('no')===undefined) {
						let value = t.val();
						let targetError = t.parent();
						$.trim(value)==='' && targetError.addClass('-error-') && error++;
						switch (t.attr('valid')) {
							case 'numero': num.test(value) && targetError.addClass('-error-') && error++; break;
							case 'email': !validCorreo.test(value) && targetError.addClass('-error-') && error++; break;
							case 'subscription': !validCorreo.test(value) && t.addClass('-error-') && error++; break;
							case 'select': $.trim(value)==='' && targetError.parent().addClass('-error-') && error++; break;
							case 'file': $.trim(value)==='' && targetError.addClass('-error-') && error++; break;
							case 'terminos': !t.is(':checked') && targetError.addClass('-error-') && error++; break;
						}
					}
				});

				if(error===0&&formBlock) {
					if(method=='get' || tipoForm=='postpermit'){
						return true;
					} else {
						e.preventDefault();
						btn.attr('disabled','disabled');
						formBlock=false;
						$.ajax({url: f.attr('action'), type: 'POST', dataType: 'json', data: f.serializeArray()})
							.done(function(response) {
								if(response.rpta)
								{
									switch (tipoForm) {
										case 'show_thanks':
												f.removeClass(dom.ACTIVE_CLASS);
												$('#thanks_message').addClass(dom.ACTIVE_CLASS);
											break;
									}
									formBlock = true;
									btn.removeAttr('disabled');
								}
							});
					}
				} else {
					return false;
				}
			});*/

		}

	};

	function getCardTitle (key, tag=' / ', peruanos=false) {
		if ( peruanos == 'peruanos' ) return '';
		return tag + key.parent().find('.button').text()
	}

	let initialize = siteFunctions;

	return { init: initialize }

})();

site.init();