var App = function() {
    // scroll
    var scrollWindow = function() {
        $(window).scroll(function() {
            // checks if window is scrolled more than 500px, adds/removes solid class
            if ($(this).scrollTop() > 150) {
                $('.fixed-top').addClass('resize-on-scroll');
            } else {
                $('.fixed-top').removeClass('resize-on-scroll');
            }
        });
    };
    // Navbar offcanvas
    var newcanvas = function() {
        //cache some jQuery objects
        var modalTrigger = $('#cd-modal-trigger'),
            transitionLayer = $('.cd-transition-layer'),
            transitionBackground = transitionLayer.children(),
            modalWindow = $('.cd-modal');

        var frameProportion = 1.78, //png frame aspect ratio
            frames = 25, //number of png frames
            resize = false;

        //set transitionBackground dimentions
        setLayerDimensions();
        $(window).on('resize', function() {
            if (!resize) {
                resize = true;
                (!window.requestAnimationFrame) ? setTimeout(setLayerDimensions, 300): window.requestAnimationFrame(setLayerDimensions);
            }
        });

        //open modal window
        modalTrigger.on('click', function(event) {
            event.preventDefault();
            transitionLayer.addClass('visible opening');
            var delay = ($('.no-cssanimations').length > 0) ? 0 : 600;
            setTimeout(function() {
                modalWindow.addClass('visible');
            }, delay);
        });

        //close modal window
        modalWindow.on('click', '#modal-close', function(event) {
            event.preventDefault();
            transitionLayer.addClass('closing');
            modalWindow.removeClass('visible');
            transitionBackground.one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function() {
                transitionLayer.removeClass('closing opening visible');
                transitionBackground.off('webkitAnimationEnd oanimationend msAnimationEnd animationend');
            });
        });

        function setLayerDimensions() {
            var windowWidth = $(window).width(),
                windowHeight = $(window).height(),
                layerHeight, layerWidth;

            if (windowWidth / windowHeight > frameProportion) {
                layerWidth = windowWidth;
                layerHeight = layerWidth / frameProportion;
            } else {
                layerHeight = windowHeight * 1.2;
                layerWidth = layerHeight * frameProportion;
            }

            transitionBackground.css({
                'width': layerWidth * frames + 'px',
                'height': layerHeight + 'px',
            });

            resize = false;
        }
    }
    var carousel = function() {
        //Carousel Partners
        $(".partners-carousel").owlCarousel({
            autoplay: true,
            //dots: true,
            loop: true,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 4
                },
                900: {
                    items: 6
                }
            }
        });
        $('.breaking_news_slider').owlCarousel({
            items: 1,
            loop: true,
            //margin: 10,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            dots: false,
        });

        $('.home-slider').owlCarousel({
            loop: true,
            autoplay: true,
            margin: 0,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            nav: false,
            dots: false,
            autoplayHoverPause: false,
            items: 1,
            navText: ["<i class='fas fa-fw fa-chevron-left'></i>", "<i class='fas fa-fw fa-chevron-right'></i>"],
            responsive: {
                4000: {
                    items: 1
                },
                5500: {
                    items: 1
                },
                7000: {
                    items: 1
                }
            }
        });
        $('.carousel-properties').owlCarousel({
            center: true,
            loop: true,
            items: 1,
            margin: 30,
            stagePadding: 0,
            nav: false,
            navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    };

    var contactForm = function() {
        $('.form-control').on('input', function() {
            var $field = $(this).closest('.form-group');
            if (this.value) {
                $field.addClass('field-not-empty');
            } else {
                $field.removeClass('field-not-empty');
            }
        });

        if ($('#contactForm').length > 0) {
            $("#contactForm").validate({
                rules: {
                    name: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    message: {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {
                    name: "Por favor, insira seu nome",
                    email: "Por favor, insira um email válido",
                    message: "Por favor, insira sua mensagem"
                },
                errorElement: 'span',
                errorLabelContainer: '.form-error',
                /* submit via ajax */
                submitHandler: function(form) {
                    var $submit = $('.submitting'),
                        waitText = 'Enviando...';

                    $.ajax({
                        type: "POST",
                        url: APP_URL + "/enviar-email",
                        data: $(form).serialize(),

                        beforeSend: function() {
                            $submit.css('display', 'block').text(waitText);
                        },
                        success: function(msg) {
                            //console.log(msg)
                            if (msg.success == true) {

                                $('#form-message-warning').hide();
                                setTimeout(function() {
                                    $('#contactForm').fadeOut();
                                }, 1000);
                                setTimeout(function() {
                                    $('#form-message-success').fadeIn();
                                }, 1400);

                            } else {
                                $('#form-message-warning').html(message);
                                $('#form-message-warning').fadeIn();
                                $submit.css('display', 'none');
                            }
                        },
                        error: function(msg) {
                            console.log(msg)
                            $('#form-message-warning').html("Ocorreu um erro, por favor tente novamente.");
                            $('#form-message-warning').fadeIn();
                            $submit.css('display', 'none');
                        }
                    });
                }

            });
        }
    }
    var newsletterForm = function() {

        if ($('#newsletterForm').length > 0) {
            $("#newsletterForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                },
                messages: {
                    email: "Por favor, insira um email válido"
                },
                errorElement: 'span',
                errorLabelContainer: '.form-error',
                /* submit via ajax */
                submitHandler: function(form) {
                    var $submit = $('.submitting'),
                        waitText = 'Enviando...';

                    $.ajax({
                        type: "POST",
                        url: APP_URL + "/newsletter",
                        data: $(form).serialize(),

                        beforeSend: function() {
                            $submit.css('display', 'block').text(waitText);
                        },
                        success: function(msg) {

                            if (msg.success == true) {
                                $('#newsletter-message-warning').hide();
                                setTimeout(function() {
                                    $('#newsletterForm').fadeOut();
                                }, 1000);
                                setTimeout(function() {
                                    $('#newsletter-message-success').fadeIn();
                                }, 1400);

                            } else {
                                $('#newsletter-message-warning').html(message);
                                $('#newsletter-message-warning').fadeIn();
                                $submit.css('display', 'none');
                            }
                        },
                        error: function(msg) {
                            //console.log(msg)
                            $('#newsletter-message-warning').html("Email já está cadastrado.");
                            $('#newsletter-message-warning').fadeIn();
                            $submit.css('display', 'none');
                        }
                    });
                }
            });
        }
        if ($('#newsletterFooter').length > 0) {
            $("#newsletterFooter").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                },
                messages: {
                    email: "Por favor, insira um email válido"
                },
                errorElement: 'span',
                errorLabelContainer: '.form-error',
                /* submit via ajax */
                submitHandler: function(form) {
                    var $submit = $('.submitting'),
                        waitText = 'Enviando...';

                    $.ajax({
                        type: "POST",
                        url: APP_URL + "/newsletter",
                        data: $(form).serialize(),

                        beforeSend: function() {
                            $submit.css('display', 'block').text(waitText);
                        },
                        success: function(msg) {

                            if (msg.success == true) {
                                $('#newsletterFooter-message-warning').hide();
                                setTimeout(function() {
                                    $('#newsletterFooter').fadeOut();
                                }, 1000);
                                setTimeout(function() {
                                    $('#newsletterFooter-message-success').fadeIn();
                                }, 1400);

                            } else {
                                $('#newsletterFooter-message-warning').html(message);
                                $('#newsletterFooter-message-warning').fadeIn();
                                $submit.css('display', 'none');
                            }
                        },
                        error: function(msg) {
                            console.log(msg)
                            $('#newsletterFooter-message-warning').html("Email já está cadastrado.");
                            $('#newsletterFooter-message-warning').fadeIn();
                            $submit.css('display', 'none');
                        }
                    });
                }
            });
        }
    }

    var jarallaxPlugin = function() {
        $('.jarallax').jarallax({
            speed: 0.2
        });
    };
    var venoboxPlugin = function() {
        $('.venobox').venobox({
            'share': false
        });
    };
    var fullHeight = function() {
        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function() {
            $('.js-fullheight').css('height', $(window).height());
        });
    };
    var counter = function() {

        $('.counter-section, .counter').waypoint(function(direction) {
            if (direction === 'down' && !$(this.element).hasClass('counter')) {
                var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
                $('.number').each(function() {
                    var $this = $(this),
                        num = $this.data('number');
                    console.log(num);
                    $this.animateNumber({
                        number: num,
                        numberStep: comma_separator_number_step
                    }, 7000);
                });

            }

        }, { offset: '95%' });
    }
    var masks = function() {
        $.getScript(APP_URL + "/admin/js/jquery.mask.min.js", function() {

            var SPMaskBehavior = function(val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                //funcao 9 digitos
                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };
            $('.phones').mask(SPMaskBehavior, spOptions);
        });
    }




    return {
        init: function() {
            scrollWindow()
            newcanvas()
            carousel()
            jarallaxPlugin()
            venoboxPlugin()
            contactForm()
            newsletterForm()
            fullHeight()
            counter()
            masks()
        }
    }
}();

