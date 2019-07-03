var ePFPage = function(){};
ePFPage.prototype = {
	
	window_width: false,
	window_height: false,
	navbar: false,
	content: false,
	location_image: false,
	location_image_height: false,
	location_image_offset_height: false,
	menu_event: false,
	container_tabs: false,
	lastScrollTop: false,
	
	goTo: function(p) {
		
		console.log('goTo', $(window).scrollTop(), p);
		
	    var body = $("html, body");
		body.stop().animate({
			scrollTop: p
		}, 100, 'swing');
    },
	
	init: function(){
		
		var g = $('.galleria');
		if( g.length ) {
			
		    Galleria.loadTheme('/en/wp-content/themes/epf/galleria/themes/twelve/galleria.twelve.min.js');
		    Galleria.configure({
			    transition: 'fade',
			    imageCrop: false,
			    autoplay: 3000,
			    height: .5
			});
			g.show();
		    
		    var el = $('.galleria.day1');
			Galleria.run('.galleria.day1');
			el.addClass('init');
		}
		
		
		
		$('.eia-menu a').click(function (e) {
			
			var c = $(e.target).attr('href').substring(1);
			var el = $('.galleria.' + c);
			
			if( !el.hasClass('init') ) {
				Galleria.run('.galleria.' + c);
				el.addClass('init');
			} 
			
		});
		
		/*
		var g = $('.galleria');
		if( g.length ) {
			
		    Galleria.loadTheme('/en/wp-content/themes/epf/galleria/themes/twelve/galleria.twelve.min.js');
		    Galleria.configure({
			    transition: 'fade',
			    imageCrop: false,
			    autoplay: 3000,
			    height: .66
			});
			g.show();
		    Galleria.run('.galleria');
		}
		*/
		
		var that = this;
		this.window = $(window);
		this.html = $('html');
		this.navbar = $('.navbar');
		this.content = $('#content');
		this.location_image = $('.location_image');
		this.menu_event = $('.menu_event');
		this.container_tabs = $('#container_tabs');
		this.spy_blocks = [];
		
		$('#content').removeClass('img').addClass('img').addClass('anim');
		$('.menu_event').addClass('anim');
		
		$(window).scroll(function(){ that.update_view(true); });
		$(window).resize(function(){ that.update_view(false); });
		this.update_view(false);
		this.eventMenuUpdate(true);
		setInterval(function(){
			that.eventMenuUpdate(false);
		}, 300);
		
		$('.event_paper .btn-show').click(function(event){
			event.preventDefault();
			var container = $(event.target).closest('.event_paper');
			container.addClass('active');
			location.hash = 'travel_grants';
		});
		
		$('.event_paper .btn-hide').click(function(event){
			event.preventDefault();
			var container = $(event.target).closest('.event_paper');
			container.removeClass('active');
			that.eventMenuClick('#travel_grants');
		});
		
		console.log('location.hash', location.hash);
		
		if( (location.hash == '#travel_grants') || (location.hash == 'travel_grants') ) {
			$('.event_paper').addClass('active');
		}
		
		$('.scroll_link').each(function(){
			
			var l = $(this);
						
			l.click(function(event){
			
				event.preventDefault();
				var a = $(event.target).closest('a');
				var href = a.attr('href');
				
				that.eventMenuClick(href);
											
			});
			
			var href = l.attr('href');
			if( href && (href!='#') ) {
				var el = $( href );
				if( el.length ) {
					
					var id = el.attr('id') + '-sl';
					var offset = el.offset();
					el.attr('id', id);
					that.spy_blocks.push([offset.top, id]);
					
				}
			}
			
		});
		
		if( location.hash ) {
			this.eventMenuClick(location.hash);
		}
		
		$('.speakers_ul li .text-buttons a.more').click(function(event){
			
			event.preventDefault();
			var li = $(event.target).closest('li');
			
			li.find('.text.trimmed').hide();
			li.find('.text.full').show();
			li.find('.text-buttons a.more').hide();
			li.find('.text-buttons a.less').show();
			
		});
		
		$('.speakers_ul li .text-buttons a.less').click(function(event){
			
			event.preventDefault();
			var li = $(event.target).closest('li');
			
			li.find('.text.full').hide();
			li.find('.text.trimmed').show();
			li.find('.text-buttons a.less').hide();
			li.find('.text-buttons a.more').show();
			
		});
		
		$('#menu_toggler').click(function(event){
			
			$('#menu_div').toggle();
			
		});
		
		$('#menu_div a').click(function(event){
			
			var div = $('#menu_div');
			
			if( div.hasClass('mobile') ) {
				div.hide();
			}
						
			$(event.target).parent('#menu_div');
			
		});
		
	},
	
	eventMenuClick: function(href) {
		
		console.log('eventMenuClick', href);
		
		if( href && ( href=='#' ) ) {
									
			this.goTo(0);
			location.hash = '';
			
		} else {
			var el = $( href + '-sl' );
			if( el.length ) {
				
				var offset = el.offset();
								
				location.hash = href;
								
				if( location.hash && (location.hash!='#') ) {
					this.goTo( offset.top - 109 );
				}
				
			}
		}
		
		this.eventMenuUpdate(true);
		
	},
	
	eventMenuUpdate: function(force){
					
		var scrollTop = $(window).scrollTop();
		if( force || (this.lastScrollTop === false) || (scrollTop != this.lastScrollTop) ) {
		
			var target = false;
			
			if( scrollTop < 0 ) {
				
				location.hash = 'materials';
				
			} else {
			
				for( var i=1; i<this.spy_blocks.length; i++ ) {
					
					var b = this.spy_blocks[i];
								
					if( scrollTop <= b[0] ) {
						target = this.spy_blocks[i-1][1];
						break;
					}
					
				}
				
				$('.menu_event .nav > li.active').removeClass('active');
				
				if( target ) {
					
					target = target.substring(0, target.length-3);
					$('.menu_event .nav > li a[href=#' + target + ']').parents('li').addClass('active');
					location.hash = target;
					
				}
			
			}
			
			this.lastScrollTop = scrollTop;
		
		}
		
	},
	
	update_view: function(check){
		
		this.window_width = this.window.width();
		this.window_height = this.window.height();
		this.location_image_offset = this.location_image.offset();
		this.location_image_height = this.location_image.height();
		this.location_image_offset_height = this.location_image_offset.top + this.location_image_height;
		
		var navbar_height = this.navbar.height();
		var menu_event_height = this.menu_event.height();
		var content_height = this.content.height();
		var scrollTop = this.window.scrollTop();
				
		if( this.window_width>1040 ) {
			$('#menu_div').removeClass('mobile').show();
		} else {
			$('#menu_div').addClass('mobile');
		}
				
		var _offset = this.html.hasClass('pdf') ? 60 : 10;
		
						
		if(scrollTop >= content_height - _offset) {
		
			if( !this.html.hasClass('cover_fixed') ) {
				this.html.addClass('cover_fixed');
				// this.container_tabs.addClass('pad');
			}
			
		} else {
			
			if( this.html.hasClass('cover_fixed') ) {
				this.html.removeClass('cover_fixed');
				// this.container_tabs.removeClass('pad');
			}
			
		}
		
		
		if( this.html.hasClass('menu_fixed') ) {
			this.html.removeClass('menu_fixed');
			// console.log('remove menu');
		}
			
		
		
		
		
		
		
		var min = this.location_image_offset.top - this.window_height;
		var max = this.location_image_offset.top + this.location_image_height - navbar_height - menu_event_height;
							
		if(
			( !check  ||
				( scrollTop >= min ) && 
				( scrollTop <= max ) 
			)
		) {
			
			var p = ( scrollTop - min ) / (max - min);
						
			
			// img_width = 1200
			// img_height = 686
			
			
			var img_offset = 0.3;
			var max_height = 530;
			
			var height = Math.round( this.window_width * 686 / 1200 );
			
			if( height > max_height ) {
				
				var img_offset_px = height - max_height;
				height = max_height;
				
			} else {
			
				var img_offset_px = Math.round( height * img_offset );
				height = height - img_offset_px;
			
			}
			
			var pos = Math.round( (p * img_offset_px) );
			
			// console.log('height', height, 'img_offset_px', img_offset_px, 'pos', pos);
				
			this.location_image.css({
				'background-position': 'center -' + pos + 'px',
				'height': height + 'px'
			});
			
			this.location_image_height = height;
			this.location_image_offset_height = this.location_image_offset.top + this.location_image_height;
			
		}		
				
		/*
		if(scrollTop >= 45) {
			
			if( !this.menu_event.hasClass('logo') ) {
				this.menu_event.addClass('logo');
			}
			
		} else {
			
			if( this.menu_event.hasClass('logo') ) {
				this.menu_event.removeClass('logo');
			}
			
		}
		*/
				
		if( scrollTop <= content_height ) {
			
			/*
			var p = scrollTop / content_height;
			var scale = 1 + p/5;
			var pos = Math.round(p * 28);
			var s = .9 - (p/4);
			var z = .6 + (p/3);
			var t = -50 * p;
			*/
			
			// $('.z_event_cog').css({'margin-top': p * 50, 'transform': 'scale(' + scale + ')', 'opacity': 1-p});
			// $('.z_event_info').css({'margin-top': p * 2, 'margin-left': -p * 30, 'opacity': 1-p});
			// $('.z_event_title').css({'margin-top': -p * 30, 'margin-left': -p * 40, 'opacity': 1-p});
			/*
			if( this.html.hasClass('lt-768') ) {
				$('.z_event_motto').css({'transform': 'scale(' + s + ')', 'margin-top': p * 30, 'margin-left': -p * 130, 'opacity': 1-p});
			} else {
				$('.z_event_motto').css({'transform': 'scale(.7)', 'margin-top': p * 16, 'margin-left': p * 60, 'opacity': 1-p});
			}
			*/
			
			var cstr = 'center'
			if( this.html.hasClass('lt-768') ) {
				cstr = Math.round(this.window_width / 2) - 98;
				cstr += 'px';
			}
			
			$('#content').css({'background-position': cstr + ' 36px, center center'});
			
			
		}
		
		
		
		
		
		
	}
};

var epfpage;
$(document).ready(function(){
	epfpage = new ePFPage();
	epfpage.init();
	
	setTimeout(function(){
		if( location.hash ) {
			epfpage.eventMenuClick(location.hash);
		}
	}, 1200);
	
});