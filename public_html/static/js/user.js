$(document).ready(function(){
    $('.menu_item').css('display', 'none');
    $('.menu_sub_item').css('display', 'none');
    
    if ($.cookie('cart_open') == 0) {
        $('#cart_items_list').hide();
        $('#hide_cart_link').hide();
        $('#show_cart_link').show();
    }
        
    $('.menu_top_item_label').click(function(){
        if ($(this).parent('li').find('.menu_sub_item').is(':animated') == false) {
            $(this).parent('li').find('.menu_sub_item').slideToggle();
            $(this).parent('li').toggleClass("expanded_menu_item");
        }
    });
    
    $('.menu_sub_item_label').click(function(){
        if ($(this).parent('li').find('.menu_item').is(':animated') == false) {
            $(this).parent('li').find('.menu_item').slideToggle(); 
            $(this).parent('li').toggleClass("expanded_menu_sub_item");            
        }
        return false;
    });
    
    $('.menu_last_item a').click(function(){                
        location = $(this).attr("href");
        return false;
    });
        
    var slide_down = true;
    $('.active_menu_item').closest('.menu_top_item').toggleClass("expanded_menu_item").find('.menu_sub_item').slideToggle('slow', function(){
        if (slide_down) {
            $('.active_menu_item').parent('.menu_item').slideToggle('slow').parent().toggleClass("expanded_menu_sub_item"); 
            slide_down =  false;            
        }
    });
    
    $('#search_bar_sample_text').click(function(){
        $('#search_bar_field').attr('value', $('#search_bar_sample_text').text());
    });
    
    $('#show_cart_link').click(function(){
        $('#cart_items_list').slideDown('slow', function(){
            $('#show_cart_link').hide();
            $('#hide_cart_link').show();
            $.cookie('cart_open', 1);
        });
    });
    
    $('#hide_cart_link').click(function(){
        $('#cart_items_list').slideUp('slow', function(){
            $('#hide_cart_link').hide();
            $('#show_cart_link').show();
            $.cookie('cart_open', 0);
        });
    });
    
    $('#modal').height($(document).height());    
    $('#modal_bg').height($(document).height());
//    $('#modal_bg').fadeTo('fast', 0.6);
    
    $('.close_modal_and_continue').click(function(){
       $('#modal').fadeOut('normal');
       $('#modal_bg').fadeOut('normal');
    });        
    
});

