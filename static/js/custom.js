window.onload = function () {


    $('#adver_body .adver_img').hover(function () {
        $(this).stop();
        $(this).find('.owl-carousel').stop();
        $(this).find('.owl-carousel').fadeIn(300, function () {
            $(this).find('.owl-carousel').animate({'width': '100%'}, 300);
        });
    }, function () {
        $(this).stop();
        $(this).find('.owl-carousel').stop();
        $(this).find('.owl-carousel').animate({'width': '0'}, 300, function () {
            $(this).find('.owl-carousel').fadeIn(300);
        });

    });


    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1
    });


    $('#adver_body .fa-times').click(function () {
        $(this).parents('.adver_item').fadeOut(300, function () {
            $(this).parents('.adver_item').remove();
        });
    });





    var window_hieght = $(window).innerHeight();

    $('.main_item').css('height', window_hieght);




    $('#menu_icon').click(function () {
        $('#bg_dark').fadeIn(300, function () {
            $('#menu').show(300);
        });
    });

    $('#hide_menu').click(function () {
        $('#menu').hide(300, function () {
            $('#bg_dark').fadeOut(300);
        });
    });

    $('#adver_body .adver_img').hover(function () {
        $(this).stop();
        $(this).find('.owl-next').stop();
        $(this).find('.owl-prev').stop();
        $(this).find('.owl-next').fadeIn(300);
        $(this).find('.owl-prev').fadeIn(300);
        $(this).css({
            'position': 'absolute',
            'left': '0',
            'z-index': '99'
        });
        $(this).addClass('w100');
    }, function () {
        $(this).stop();
        $(this).find('.owl-next').stop();
        $(this).find('.owl-prev').stop();
        $(this).find('.owl-next').fadeOut(300);
        $(this).find('.owl-prev').fadeOut(300);
        $(this).removeClass('w100');
    });



    $('#loader').fadeOut(600);


};


var item1 = $('#item1');
var item2 = $('#item2');
var item3 = $('#item3');


function item_fade_out_center() {
    $('#content1').fadeOut(0);

    $('#content3').fadeOut(0);
    remove_attr();
    var window_hieght = $(window).innerHeight();
    $('.main_item').css('height', window_hieght);
    item2.animate({'width': '92%'}, 400);
    item2.css({
        'right': '0',
        'left': '0'
    });
    item1.animate({'width': '4%'}, 500);
    item3.animate({'width': '4%'}, 500, function () {
        $('#inter2').fadeOut(600, function () {
            $('#content2').fadeIn(600);
        });
    });

    item2.find('h1').html('جیرجیرک');
    item1.find('h1').addClass('active');
    item3.find('h1').addClass('active');

    item2.removeClass('active');
    item1.addClass('active');
    item3.addClass('active');

}

function item_fade_out_first() {
    $('#content2').fadeOut(0);

    $('#content3').fadeOut(0);
    remove_attr();
    var window_hieght = $(window).innerHeight();
    $('.main_item').css('height', window_hieght);

    item1.animate({'width': '92%'}, 500);
    item2.animate({'width': '4%'}, 500);
    item2.css({
        'left': '4%',
        'right': 'auto'
    });
    item3.animate({'width': '4%'}, 500, function () {
        $('#inter1').fadeOut(600, function () {
            $('#content1').fadeIn(600);
        });
    });

    item2.find('h1').addClass('active');
    item2.find('h1').html('<img style="filter: invert(100%);" src="static/image/clock.png">');
    item2.find('#logo').addClass('active');
    item3.find('h1').addClass('active');

    item1.removeClass('active');
    item2.addClass('active');
    item3.addClass('active');


}

function item_fade_out_last() {
    $('#content1').fadeOut(0);

    $('#content2').fadeOut(0);
    remove_attr();
    var window_hieght = $(window).innerHeight();
    $('.main_item').css('height', window_hieght);

    item3.animate({'width': '92%'}, 500);
    item2.animate({'width': '4%'}, 500);
    item2.css({
        'right': '4%',
        'left': 'auto'
    });
    item1.animate({'width': '4%'}, 500, function () {
        $('#inter3').fadeOut(600, function () {
            $('#content3').fadeIn(600);
        });
    });

    item1.find('h1').addClass('active');
    item2.find('h1').addClass('active');
    item2.find('h1').html('<img style="filter: invert(100%);" src="static/image/clock.png">');
    item2.find('#logo').addClass('active');

    item3.removeClass('active');
    item2.addClass('active');
    item1.addClass('active');



}


function remove_attr() {
    item1.find('h1').removeClass('active');
    item2.find('h1').removeClass('active');
    item3.find('h1').removeClass('active');
    $('#logo').removeClass('active');

    /* item1.removeAttr('style');
     item2.removeAttr('style');
     item3.removeAttr('style');*/

    $('#inter1').fadeIn(200);
    $('#inter2').fadeIn(200);
    $('#inter3').fadeIn(200);
    $('#content1').fadeOut(200);
    $('#content2').fadeOut(200);
    $('#content3').fadeOut(200);

}

function append_item(tag) {
    var selected_text = $(tag).find('option:selected').text();
    var selected_val = $(tag).find('option:selected').val();
    var div_search_result = $('#search_result');

    if (selected_val > 0) {
        var tag_item = '<span data-id-filter="' + selected_val + '" class="item"><i onclick="remove_item(this)" class="fa fa-times-circle"></i>' + selected_text + '<input  type="hidden" value="' + selected_val + '"></span>';
        var len = div_search_result.find('span[data-id-filter=' + selected_val + ']').length;
        if (len > 0) {
            div_search_result.find('span[data-id-filter=' + selected_val + ']').remove();
            tag_item = '';
        } else {
            div_search_result.append(tag_item);
            tag_item = '';
        }
    }
}

function remove_item(tag) {
    $(tag).parent('.item').fadeOut(400, function () {
        $(tag).parent('.item').remove();
    });
}

