require('./bootstrap');
require('./vendor/jquery.validate.min');
// require('./vendor/jquery.validate.additional');
require('./vendor/slick.min');
require('./vendor/select2.min');
(function($){

    var app;
    app = {
      init: function() {
        // this._cookieBar();
        this._validationJS();
        this._slider();
        this._search();
        this._dropDown();
        this._fixedHeader();
        this._lineHeight();
        this._lightbox();
        this._print();
        this._animate();
        this._select2();
        this._audio();
        
      },
      _audio: function() {
        $('#audio_player').on('click', function() {
          if ($(this).attr('id') == 'audio_player') {
            audio.play();
            $(this).attr('id', 'audio_pause');
          } else {
            audio.pause();
            $(this).attr('id', 'audio_player');
          }
          
        });
      },
      _select2: function() {
        if ($(".select-country").length) {
          $(".select-country").select2({
            minimumResultsForSearch: Infinity,
            theme: "select-country",
            // width: '100%'
          });
        }
  
        if ($("select.form-filter").length) {
          $("select.form-filter").select2({
            minimumResultsForSearch: Infinity,
            width: '100%'
          });
        }
  
        
      },
      _print: function() {
        $('.icon-print').on('click', function(e) {
          e.preventDefault();
          window.print();
        });
      },
      
      _lightbox: function() {
        if ($('.b-sidebar__thumb').length) {
          
          $('.b-sidebar__thumb').on('click', function() {
            $('.lightbox-carousel__popup').addClass('is-show');
            if ($('.lightbox-carousel').length && $('.lightbox-carousel .lightbox-carousel__item').length > 1) {
              $('.lightbox-carousel').slick({
                dots: false,
                arrows: false,
                infinite: true,
                fade: true,
                autoplay: true,
                speed: 1000,
                adaptiveHeight: true,
                asNavFor: '.lightbox-carousel--nav'
              });
            }
            if ($('.lightbox-carousel--nav').length && $('.lightbox-carousel--nav .lightbox-carousel--nav__item').length > 1) {
              $('.lightbox-carousel--nav').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                asNavFor: '.lightbox-carousel',
                dots: false,
                arrows: true,
                focusOnSelect: true,
                infinite: true,
                responsive: [
                  {
                    breakpoint: 768,
                    settings: {
                      slidesToShow: 3
                    }
                  },
                  {
                    breakpoint: 480,
                    settings: {
                      slidesToShow: 2
                    }
                  }
                ]
              });
            }
          });
          $('.lightbox-carousel__popup--close, .lightbox-carousel__popup--transparent').on('click', function(e) {
            e.preventDefault();
            $('.lightbox-carousel__popup').removeClass('is-show');
          });
        }
      },
      
      _animate: function() {
        var delay = 200;
  
        $('.icon-share').on('mouseenter', function() {
          $('.share-links').animate({'opacity' : 1});
          var cible = $('.share-links li');
          for(var i = 0; i < cible.length ; i++) {
            (function() {
              var currentI = i;
              setTimeout(function() {
                cible[currentI].classList.add("is-animated");
              }, (delay*3) - (delay*i));
            })();
          }
        }).on('mouseleave', function() {
          var cible = $('.share-links li');
          for(var i = 0; i < cible.length ; i++) {
            (function() {
              var currentI = i;
              setTimeout(function() {
                cible[currentI].classList.remove("is-animated");
              }, delay*i);
            })();
          }
          $('.share-links').delay((delay*3)).animate({'opacity' : 0});
        });
  
  
  
      },
      _lineHeight: function() {
        $(window).on('load', function() {
          if ($(window).width() < 768) {
            var $cible = ['.b-actu .p', '.content-header .p', '.b-actualite .p', '.body-thumb .p', '.container-contact-form .p', '.text-form-partenaire .p', '.b-partenaire .p', '.b-timeline__text .p'];
            $.each($cible, function(key, value) {
              var $lh = (parseFloat($(value).css('line-height')) * 3);
              var $h = $(value).innerHeight();
              if ($h > $lh) {
                $(value).append('<span> [...]</span>');
                $(value).css({'height': $lh - 2}).addClass('is-hidden');
              }
              $(value).on('click', 'span', function() {
                $(this).parent('.p').toggleClass('is-hidden');
              });
            });
  
  
            var $cibleConcour = $('.text-concours');
            var $lh = (parseFloat($cibleConcour.find('.p').css('line-height')) * 3);
            var $h = $cibleConcour.innerHeight();
            if ($h > $lh) {
              $cibleConcour.append('<span> [...]</span>');
              $cibleConcour.css({'height': $lh - 1}).addClass('is-hidden');
            }
            $cibleConcour.on('click', 'span', function() {
              $(this).parent('.text-concours').toggleClass('is-hidden');
            });
          }
        });
        
  
      },
      _fixedHeader: function() {
        $('header').on('show.bs.collapse', function () {
          $(this).addClass('is-active');
          $('body').addClass('is-clipped');
        });
        $('header').on('hide.bs.collapse', function () {
          $(this).removeClass('is-active');
          $('body').removeClass('is-clipped');
          $('.nav-link.active').removeClass('active').next('.nav-item__wrapper').slideUp();
          $('.nav-item__dropDown > a.active').removeClass('active').next('ul').slideUp();
        });
  
        if ($('.fixed-breadcrumb').length && $(window).width() > 767) {
          var topInLoad = $('.fixed-breadcrumb').offset().top;
  
          var $breadcrumbHeight = $('.fixed-breadcrumb').outerHeight(true);
          var $headerHeightInLoad = $('header').outerHeight(true);
          
          $(window).on('load scroll', function() {
            var headerHeight = $('.header__middle').outerHeight(true);
            if ($(window).scrollTop() >= topInLoad - headerHeight) {
              $('.fixed-breadcrumb').addClass('is-fixed').css('top', headerHeight);
              $('body').css('padding-top', ($headerHeightInLoad + $breadcrumbHeight));
            } else {
              $('.fixed-breadcrumb').removeClass('is-fixed').css('top', 'auto');
              $('body').css('padding-top', 0);
            }
          });
        }
  
        $(window).on('load scroll', function() {
  
          var $headerHeight = $('header').height();
          
            if ($(window).scrollTop() > $headerHeight) {
              $('header').addClass('is-sticky');
            } else {
              $('header').removeClass('is-sticky');
            }
        });
  
      },
      _dropDown: function() {
        $(window).on('load', function() {
          if ($(window).width() < 767) {
            $('.nav-link.has-child').on('click', function(e) {
              e.preventDefault();
              var $parent = $(this).parents('.navbar-nav');
  
              $parent.find('.nav-item__dropDown > a.is-active').removeClass('is-active').next('ul').slideUp();
  
              if($(this).hasClass('is-active')) {
                $(this).removeClass('is-active').next('.nav-item__wrapper').slideUp();
                return false;
              }
  
              $parent.find('.nav-link.is-active').removeClass('is-active').next('.nav-item__wrapper').slideUp();
              $(this).addClass('is-active').next('.nav-item__wrapper').slideDown();
            });
  
            $('.nav-item__dropDown > a.has-child').on('click', function(e) {
              e.preventDefault();
              var $parent = $(this).parents('.nav-item__container--left');
  
              if($(this).hasClass('is-active')) {
                $(this).removeClass('is-active').next('ul').slideUp();
                return false;
              }
  
              $parent.find('.is-active').removeClass('is-active').next('ul').slideUp();
              $(this).addClass('is-active').next('ul').slideDown();
            });
          }
          
        });
        
      },
      _search: function() {
        $('.btn-search').click(function(e) {
          e.preventDefault();
          $(this).addClass('is-opened');
          $('body, .s-search, .search-overlay').addClass('is-opened');
        });
        $('.close-search').on('click', function(e) {
          e.preventDefault();
          $('body, .s-search, .search-overlay, .btn-search').removeClass('is-opened');
        });
  
        $('#form-search #search').on('focus', function() {
          $(this).next('.links').addClass('is-listed');
        });
        // $('#form-search #search').on('blur', function() {
        //   $(this).next('.links').removeClass('is-listed');
        // });
  
        $('#form-search .links span').on('click', function() {
          $('#form-search #search').val($(this).text());
        });
  
      },
      _slider: function() {
        if ($('.slider__home').length && $('.slider__home .b-bandeau').length > 1) {
          $('.slider__home').slick({
            dots: true,
            arrows: false,
            infinite: true,
            autoplay: true,
            speed: 1000,
            // autoplaySpeed: 5000,
            adaptiveHeight: true,
            responsive: [
              {
                breakpoint: 767,
                settings: {
                  dots: false,
                }
              }
            ]
          });
        }
        $('.slider-partenaire').slick({
          infinite: false,
          dots: false,
          arrows: true,
          slidesToShow: 6,
          slidesToScroll: 1,
          responsive: [
            {
              breakpoint: 1025,
              settings: {
                slidesToShow: 4,
              }
            },
            {
              breakpoint: 801,
              settings: {
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 481,
              settings: {
                slidesToShow: 2,
              }
            }
          ]
        });
      },
      _cookieBar: function() {
        $.cookieBar({
          // forceShow: true,
          message: 'En poursuivant votre navigation sur ce site, vous acceptez l’utilisation de cookies pour optimiser les performances de ce site et vous proposer des services et offres adaptés à vos préférences et vos centres d’intérêts. <a href="/mentions-legales">En savoir plus</a>',
          acceptButton: true,
          acceptText: 'J’accepte',
          autoEnable: true,
          effect: 'slide',
          fixed: true,
          bottom: true
        });
      },
      _validationJS: function() {
        //Redefinition des messages de validation
        $.extend($.validator.messages, {
          required: "Ce champ est obligatoire.",
          remote: "Veuillez corriger ce champ.",
          email: "Veuillez fournir une adresse électronique valide.",
          url: "Veuillez fournir une adresse URL valide.",
          date: "Veuillez fournir une date valide.",
          dateISO: "Veuillez fournir une date valide (ISO).",
          number: "Veuillez fournir un numéro valide.",
          digits: "Veuillez fournir seulement des chiffres.",
          creditcard: "Veuillez fournir un numéro de carte de crédit valide.",
          equalTo: "Veuillez fournir encore la même valeur.",
          extension: "Veuillez f ournir une valeur avec une extension valide.",
          maxlength: $.validator.format("Veuillez fournir au plus {0} caractères."),
          minlength: $.validator.format("Veuillez fournir au moins {0} caractères."),
          rangelength: $.validator.format("Veuillez fournir une valeur qui contient entre {0} et {1} caractères."),
          range: $.validator.format("Veuillez fournir une valeur entre {0} et {1}."),
          max: $.validator.format("Veuillez fournir une valeur inférieure ou égale à {0}."),
          min: $.validator.format("Veuillez fournir une valeur supérieure ou égale à {0}."),
          step: $.validator.format("Veuillez fournir une valeur multiple de {0}."),
          maxWords: $.validator.format("Veuillez fournir au plus {0} mots."),
          minWords: $.validator.format("Veuillez fournir au moins {0} mots."),
          rangeWords: $.validator.format("Veuillez fournir entre {0} et {1} mots."),
          letterswithbasicpunc: "Veuillez fournir seulement des lettres et des signes de ponctuation.",
          alphanumeric: "Veuillez fournir seulement des lettres, nombres, espaces et soulignages.",
          lettersonly: "Veuillez fournir seulement des lettres.",
          nowhitespace: "Veuillez ne pas inscrire d'espaces blancs.",
          ziprange: "Veuillez fournir un code postal entre 902xx-xxxx et 905-xx-xxxx.",
          integer: "Veuillez fournir un nombre non décimal qui est positif ou négatif.",
          vinUS: "Veuillez fournir un numéro d'identification du véhicule (VIN).",
          dateITA: "Veuillez fournir une date valide.",
          time: "Veuillez fournir une heure valide entre 00:00 et 23:59.",
          phoneUS: "Veuillez fournir un numéro de téléphone valide.",
          phoneUK: "Veuillez fournir un numéro de téléphone valide.",
          mobileUK: "Veuillez fournir un numéro de téléphone mobile valide.",
          strippedminlength: $.validator.format("Veuillez fournir au moins {0} caractères."),
          email2: "Veuillez fournir une adresse électronique valide.",
          url2: "Veuillez fournir une adresse URL valide.",
          creditcardtypes: "Veuillez fournir un numéro de carte de crédit valide.",
          ipv4: "Veuillez fournir une adresse IP v4 valide.",
          ipv6: "Veuillez fournir une adresse IP v6 valide.",
          require_from_group: "Veuillez fournir au moins {0} de ces champs.",
          nifES: "Veuillez fournir un numéro NIF valide.",
          nieES: "Veuillez fournir un numéro NIE valide.",
          cifES: "Veuillez fournir un numéro CIF valide.",
          postalCodeCA: "Veuillez fournir un code postal valide.",
          regex: "Adresse email invalide",
        });
  
  
        $.validator.addMethod("customemail", 
            function(value, element) {
              return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
            }, 
            "Veuillez fournir une adresse électronique valide."
        );
  
        
        if ($('#form-newsletter').length) {
          $('#form-newsletter').validate({
            rules: {
              "email": {
                required: true,
                'customemail': true
              },
              'check-newsletter-form': 'required'
            }
          });
        }
        if ($('#form-search').length) {
          $('#form-search').validate({
            rules: {
              "search": {
                required: true,
                minlength: 3
              }
            }
          });
        }
  
  
  
        if ($("#exposition-form").length) {
          $("#exposition-form").validate({
            rules: {
              "nom": "required",
              "email": {
                required: true,
                'customemail': true
              },
              "tel": "required",
              "check-exposition-form": 'required'
            }
          });
        }
  
        if ($("#contact-form").length) {
          $("#contact-form").validate({
            rules: {
              "choix": "required",
              "nom": "required",
              "email": {
                required: true,
                'customemail': true
              },
              "tel": {
                number: true,
                required: true
              },
              "nomEtablissement": "required",
              "adresseEtablissement": "required",
  
              "check-contact-form": 'required'
            }
          });
        }
  
        if ($("#partenaire-form").length) {
          $("#partenaire-form").validate({
            rules: {
              "nom": "required",
              "email": {
                required: true,
                'customemail': true
              },
              "tel": {
                number: true,
                required: true
              },
              "check-partenaire-form": 'required'
            }
          });
        }
  
        if ($("#pratique-contact-form").length) {
          $("#pratique-contact-form").validate({
            rules: {
              "choix": "required",
              "nom": "required",
              "email": {
                required: true,
                'customemail': true
              },
              "tel": {
                number: true,
                required: true
              },
              "check-pratique-contact-form": 'required'
            }
          });
        }
  
        if ($("#pratique-sejour-form").length) {
          $("#pratique-sejour-form").validate({
            rules: {
              "nom": "required",
              "email": {
                required: true,
                'customemail': true
              },
              "tel": {
                number: true,
                required: true
              },
              "check-pratique-sejour-form": 'required'
            }
          });
        }
      }
    };
  
    app.init();
  
  
  }(jQuery));