jQuery(document).ready(function() {
    if ($('.preloader').length) {
        $('.preloader').delay(1100).fadeOut('slow', function() {
            $(this).remove();
        });
        $('.preloader-background').addClass('closing').delay(1000).queue(function() {
            $(this).removeClass("visible closing opening").dequeue();
        });
    }

    AOS.init({
        duration: 800,
        easing: 'slide',
        //once: true,
        //offset: -100
    });
    App.init();

    window.jssor_1_slider_init = function() {

        var jssor_1_SlideshowTransitions = [
            { $Duration: 1200, $Zoom: 1, $Easing: { $Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad }, $Opacity: 2 },
            { $Duration: 1000, $Zoom: 11, $SlideOut: true, $Easing: { $Zoom: $Jease$.$InExpo, $Opacity: $Jease$.$Linear }, $Opacity: 2 },
            { $Duration: 1200, $Zoom: 1, $Rotate: 1, $During: { $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8] }, $Easing: { $Zoom: $Jease$.$Swing, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$Swing }, $Opacity: 2, $Round: { $Rotate: 0.5 } },
            { $Duration: 1000, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: { $Zoom: $Jease$.$InQuint, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuint }, $Opacity: 2, $Round: { $Rotate: 0.8 } },
            { $Duration: 1200, x: 0.5, $Cols: 2, $Zoom: 1, $Assembly: 2049, $ChessMode: { $Column: 15 }, $Easing: { $Left: $Jease$.$InCubic, $Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$Linear }, $Opacity: 2 },
            { $Duration: 1200, x: 4, $Cols: 2, $Zoom: 11, $SlideOut: true, $Assembly: 2049, $ChessMode: { $Column: 15 }, $Easing: { $Left: $Jease$.$InExpo, $Zoom: $Jease$.$InExpo, $Opacity: $Jease$.$Linear }, $Opacity: 2 },
            { $Duration: 1200, x: 0.6, $Zoom: 1, $Rotate: 1, $During: { $Left: [0.2, 0.8], $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8] }, $Opacity: 2, $Round: { $Rotate: 0.5 } },
            { $Duration: 1000, x: -4, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: { $Left: $Jease$.$InQuint, $Zoom: $Jease$.$InQuart, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuint }, $Opacity: 2, $Round: { $Rotate: 0.8 } },
            { $Duration: 1200, x: -0.6, $Zoom: 1, $Rotate: 1, $During: { $Left: [0.2, 0.8], $Zoom: [0.2, 0.8], $Rotate: [0.2, 0.8] }, $Opacity: 2, $Round: { $Rotate: 0.5 } },
            { $Duration: 1000, x: 4, $Zoom: 11, $Rotate: 1, $SlideOut: true, $Easing: { $Left: $Jease$.$InQuint, $Zoom: $Jease$.$InQuart, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InQuint }, $Opacity: 2, $Round: { $Rotate: 0.8 } },
            { $Duration: 1200, x: 0.5, y: 0.3, $Cols: 2, $Zoom: 1, $Rotate: 1, $Assembly: 2049, $ChessMode: { $Column: 15 }, $Easing: { $Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad, $Rotate: $Jease$.$InCubic }, $Opacity: 2, $Round: { $Rotate: 0.7 } },
            { $Duration: 1000, x: 0.5, y: 0.3, $Cols: 2, $Zoom: 1, $Rotate: 1, $SlideOut: true, $Assembly: 2049, $ChessMode: { $Column: 15 }, $Easing: { $Left: $Jease$.$InExpo, $Top: $Jease$.$InExpo, $Zoom: $Jease$.$InExpo, $Opacity: $Jease$.$Linear, $Rotate: $Jease$.$InExpo }, $Opacity: 2, $Round: { $Rotate: 0.7 } },
            { $Duration: 1200, x: -4, y: 2, $Rows: 2, $Zoom: 11, $Rotate: 1, $Assembly: 2049, $ChessMode: { $Row: 28 }, $Easing: { $Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad, $Rotate: $Jease$.$InCubic }, $Opacity: 2, $Round: { $Rotate: 0.7 } },
            { $Duration: 1200, x: 1, y: 2, $Cols: 2, $Zoom: 11, $Rotate: 1, $Assembly: 2049, $ChessMode: { $Column: 19 }, $Easing: { $Left: $Jease$.$InCubic, $Top: $Jease$.$InCubic, $Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad, $Rotate: $Jease$.$InCubic }, $Opacity: 2, $Round: { $Rotate: 0.8 } }
        ];

        var jssor_1_options = {
            $AutoPlay: 1,
            $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Rows: 2,
                $SpacingX: 14,
                $SpacingY: 12,
                $Orientation: 2,
                $Align: 156
            }
        };

        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

        /*#region responsive code begin*/

        var MAX_WIDTH = 960;

        function ScaleSlider() {
            var containerElement = jssor_1_slider.$Elmt.parentNode;
            var containerWidth = containerElement.clientWidth;

            if (containerWidth) {

                var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                jssor_1_slider.$ScaleWidth(expectedWidth);
            } else {
                window.setTimeout(ScaleSlider, 30);
            }
        }

        ScaleSlider();

        $Jssor$.$AddEvent(window, "load", ScaleSlider);
        $Jssor$.$AddEvent(window, "resize", ScaleSlider);
        $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
        /*#endregion responsive code end*/
    };

    jssor_1_slider_init();
});