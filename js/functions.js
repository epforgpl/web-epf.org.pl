/* debouncedresize */
(function(e){var t=e.event,n,r;n=t.special.debouncedresize={setup:function(){e(this).on("resize",n.handler);},teardown:function(){e(this).off("resize",n.handler);},handler:function(e,i){var s=this,o=arguments,u=function(){e.type="debouncedresize";t.dispatch.apply(s,o);};if(r){clearTimeout(r);}i?u():r=setTimeout(u,n.threshold);},threshold:150};})(jQuery);
function on_resize(c,t){onresize=function(){clearTimeout(t);t=setTimeout(c,100);}; return c;}

// fittext
//(function(e){e.fn.fitText=function(t,n){var r=t||1,i=e.extend({minFontSize:Number.NEGATIVE_INFINITY,maxFontSize:Number.POSITIVE_INFINITY},n);return this.each(function(){var t=e(this);var n=function(){t.css("font-size",Math.max(Math.min(t.width()/(r*10),parseFloat(i.maxFontSize)),parseFloat(i.minFontSize)))};n();e(window).on("resize.fittext orientationchange.fittext",n)})}})(jQuery);

function actionsAfterInit(){
	//console.log('All elements initialized!');
}

var $screen_lg = 990,
  	$screen_sm = 767,
  	$screen_xs = 480;

var _window = $(window),
    $html = $('html'),
    $body = $('body'),
    isMobile,
    svg = document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image", "1.1"); // svg test: http://css-tricks.com/test-support-svg-img/

// if (svg){
//   $html.addClass('svg');
// } else {
//   $html.addClass('no-svg');

//   // SVG Fallback
//   $('[data-img]').each(function(){
//     this.src = $(this).data('img');
//   });
}

function initLayout(){
  var $h = $('.js-windowHeight'),
      wh = _window.height();

  // set windowHeight to certain divs
  $h.each(function(){
    var $this = $(this);

    if ($this.height('auto').outerHeight() < wh){
      $this.removeClass('is-bigger').outerHeight(wh);
    } else {
      $this.addClass('is-bigger');
    }
  });

  // home > .homeIntro-tiles
  var $tiles = $('.homeIntro-tile');

  if ($tiles.length){
    var tw = $tiles.eq(0).width();

    $tiles.each(function(){
      $(this).outerHeight(tw).css('line-height',tw + 'px');
    });

    $tiles.parents('.homeIntro-tiles').eq(0).css({
      'height': 3*tw,
      'padding-top': 2*tw
    });

    $('.homeIntro-tile--6').eq(0).css('bottom',2*tw);
    $('.homeIntro-tile--2, .homeIntro-tile--4, .homeIntro-tile--7').css('bottom',tw);
  }
}

var ePF = {
  init: function(){
      // this.teamMembers();
  },
  teamMembers: function () {
      var epfTeam = [],
          lastMousePos = [0, 0];

      $('.team-person').each(function () {
       epfTeam.push($(this).find('.team-person-photo>img').attr('id'));
      });

      function rotateHeads(e){
          if ($(window).width() < (285 * 2 - 1)) return;
          // why? //!$('#team').data('mousemove') ||

          var diffx = e.clientX - lastMousePos[0],
              diffy = e.clientY - lastMousePos[1];

          if (diffx < 2 && diffx > -2 && diffy < 2 && diffy > -2) return;
          lastMousePos = [e.clientX, e.clientY];

          for (var i = 0, l = epfTeam.length; i < l; i++) {
              var $n = $('#' + epfTeam[i]),
                  $p = $n.parent();

              if ($p.length === 0){
                $p = $n.prev();
              }

              var height = $p.innerHeight(),
                  width = $p.innerWidth(),
                  st = Math.max($('body').scrollTop(), $('html').scrollTop()),
                  off = $p.offset();

              if (e.clientX >= off.left && e.clientX <= off.left + width && e.clientY >= off.top - st && e.clientY <= off.top - st + height){
               angle = 12;
              }
              else {
                var centerx = off.left + width / 2,
                    centery = off.top - st + height / 2,
                    tanx, tany;

                tanx = e.clientX - centerx;
                tany = e.clientY - centery;

                var angle = Math.round(Math.atan2(tanx, tany) / (Math.PI / 6));

                angle -= 3;
                angle = (12 - angle) % 12;
              }

              $n.css('top', -height * angle);
          }
      }

      $('body').on('mousemove', $.throttle(90, rotateHeads));
    }
}

on_resize(function(){
  initLayout();
})();

$(document).ready(function(){
	ePF.init();
});



$(document).ready(function() {
$('.tabs').each(function() {
var $ul = $(this);
var $li = $ul.children('li');
$li.each(function() { //pętla po wszystkich tabach
var $trescTaba = $($(this).children('a').attr('href')); //pobieramy blok o id pobranym z linka-taba
if ($(this).hasClass('active')) { //jeżeli ten tab ma klasę aktywną
$trescTaba.show(); //to pobrany przed chwilą blok pokazujemy
} else {
$trescTaba.hide(); //jeżeli takiej klasy nie ma to blok ukrywamy
}
});

//mały trik - gdy klikamy na tab, wtedy wykonujemy zdarzenie dla linka, który się w nim znajduje (dzieki temu możemy kliknąć na cały tab, a nie tylko na linka)
$li.click(function() {$(this).children('a').click()});
//po kliknięciu na link...
$li.children('a').click(function() {
//usuwamy z tabów klasę active
$li.removeClass('active');
//ukrywamy wszystkie taby
$li.each(function() {
$($(this).children('a').attr('href')).hide();
});
//ustawiamy klikniętemu tabowi klasę aktywną
$(this).parent().addClass('active');
$($(this).attr('href')).show();
//nie chcemy wykonać domyślnej akcji dla linka
return false;
});
});
});
