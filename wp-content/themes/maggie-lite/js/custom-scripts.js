/**
* Custom js for Maggie Lite
* 
*/

jQuery(document).ready(function($){

    $('.search-icon i.fa-search').click(function() {
        $('.search-icon .ed-search').toggleClass('active');
    });

    $('.ed-search i.fa-close').click(function() {
        $('.search-icon .ed-search').removeClass('active');
    });

    $('.nav-toggle > .fa').click(function() {
        $('.nav-wrapper .menu').slideToggle('slow');
        $(this).parent('.nav-wrapper').toggleClass('active');
    });

    $('.nav-wrapper .sub-toggle').click(function() {
        $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
        $(this).children('.fa-angle-right').first().toggleClass('fa-angle-down');
    });

    new WOW().init();

// hide #back-top first
$("#back-top").hide();

// fade in #back-top
$(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });

    // scroll body to 0px on click
    $('#back-top').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});

$('.bottompost-wrapper .post-title > a').css({'overflow': 'hidden', 'text-overflow': 'ellipsis', 'white-space': 'nowrap'});
$(".bottompost-wrapper .post-title > a").on("mouseover", function(){
    var blw = $(this).width();
    var btw = $('.bottompost-wrapper .single_post h3.post-title ').width();
    var bsw = blw - btw;
    bpo = -parseInt(bsw);
    //alert(abc);
    $(this).css({'left': bpo, 'width': '200%'});
});

$(".bottompost-wrapper .post-title > a").on("mouseout", function(){
    var blw = $(this).width();
    $(this).css({'left': '0', 'width': '100%'});
  });


$('.toppost-right .post-title > a').css({'overflow': 'hidden', 'text-overflow': 'ellipsis', 'white-space': 'nowrap'});
$(".toppost-right .post-title > a").on("mouseover", function(){
    var tlw = $(this).width();
    var ttw = $('.toppost-right .single_post h3.post-title ').width();
    var tsw = tlw - ttw;
    tpo = -parseInt(tsw);
    //alert(abc);
    $(this).css({'left': tpo, 'width': '200%'});
});

$(".toppost-right .post-title > a").on("mouseout", function(){
    var tlw = $(this).width();
    $(this).css({'left': '0', 'width': '100%'});
  });

$('.second-block .post-title > a').css({'overflow': 'hidden', 'text-overflow': 'ellipsis', 'white-space': 'nowrap'});
$(".second-block .post-title > a").on("mouseover", function(){
    var slw = $(this).width();
    var stw = $('.second-block .single_post h3.post-title ').width();
    var ssw = slw - stw;
    sbo = -parseInt(ssw);
    //alert(abc);
    $(this).css({'left': sbo, 'width': '200%'});
});

$(".second-block .post-title > a").on("mouseout", function(){
    var slw = $(this).width();
    $(this).css({'left': '0', 'width': '100%'});
  });


$('.widget_maggie_lite_register_latest_posts h3.post-title a').css({'overflow': 'hidden', 'text-overflow': 'ellipsis', 'white-space': 'nowrap'});
$(".widget_maggie_lite_register_latest_posts h3.post-title a").on("mouseover", function(){
    var wlw = $(this).width();
    var wtw = $('.widget_maggie_lite_register_latest_posts h3.post-title').width();
    var wsw = wlw - wtw;
    wro = -parseInt(wsw);
    //alert(abc);
    $(this).css({'left': wro, 'width': '200%'});
});

$(".widget_maggie_lite_register_latest_posts h3.post-title a").on("mouseout", function(){
    var wlw = $(this).width();
    $(this).css({'left': '0', 'width': '100%'});
  });

$(".wdgt-slide").bxSlider({
    controls:true,
    pager:true,
    auto:true
});

// Widget tabbed
$('.maggie-lite-cat-tabs').each(function(){
    $(this).find('.cat-tab:first').addClass('active');
});

$('.maggie-lite-tabbed-wrapper').each(function(){
    $(this).find('.maggie-lite-tabbed-section:first').show();
});

$('#maggie-lite-widget-tabbed li a').click(function(event) {
    var tabId = $(this).attr('id');
    $('.maggie-lite-tabbed-section').hide();
    $('#section-'+tabId).show();
    $('.cat-tab').removeClass('active');
    $(this).parent('li').addClass('active');
});

var winwidth = $(window).width();
if(winwidth >= 1097){var mslide = 4; slidew = 300;}
else if(winwidth <= 1096 && winwidth >= 801){var mslide = 3; slidew = 300;}
else if(winwidth <= 800 && winwidth >= 641){var mslide = 3; slidew = 640;}
else if(winwidth <= 640 && winwidth >= 541){var mslide = 2; slidew = 640;}
else if(winwidth <= 540 && winwidth >= 320){var mslide = 1; slidew = 540;}

$('.second-block-wrapper .block-post-wrapper').bxSlider({
    controls:true,
    pager:false,
    auto:false,
    minSlides:mslide,
    maxSlides:mslide,
    moveSlides:1,
    slideWidth:slidew,
    slideMargin:20
});

});