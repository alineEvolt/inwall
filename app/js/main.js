jQuery.noConflict();
jQuery(function($) {



  document.onreadystatechange = function () {
    if (document.readyState == "complete") {
      $('#home').delay(1000).addClass('go_anim');
    }
  }

  $(document).ready(function() {

  	//Gestion du selecteur de langues
    var txtLang = $('#lang-selector .current-lang a').text();
    $('#lang-selector .current').text(txtLang);

    //Gestion du click sur le bouton "rejoindre un mur existant"
      $('#masthead .join-wall.button-ipad a').on('click touchstart', function(e) {
        var wallBottom = $('.wall-section').offset().top;
        $('html, body').animate({
          scrollTop: wallBottom + 'px'
        }, 500);
        e.preventDefault();
      });

      if (matchMedia('only screen and (max-width: 767px)').matches) {
        $('.button .wall-link').on('click touchstart', function(e) {
          $(this).parents('.join-wall').addClass('animwidth');
          $(this).next().fadeIn();
          e.preventDefault();
        });
      }

    if (matchMedia('only screen and (min-width: 1025px)').matches) {
      $('.button .wall-link').on('click touchstart', function(e) {
        $(this).parents('.join-wall').addClass('animwidth');
        $(this).next().fadeIn();
        e.preventDefault();
      });

      $('.button .input .close').on('click touchstart', function(e) {
        if( $(this).parents('.join-wall').hasClass('animwidth') ) {
          $(this).parents('.join-wall').removeClass('animwidth');
          $(this).parents('.input').find('input').attr('value','');
          $(this).parents('.input').fadeOut(100);
        }
        e.preventDefault();
      });
    }

    //Gestion du click sur le bouton "Buy" [Header]
    $('#masthead .buy').on('click', function(e) {
      var ancreBuy = $(this).attr('href'),
          posAncre = $(ancreBuy).offset().top;

        $('html, body').animate({
          scrollTop : posAncre + 'px'
        }, 1000);

      e.preventDefault();
    });

    // Gestion du menu mobile
    $('.menu-phone').on('click', function() {
      $('html').toggleClass('noScroll');
      $(this).prev().fadeToggle(150);
      $('#header-nav li').toggleClass('show');
      $(this).prev().find('.join-wall').toggleClass('show');
      $(this).prev().find('.login').toggleClass('show');
    });

    //Gestion du slider Testimonials
    var swiper = new Swiper('.testimonials .swiper-container', {
        pagination: '.swiper-pagination',
        slidesPerView: 'auto',
        centeredSlides: true,
        paginationClickable: true,
        spaceBetween: 50
    });


    $('a[href="#video"]').on('click touchstart', function(e) {
      $('html').addClass('noScroll');
      $('#video').fadeIn();
      $('#overlay').fadeIn();
      /*$('video').get(0).play();
      $('.video-container .play').removeClass('thisOne').fadeOut('', function() {
        $(this).parents('.video-container').find('.pause').addClass('thisOne');
      });*/
      e.preventDefault();
    });
    $('#video .close a, #overlay').on('click', function(e) {
      $('html').removeClass('noScroll');
      $('#overlay').fadeOut();
      $('#video').fadeOut();
      /*$('video').get(0).pause();
      $('video').get(0).currentTime = 0;*/
      e.preventDefault();
    });

    //Gestion des animataion des images en parallax [Sections]
    $('.section').each( function() {
      var element = $(this).find('.visu');
      var video = $(this).find('video');

      var animImg = element.waypoint({
        handler: function(direction) {
        if( direction === 'down' ) {
           element.addClass('move');
          }
        },
        offset: '30%'
      });
    });


    $('video').on('timeupdate', function() {

      var vid = $(this),
          vidDur = vid[0].duration,
          vidCur = vid[0].currentTime,
          widthBar = (vidCur * 100) / vidDur;

      $('.video-container .loaded_bar').width(widthBar);


    });

    $('.video-container').find('.play').on('click', 'a', function(e) {
      $('video').get(0).play();
      $(this).parents('.play').removeClass('thisOne').fadeOut('', function() {
        $(this).parents('.video-container').find('.pause').addClass('thisOne');
      });
      e.preventDefault();
    });

    $('.video-container').find('.pause').on('click', 'a', function(e) {
      $('video').get(0).pause();
      $(this).parents('.pause').removeClass('thisOne').fadeOut('', function() {
        $(this).parents('.video-container').find('.play').addClass('thisOne');
      });
      e.preventDefault();
    });

    $('.video-container .inner').on('mouseenter', function() {
      $(this).find('.thisOne').fadeIn();
    });
    $('.video-container .inner').on('mouseleave', function() {
      $(this).find('.thisOne').fadeOut();
    });

    //gestion du scroll des menu du footer (col 1 et 2)
    title = $('title').text();
    $('.home #footer li.scrollit > a').on('click', function(e) {

      var urlSection = $(this).attr('href'),
          classBtn = $(this).attr('class'),
          hashSection = urlSection.substring(urlSection.indexOf('#')),
          offsetSection = $(hashSection).offset().top,
          dataTitle = $(this).attr('data-title');

      $('#footer1, #footer2').find('.current').removeClass('current');
      if( classBtn ==  'btn ancre' ) {
        var idClick = hashSection.substr(1),
            itemNav = 'item-' + idClick;

        dataTitle = $('#' + itemNav).attr('data-title');
        $('#' + itemNav).addClass('current');

      } else {
        $(this).addClass('current');
      }


      $('html, body').animate({
            scrollTop: offsetSection
          }, 1000, function() {
            window.location.hash = hashSection;
            $('title').text(dataTitle + ' | ' + title);
          });

      e.preventDefault();

    });

    //Gestion de l'affichage des pricing tables
      $('.toggle input').on('change', function(e) {
        var checked = this.checked ? 'yearly' : 'monthly';
        $('.pricing-tables').removeClass('yearly');
        $('.pricing-tables').removeClass('monthly');
        $('.pricing-tables').addClass(checked);
        if( this.checked ) {
          $(this).parents('.toggle-pricing').find('.label2').addClass('checked');
          $(this).parents('.toggle-pricing').find('.label1').removeClass('checked');
        } else {
          $(this).parents('.toggle-pricing').find('.label2').removeClass('checked');
          $(this).parents('.toggle-pricing').find('.label1').addClass('checked');
        }
      });

    //Gestion de l'animation de la home
    if (matchMedia('only screen and (min-width: 768px)').matches) {
    //Variables
      var heightPhone = $('#anim_home .phone').height(),
          widthPhone = (((heightPhone * 100) / 601) / 100) * 360,
          widthMes = widthPhone * 0.68,
          widthMesFirst = widthPhone * 0.81,
          difMarge = (widthMesFirst - widthMes) /2,
          heightMes = 122 * 1.1666667,
          heightMesFirst = 57 * 1.14827586;

          //console.log(widthMes);

      //calcul de la taille des différents blocs
      $('#anim_home .message:not(.message1)').css({
        'width' : widthMes + 'px',
        'height': heightMes + 'px',
        'margin-left' : '-' + ( (widthMes + difMarge) / 1.9) + 'px'
      });
      $('#anim_home .message1').css({
        'width' : widthMesFirst + 'px',
        'height': heightMesFirst + 'px',
        'margin-left' : '-' + (widthMesFirst / 2.05) + 'px'
      });
    }
    if (matchMedia('only screen and (max-width: 767px)').matches) {
      $('.btn').parent().css('text-align', 'center');
    }

  }); /* End document ready */

}); /* jQuery end */
