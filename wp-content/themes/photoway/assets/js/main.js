;(function( $ ){
/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
+( function() {
	var container, button, menu, links, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links = menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function( container ) {
		var touchStartFn, i,
			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode, i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( container ) );
} )();

jQuery.fn.scrollTo = function( offset ){

	jQuery( document ).on( 'click', this.selector, function( e ){
		e.preventDefault();
		var target = jQuery( this ).attr( 'href' );
		if( 'undefined' != typeof target ){
			if( !offset ){
				offset = 0;
			}
			var pos = jQuery( target ).offset().top - offset;
			jQuery("html, body").animate({ scrollTop: pos }, 800);
		}
	});

	return this;
};

function scrollToTop ( param ){

	this.markup   = null,
	this.selector = null;
	this.fixed    = true;
	this.visible  = false;

	this.init = function(){

		if( this.valid() ){

			if( typeof param != 'undefined' && typeof param.fixed != 'undefined' ){
				this.fixed = param.fixed;
			}

			this.selector = ( param && param.selector ) ? param.selector : '#go-top';

			this.getMarkup();
			var that = this;

			jQuery( 'body .site-footer' ).append( this.markup );

			if( this.fixed ){

				jQuery( this.selector ).hide();

				var windowHeight = jQuery( window ).height();

				jQuery( window ).scroll(function(){

					var scrollPos = jQuery( window ).scrollTop();

					if(  ( scrollPos > ( windowHeight - 100 ) ) ){

						if( false == that.visible ){
							jQuery( that.selector ).fadeIn();
							that.visible = true;
						}
						
					}else{

						if( true == that.visible ){
							jQuery( that.selector ).fadeOut();
							that.visible = false;
						}
					}
				});

				jQuery( this.selector ).scrollTo();
			}
		}
	}

	this.getMarkup = function(){

		var position = this.fixed ? 'fixed':'absolute';

		var wrapperStyle = 'style="position: '+position+'; z-index:999999; bottom: 20px; right: 20px;"';

		var buttonStyle  = 'style="cursor:pointer;display: inline-block;padding: 10px 20px;background: #f15151;color: #fff;border-radius: 2px;"';

		var markup = '<div ' + wrapperStyle + ' id="go-top"><span '+buttonStyle+'>Scroll To Top</span></div>';

		this.markup   = ( param && param.markup ) ? param.markup : markup;
	}

	this.valid = function(){

		if( param && param.markup && !param.selector ){
			alert( 'Please provide selector. eg. { markup: "<div id=\'scroll-top\'></div>", selector: "#scroll-top"}' );
			return false;
		}

		return true;
	}
};

/**
* Setting up functionality for alternative menu
* @since Photoway 1.0.0
*/
function wpMenuAccordion( selector ){

	var $ele = selector + ' .menu-item-has-children > a';
	$( $ele ).each( function(){
		var text = $( this ).text();
		text = text + '<button class="triangle"><span class="kfi kfi-arrow-carrot-down-alt2"></span></button>';
		$( this ).html( text );
	});

	$( document ).on( 'click', $ele + ' button.triangle', function( e ){
		e.preventDefault();
		e.stopPropagation();

		$parentLi = $( this ).parent().parent( 'li' );
		$childLi = $parentLi.find( 'li' );

		if( $parentLi.hasClass( 'open' ) ){
			/**
			* Closing all the ul inside and 
			* removing open class for all the li's
			*/
			$parentLi.removeClass( 'open' );
			$childLi.removeClass( 'open' );

			$( this ).parent( 'a' ).next().slideUp();
			$( this ).parent( 'a' ).next().find( 'ul' ).slideUp();
		}else{

			$parentLi.addClass( 'open' );
			$( this ).parent( 'a' ).next().slideDown();
		}
	});
};

/**
* Fire for fixed header
* @since Photoway 1.0.0
*/

function primaryHeader(){
	var h,
	bodyClass = 'fixed-nav-active',
	addClass = function(){
		if( PHOTOWAY.fixed_nav && !$( 'body' ).hasClass( bodyClass ) ){
			$( 'body' ).addClass( bodyClass );
		}
	},
	removeClass = function(){
		if( PHOTOWAY.fixed_nav && $( 'body' ).hasClass( bodyClass ) ){
			$( 'body' ).removeClass( bodyClass );
		}
	},
	setPosition = function( top ){
		$( '.header-group-wrap' ).css( {
			'top' : top
		});
	},
	init = function(){
		h = 0;
		if( PHOTOWAY.is_admin_bar_showing && $( window ).width() <= 781 ){
			h = 46;
		}
		setPosition( h );
	},
	onScroll = function(){
		var scroll = jQuery(document).scrollTop(),
			pos = 0,
			height = h,
			width = $( window ).width();

		if( width <= 767 ){
			return;
		}

		if( PHOTOWAY.is_admin_bar_showing && width >= 782 ){
			scroll = scroll+32;
		}

		if( height ){
			if( height >= scroll ){
				pos = height-jQuery(document).scrollTop();
				removeClass();
			}else if( PHOTOWAY.is_admin_bar_showing && width >= 782 ){
				pos = 32;
				addClass()
			}else{
				addClass();
			}

		}else{

			var mh = $( '#masthead' ).outerHeight(),
				scroll = jQuery(document).scrollTop();
			if( mh >= scroll ){
				if( PHOTOWAY.is_admin_bar_showing && width >= 782 ){
					pos = 32-scroll;
				}else{

					pos = -scroll;
				}
				removeClass();
			}else{
				
				if( PHOTOWAY.is_admin_bar_showing && width >= 782 ){
					pos = 32;
				}else{
					pos = 0;
				}
				addClass();
			}
		}
		
		setPosition( pos );
	};
	
	$( window ).resize(function(){
		init();
		onScroll();
	});

	init();
	onScroll();
	
	$( window ).scroll( onScroll );

	jQuery( window ).load( function(){
		init();
		onScroll();
	});
}

jQuery( document ).ready( function(){
	primaryHeader();
});

/**
* Show or Hide Search field on clicking search icon
* @since Photoway 1.0.0
*/

jQuery( document ).on( 'click', '.header-search-icon', function(e){
	e.preventDefault();
	jQuery( '.header-search-wrap' ).addClass( 'search-slide' );
	jQuery("#header-search-form input").focus();
});

jQuery( document ).on( 'click', '.header-search-wrap button.header-search-close', function(e){
	e.preventDefault();
    jQuery( '.header-search-wrap' ).removeClass( 'search-slide' );
    jQuery(".header-search-icon").focus();
});

/**
* Animate contact form fields when they are focused
* @since Photoway 1.0.0
*/
jQuery( '.kt-contact-form-area input, .kt-contact-form-area textarea' ).on( 'focus',function(){
	var target = jQuery( this ).attr( 'id' );
	jQuery('label[for="'+target+'"]').addClass( 'move' );
});

jQuery( '.kt-contact-form-area input, .kt-contact-form-area textarea' ).on( 'blur',function(){
	var target = jQuery( this ).attr( 'id' );
	jQuery('label[for="'+target+'"]').removeClass( 'move' );
});

/** Front Page **/

// outer height
function headerOuterHeight(){
	var headerHeight = $('.header-primary').outerHeight(),
	    breadcrumbHeight = $('.section-banner-wrap .breadcrumb-wrap').outerHeight();

	if( headerHeight >= 130 ) {
		$('.wrap-inner-banner').css({'paddingTop': headerHeight, 'paddingBottom': headerHeight - breadcrumbHeight });
	}
 };

/**
* Fire slider for front page
* @link https://owlcarousel2.github.io/OwlCarousel2/docs/started-welcome.html
* @since Photoway 1.0.0
*/

function homeSlider(){
	var item_count = parseInt(jQuery( '.block-slider .slide-item').length);
	jQuery(".home-slider").owlCarousel({
		items: 1,
		autoHeight: false,
		autoHeightClass: 'name',
		animateOut: 'fadeOut',
    	navContainer: '.block-slider .controls',
    	dotsContainer: '#slide-pager',
    	autoplay : PHOTOWAY.home_slider.autoplay,
    	autoplayTimeout : parseInt( PHOTOWAY.home_slider.timeout ),
    	loop : false,
    	rtl: ( PHOTOWAY.is_rtl == '1' ) ? true : false,
    	responsive:{
    	    768:{
    	        items: 1,
    	        nav: true,
    	    }
    	},
	});
};

/**
* Fire testimonial for front page
* @link https://owlcarousel2.github.io/OwlCarousel2/docs/started-welcome.html
* @since Photoway 1.0.0
*/
function testimonialSlider(){
	jQuery(".testimonial-carousel").owlCarousel({
		items: 1,
		animateOut: 'fadeOut',
		nav: true,
		navContainer: '.block-testimonial .controls',
		dotsContainer: '#testimonial-pager',
		responsiveClass: true,
		margin: 30,
		responsive:{
	        590:{
	        	items: 2,
	        	nav: true
	        },
	        768:{
	        	items: 1,
	        	nav: true
	        },
	        1024:{
	        	items: 2,
	        	nav: true
	        }
	    },
	    rtl: ( PHOTOWAY.is_rtl == '1' ) ? true : false ,
		loop : false,
		dots: true
	});	
};

/**
* Make menu accessibility
* @since Photoway 1.0.0
*/

var body, masthead, siteNavigation, socialNavigation;

function initMainNavigation( container ) {

	// Add dropdown toggle that displays child menu items.
	var dropdownToggle = $( '<button />', { 'class': 'dropdown-toggle', 'aria-expanded': false })
		.append( '<span class="kfi kfi-arrow-carrot-down"></span>' )

	container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( dropdownToggle );

	// Toggle buttons and submenu items with active children menu items.
	container.find( '.current-menu-ancestor > button' ).addClass( 'toggled-on' );
	container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

	// Add menu items with submenus to aria-haspopup="true".
	container.find( '.menu-item-has-children, .page_item_has_children' ).attr( 'aria-haspopup', 'true' );

	container.find( '.dropdown-toggle' ).click( function( e ) {
		var _this            = $( this );

		e.preventDefault();
		_this.toggleClass( 'toggled-on' );
		_this.parent().first().toggleClass('focus');

		_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
	} );
}

initMainNavigation( jQuery( '.main-navigation' ) );

masthead         = jQuery( '#masthead' );
siteNavigation   = masthead.find( '#site-navigation' );
socialNavigation = masthead.find( '#social-navigation' );

/** Fire after document ready **/
jQuery( document ).ready( function(){
	// primaryHeader();
	headerOuterHeight();
	homeSlider();
	testimonialSlider();

	$( '.scroll-to' ).scrollTo();

	/**
	* Initializing scroll top js
	*/
	new scrollToTop({
		markup   : '<a href="#page" class="scroll-to '+ ( PHOTOWAY.enable_scroll_top == 0 ? "d-none" : "" )+'" id="go-top"><span class="kfi kfi-arrow-up"></span></a>',
		selector : '#go-top'
	}).init();
	wpMenuAccordion( '#offcanvas-menu' );
	
	$( document ).on( 'click', '.offcanvas-menu-toggler', function( e ){
		e.preventDefault();
		$( 'body' ).addClass( 'offcanvas-menu-open' );
		$('#offcanvas-menu').focus();
		
	});

	$( document ).on( 'click', '.close-offcanvas-menu button', function( e ){
		e.preventDefault();
		$( 'body' ).removeClass( 'offcanvas-menu-open' );
		$('.offcanvas-menu-toggler').focus();
	});

	jQuery( 'body' ).append( '<div class="kt-offcanvas-overlay"></div>' );

    /**
    * Modify default search placeholder
    */
    $( '#masthead #s' ).attr( 'placeholder', PHOTOWAY.search_placeholder );
    $( '#searchform #s' ).attr( 'placeholder', PHOTOWAY.search_default_placeholder );

    /**
    * Make One Page Layout
    */
    // handle links with @href started with '#' only
    jQuery(document).on('click', 'a[href^="#after-slider"], a[href^="#block-"]', function(e) {
        // target element id
        var id = $(this).attr('href');
        
        // target element
        var $id = $(id);
        if ($id.length === 0) {
            return;
        }
        
        // prevent standard hash navigation (avoid blinking in IE)
        e.preventDefault();
        
        // top position relative to the document
        var pos = $id.offset().top;
        
        // animated top scrolling
        $('body, html').animate({scrollTop: pos});
    });

});

jQuery( window ).resize(function(){

});
jQuery( window ).load( function(){
	/**
	* Site loader
	*/
	jQuery( '#site-loader' ).fadeOut( 500 );

	/**
	* Make sure if the masonry wrapper exists
	*/
	if( jQuery( '.masonry-wrapper' ).length > 0 ){
		$grid = jQuery( '.masonry-wrapper' ).masonry({
			itemSelector: '.grid-post',
			// percentPosition: true,
			isAnimated: true,
		});	
	}

	/**
	* Make support for Jetpack's infinite scroll on masonry layout
	*/
	infinite_count = 0;
    $( document.body ).on( 'post-load', function () {

		infinite_count = infinite_count + 1;
		var container = '#infinite-view-' + infinite_count;
		$( container ).hide();

		$( $( container + ' .grid-post' ) ).each( function(){
			$items = $( this );
		  	$grid.append( $items ).masonry( 'appended', $items );
		});

		setTimeout( function(){
			$grid.masonry('layout');
		},500);
    });
});

})( jQuery );