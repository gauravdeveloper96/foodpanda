/**
 * makefixed.js
 * @author Guilherme Augusto Madaleno <guimadaleno@me.com>
 * @version 1.0
 */

$.fn.makeFixed = function (options)
{

	var sel = $(this).selector;

	var el;
	var elc;
	var elAttr;

	var defOpts = 
	{
		defTopPos: '0px',
		defZIndex: 10000
	};

	/* MakeFixed attributes */

	var attr =
	{
		cIsFixed:  		'data-mfx-is-fixed',
		cPosition:  	'data-mfx-current-position',
		cLeft:      	'data-mfx-current-left',
		cTop:       	'data-mfx-current-top',
		cWidth:     	'data-mfx-current-width',
		cZIndex:    	'data-mfx-current-zindex',
		fLeft:      	'data-mfx-left',
		fTop:       	'data-mfx-top',
		fWidth:     	'data-mfx-width',
		fAtPos:     	'data-mfx-fix-at',
		fTopPos:    	'data-mfx-top-position'
	};

	/* To clean up attributes */

	var clearAttr = function (element)
	{
		$(element).removeAttr
		(
			attr.fLeft + 
			' ' + attr.fWidth + 
			' ' + attr.cLeft + 
			' ' + attr.cTop + 
			' ' + attr.cWidth + 
			' ' + attr.cZIndex
		);
	};

	/* During scroll */

	$(window).scroll(function(e)
	{

		/* We get the current scroll position */

		var scrolled = $(window).scrollTop();

		/* For each element with the MakeFixed class */

		$(sel).each(function()
		{

			el = $(this);
			elc = this;

			/* Append attributes to element */

			if (!el.attr(attr.fLeft))
				el.attr(attr.fLeft, el.offset().left + 'px');

			if (!el.attr(attr.fWidth))
				el.attr(attr.fWidth, el.width() + 'px');

			if (!el.attr(attr.cPosition))
				el.attr(attr.cPosition, el.css('position'));

			if (!el.attr(attr.cLeft))
				el.attr(attr.cLeft, el.css('left'));

			if (!el.attr(attr.cTop))
				el.attr(attr.cTop, el.css('top'));

			if (!el.attr(attr.cWidth))
				el.attr(attr.cWidth, el.css('width'));

			if (!el.attr(attr.cZIndex))
				el.attr(attr.cZIndex, el.css('z-index'));

			if (!el.attr(attr.fAtPos))
				el.attr(attr.fAtPos, el.offset().top);

			/* Set element as fixed */

			if (el.attr(attr.fAtPos) <= scrolled && scrolled > 0)
			{

				el.attr(attr.cIsFixed, 1);

				el.css
				({
					position:   'fixed',
					left:       el.attr(attr.fLeft),
					top:        (el.attr(attr.fTopPos)) ? el.attr(attr.fTopPos) + 'px' : defOpts.defTopPos,
					width:      el.attr(attr.fWidth)+el.attr(attr.fLeft),
					zIndex:     defOpts.defZIndex
				});

			}

			/* Set element back to it's normal state */

			else
			{

				el.attr(attr.cIsFixed, 0);

				el.css
				({
					position:   el.attr(attr.cPosition),
					left:       el.attr(attr.cLeft),
					top:        el.attr(attr.cTop),
					width:      el.attr(attr.cWidth),
					zIndex:     el.attr(attr.cZIndex)
				});

				clearAttr(elc);

			}

			/* Callbacks */

			if (el.attr(attr.cIsFixed) == 1 && options && options.onFixed && typeof options.onFixed == 'function')
				options.onFixed (elc);	

			if (el.attr(attr.cIsFixed) == 0 && options && options.onUnFixed && typeof options.onUnFixed == 'function')
				options.onUnFixed (elc);	

			/* Reload values when the page orientation has changed */

			$(window).off("orientationchange").on("orientationchange", function()
			{

				el.css
				({
					position:   el.attr(attr.cPosition),
					left:       el.attr(attr.cLeft),
					top:        el.attr(attr.cTop),
					width:      el.attr(attr.cWidth),
					zIndex:     el.attr(attr.cZIndex)
				});

				clearAttr(elc);

			});

		});

	});

};

