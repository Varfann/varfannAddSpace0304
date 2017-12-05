var cases = [];
$(function(){
	$(".human1__pic").on("mouseover", function() { if($(this).find("video").length > 0) {$(this).find("video").prop("loop", true); var video = $(this).find("video")[0]; video.currentTime = 0; video.play(); } });
	
    $('.scrollTo').on('click', function (e) {
        e.preventDefault();
        var t = $(this);
        $.scrollTo(t.attr('href'), 1000);
        return false;
    });

    $(".fancy_video").fancybox({
        fullScreen : {
            autoStart : true
        },
        margin: [0,0]
    });

    resize();
    $(window).on('resize', function () {
        resize();
    });
    scroll();
    $(window).on('scroll', function () {
        scroll();
    });

    $('.icon-hamburger-wrap').on('click', function () {
        toggleBurger($(this));
    });

    $('.products .item').each(function () {
        var t = $(this);

        t.data('old', t.attr('src'));
    });

    $('.owl-carousel').each(function () {
        var t = $(this);

        var params = {
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            navText:['','']
        };

        if (t.attr('owl-params')) {
            var owlParams = JSON.parse(t.attr('owl-params'));

            for(var i in owlParams) {
                params[i] = owlParams[i];
            }
        }

        var owl = t.owlCarousel(params);

        if (t.attr('owl-params') && owlParams.second) {
            owl.on('translated.owl.carousel', function(e) {
                $('.owl-item .item').removeClass('second');
                $('.owl-item.active:first').next().find('.item').addClass('second');
            });
        }
        if (t.attr('owl-params') && owlParams.prizes) {
            owl.on('translated.owl.carousel', function(e) {
                $('.h1_prizes sup').text($('.prizes .owl-item.active [year]').attr('year'));
            });
        }
    });

    var listRU = $.masksSort($.masksLoad("/js/inputmask/phones-ru.json"), ['#'], /[0-9]|#/, "mask");
    var optsRU = {
        inputmask: {
            definitions: {
                '#': {
                    validator: "[0-9]",
                    cardinality: 1
                }
            },
            showMaskOnHover: false,
            autoUnmask: true
        },
        match: /[0-9]/,
        replace: '#',
        list: listRU,
        listKey: "mask"
    };

    $('.phone_mask').each(function () {
        $(this).inputmasks(optsRU);
    });

    $('.btn__filter').on('click', function () {
        $(this).toggleClass('btn__active');
        $('.filter__selects').slideToggle();
    });

    $('.toggle_partners').on('click', function () {
        $('.partners-list__item').addClass('open');
        $(this).hide();
    });

    var usemap = $('img[usemap]');
    usemap.data('old', usemap.attr('src'));

    $('#g4 area').on('mouseover', function () {
        var t = $(this);
        var hoverText = t.attr('hover_text');

        usemap.attr('src', t.attr('hover_src'));

        $('[hover_text]').removeClass('active');
        $('[hover_text="'+ hoverText +'"]').addClass('active');
    }).on('mouseout', function () {
        $('[hover_text]').removeClass('active');
        $('[hover_text="0"]').addClass('active');
        usemap.attr('src', usemap.data('old'));
    });

    $('#g4__mobile area').on('click', function () {
        var t = $(this);
        var hoverText = t.attr('hover_text');

        usemap.attr('src', t.attr('hover_src'));

        $('[hover_text]').removeClass('active');
        $('[hover_text="'+ hoverText +'"]').addClass('active');
    });


    $('.cases__filter .case').each(function(){
        var c = $(this);
        var sections = JSON.parse(c.attr('groups'));

        cases.push({
            'id': c.attr('case'),
            'sections': sections,
            'html': c[0].outerHTML
        });
    });

    $('.filter select').on('change', function() {
        var t = $(this);
        var block = t.closest('div');

        var values = [];

        block.find('select').each(function () {
            var tt = $(this);
            var val = tt.val();

            if(val != '') {
                values.push(val);
            }
        });

        $('.cases__filter').empty();
        for(var i in cases){
            var intersect = values.filter(function(n) {
                return cases[i].sections.indexOf(n) !== -1;
            });

            if(values.length == intersect.length) {
                $('.cases__filter').append($(cases[i].html));
            }
        }
    });
    $('.feedback__btn').on('click', function(e){
        //e.preventDefault();
        request($(this));
    });

    $('.prize__year-left').on('click', function(){
        var owl = $(this).closest('.owl-carousel');
        owl.trigger('prev.owl.carousel');
    });
    $('.prize__year-right').on('click', function(){
        var owl = $(this).closest('.owl-carousel');
        owl.trigger('next.owl.carousel');
    });
    $('.fullscreen_video').on('click', function(e){
        var href = $(this).attr('href');

        e.stopPropagation();
        e.preventDefault();

        $('.player').css({'z-index': 99999});

        var player;
        player = new YT.Player('player', {
            height: '100%',
            width: '100%',
            videoId: href,
            events: {
                'onReady': onPlayerReady
            }
        });
    });
    $('.player__close').on('click', function(){
        $('#player').remove();
        $('.player').css({'z-index': -99999}).append('<div id="player" />');
    });
    $('.human').hover(function () {

    }, function () {
        $('.human__content').hide();
        setTimeout(function () {
            $('.human__content').removeAttr('style');
        }, 300);
    });

    $('.btn_show_video, .btn_close_video').on('click', function () {
        $('.promo__triangle, .btn_show_video, .btn_close_video').fadeToggle();
    });
});
function onPlayerReady(event) {
    event.target.playVideo();
}

var sending = false;
function request(btn)
{
    if (sending) {
        return false;
    }
    sending = true;

    var block = $('.feedback');
    var $form = btn.parent();

    var params = {
        name: $('[data-info=name]', $form).val(),
        email: $('[data-info=email]', block).val(),
        phone: $('[data-info=phone]', block).val(),
        company: $('[data-info=company]', block).val()
    };

    if (
        params.name == '' ||
        params.email == '' ||
        params.phone == '' ||
        params.company == ''
    ) {
        $.fancybox.open('<div><h2>Ошибка!</h2>Необходимо заполнить все поля</div>');

        return false;
    }

    $.post('api.php', {action:'send', params:params}, function (data) {
        if (data.success) {
            $.fancybox.close();
            $.fancybox.open('<div><h2>Успех!</h2>Сообщение отправлено</div>');
        } else {
            $.fancybox.open('<div><h2>Ошибка!</h2>Не удалось отправить сообщение</div>');
        }
        sending = false;
    }, 'json');
}

function scroll()
{
    var height = $(window).height();
    var scrollTop = $(window).scrollTop();
    var header = $('header');

    if (scrollTop * 2 > height) {
        header.addClass('open');
        if ($('#bx-panel').length) {
            header.css({'top': $('#bx-panel').height()});
        }
    } else {
        header.removeClass('open').removeAttr('style');
    }
}

function resize()
{
    var width = $(window).width();
    var height = $(window).height();

    if (width >= 1000) {
        $('.promo__btn').css({left: height * .42});
    } else {
        $('.promo__btn').removeAttr('style');
    }
}

function toggleBurger(btn)
{
    btn.toggleClass('open');
    $('.hamburger-menu').toggleClass('open');
    //condition for mobile version
    if (window.innerWidth > 767) {
        $('a.hamburger-logo').toggleClass('hideDesktop');
    }
}

function initMap()
{
    bounds = new google.maps.LatLngBounds();

    map = new google.maps.Map(document.getElementById('map'), {
        center: new google.maps.LatLng(55.7,37.6),
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        minZoom:3,
        streetViewControl: false,
        scrollwheel: false,
        panControl: false,
        scaleControl: false,
        mapTypeControl: false,
        zoomControl: true,
        zoomControlOptions : {
            position: google.maps.ControlPosition.RIGHT_CENTER
        },
        styles:
            [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
    });

    if(dots){
        for(var i in dots){
            createMarker(dots[i]);
        }
        moveToLocation(dots[i].lat, dots[i].lng);
    }
}
function moveToLocation(lat, lng){
    var center = new google.maps.LatLng(lat, lng);
    map.panTo(center);
}
function createMarker(details)
{

    var image = new google.maps.MarkerImage('/img/dot.png',
        new google.maps.Size(55, 66),
        new google.maps.Point(0,0),
        new google.maps.Point(0,33)
    );

    var marker = new google.maps.Marker({
        position: new google.maps.LatLng(details.lat, details.lng),
        clickable: true,
        draggable: false,
        flat: false,
        icon: image
    });

    var contentString = '<div class="marker_info">'+ details.text + '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    marker.addListener('mouseover', function() {
        infowindow.open(map, marker);
    });


	marker.addListener('mouseout', function() {
        infowindow.close();
    });

    marker.setMap(map);
}