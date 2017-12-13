(function ($) {
	$.fn.floatit = function(params) {
  	var $floater = this;
    var $limiter = null;
    var top_mod = 0;
    var bottom_mod = 0;
    var preserve_width = false;
   	var bottom_limit_function = function(elem) {
    	return $(elem).first().offset().top;
    };
    var recalculate = false;

    params = params || {};

    if (params.hasOwnProperty('limiter')) {
    	$limiter = $(params.limiter);
    }

    if (params.hasOwnProperty('top_spacing')) {
    	top_mod = params.top_spacing;
    }

    if (params.hasOwnProperty('bottom_spacing')) {
    	bottom_mod = params.bottom_spacing;
    }

    if (params.hasOwnProperty('preserve_width')) {
    	preserve_width = params.preserve_width;
    }

    if (params.hasOwnProperty('limit_fn')) {
    	bottom_limit_function = params.limit_fn;
    }

    if (params.hasOwnProperty('recalculate')) {
    	recalculate = params.recalculate;
    }

    function fromTop($elem, top, limit, mod) {
      if (top+mod >= limit) {
        $elem.css({
          'top': mod,
          'position': 'fixed'
        });
      } else {
        $elem.css({
          'top': limit,
          'position': 'absolute'
        });
      }
    }

    if ($floater.outerHeight(true) >= $floater.parent().height()) {
    	return;
    }

    if ($floater && $floater.length > 0) {
    	$floater.addClass('floating');

      var topLimit = null;
      var bottomLimit = null;
      var off = null;
      var floater_h = null;

      var calculateFloatInitials = function() {
        off = $floater.offset();
        floater_h = $floater.outerHeight(true);
        topLimit = off.top;
        $floater.data('fltr_offset', off);
        $floater.data('fltr_parent', $floater.parent());

        var css = {
          'top': off.top,
          'left': off.left,
          'position': 'absolute'
        };

        if (preserve_width) {
          css.width = $floater.outerWidth();
        }

        $floater.css(css);

        if ($limiter && $limiter.length > 0) {
          bottomLimit = bottom_limit_function($limiter)-bottom_mod;
        }

        $floater.detach();
        $('body').append($floater);
      };

      calculateFloatInitials();

      var onscroll = function () {
      	if (!$floater.hasClass('floating')) {
        	return;
        }

        var top = $(document).scrollTop();
        fromTop($floater, top, off.top, top_mod);
      };

      if (bottomLimit && !recalculate) {
        onscroll = function() {
        	if (!$floater.hasClass('floating')) {
            return;
          }

          var top = $(document).scrollTop();
          var cp = top + floater_h  + top_mod;

          if (cp >= bottomLimit) {
            $floater.css({
              'top': bottomLimit-floater_h,
              'position': 'absolute'
            });
          } else {
            fromTop($floater, top, off.top, top_mod);
          }
        };
      }

      if (bottomLimit && recalculate) {
      	onscroll = function() {
        	if (!$floater.hasClass('floating')) {
            return;
          }
          var limit = bottom_limit_function($limiter)-bottom_mod;
          var top = $(document).scrollTop();
          var h = $floater.outerHeight(true);
          var cp = top + h + top_mod;

          if (cp >= limit) {
            $floater.css({
              'top': limit-h,
              'position': 'absolute'
            });
          } else {
            fromTop($floater, top, off.top, top_mod);
          }
        };
      }

      var recalc = function () {
      	if (!$floater.hasClass('floating')) {
        	return;
        }

      	$floater.detach();
        $($floater.data('fltr_parent')).append($floater);
        $floater.attr('style', '');

        calculateFloatInitials();
        onscroll();
      };

      if($floater.data('fltr')) {
      	return this;
      }

      $(window).resize(recalc);

      $(document).scroll(onscroll);
      onscroll();

      $floater.data('fltr', true);
    }

    return this;
  };

  $.fn.sinkit = function(params) {
  	var $floater = this;
  	$floater.removeClass('floating');
    $floater.detach();
    $($floater.data('fltr_parent')).append($floater);
    $floater.attr('style', '');

    return this;
  };
})(jQuery);
