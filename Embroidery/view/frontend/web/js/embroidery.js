require(['jquery'], function($){
    $(document).ready(function(){
        jQuery(document).on('click', '.swatch-option.image',function(){
            var color = jQuery(this).css("background");
            if(jQuery('input[name=embroidery_checkbox]').is(':checked')) {
                jQuery('.summarylines').css("background", color);
            }                        
        }); 
        $('input[type=checkbox]').click(function(){
            var color = $(".swatch-attribute-options .selected").css("background");
            if(color){
                // var bgcolor = localStorage[color];
                $('.summarylines').css("background",color);

                var inputValue = $(this).attr("value");
                $("." + inputValue).toggle();  
                // Enable Disable Add to Cart Button On click of checkbox
                $("#product-addtocart-button-custom").attr("disabled", this.checked);
                // Hide/Show Add to Cart Original Button
                if($('input[name="embroidery_checkbox"]').is(":checked")){
                    $("#product-addtocart-button").hide();
                }else{
                    $("#product-addtocart-button").show();
                }
                // Embroidery Code Start
                // Show/Hide Embroidery Summary/Embroidery Lines
                if($('#name_embroidery').is(':checked') || $('#stock_design').is(':checked') || $('#custom_logo').is(':checked')) {
                    if($('#name_embroidery').is(':checked')) {
                        $('#options_3').change(function(){
                            if($(this).val() == '1'){
                                $('.1').css('display','block');
                                $('.2').css('display','none');
                                $('.3').css('display','none');
                            }
                            if($(this).val() == '2'){
                                $('.1').css('display','block');
                                $('.2').css('display','block');
                                $('.3').css('display','none');
                            }
                            if($(this).val() == '3'){
                                $('.1').css('display','block');
                                $('.2').css('display','block');
                                $('.3').css('display','block');
                            }
                        }); 
                        $('#cus_name').show();
                    }else {
                        $('#cus_name').hide();
                    }
                    if($('#stock_design').is(':checked')) {
                        $('#options_2').change(function(){
                            if($(this).val() == 'logo1'){
                                $('#logo1').css('display','block');
                                $('#logo2').css('display','none');
                                $('.stock_logo1').css('display','block');
                                $('.stock_logo2').css('display','none');
                            }
                            if($(this).val() == 'logo2'){
                                $('#logo1').css('display','block');
                                $('#logo2').css('display','block');
                                $('.stock_logo1').css('display','block');
                                $('.stock_logo2').css('display','block');
                            }
                        });
                        $('#cus_stock').show();
                    }else {
                        $('#cus_stock').hide();
                    }
                    if($('#custom_logo').is(':checked')) {
                        $('#logooptions_2').change(function(){
                            if($(this).val() == 'customlogo1'){
                                $('#logo_logo1').css('display','block');
                                $('#logo_logo2').css('display','none');
                                $('#customlogo1').css('display','block');
                                $('#customlogo2').css('display','none');
                            }
                            if($(this).val() == 'customlogo2'){
                                $('#logo_logo1').css('display','block');
                                $('#logo_logo2').css('display','block');
                                $('#customlogo1').css('display','block');
                                $('#customlogo2').css('display','block');
                            }
                        });
                        $('#cus_logo').show();
                    }else {
                        $('#cus_logo').hide();
                    }
                    if($('#agree_embroidery_check').is(':checked')) {
                        if($('input[name=name_embroidery]').is(':checked') || $('input[name=stock_design]').is(':checked') || $('input[name=custom_logo]').is(':checked')){
                            $('#product-addtocart-button-custom').prop('disabled', false);
                        }else {
                            alert('Please Select EMbroidery Options First')
                            $('#product-addtocart-button-custom').prop('disabled', true);
                        }
                    }else{
                        $('#product-addtocart-button-custom').prop('disabled', true);
                    }
                }
                
                if($('#agree_embroidery_check').is(':checked')) {
                    $('#product-addtocart-button-custom').prop('disabled', false);
                }else{
                    $('#product-addtocart-button-custom').prop('disabled', true);
                }                
            }else{
                alert('Please Select Color First.');
                $(this).attr('checked', false);
            }
        });
    });
});
// var color = $(".swatch-attribute-options .selected").css("background");

// Onclick Font 1
function myFont(obj,id,font_name){
    require(['jquery'], function($){
        $('.font_block.selected_font').removeClass('selected_font');
        $('.fonts_'+id).addClass('selected_font');
        $('.font_value').html(' ');
        $('.font_value').append(font_name);
        $('.fonts-vald').val(font_name); 
        $(this).prop('required',true);
        var font_family = $(".font_block.selected_font").css("font-family");
        $('.line1namediv').css("font-family",font_family);
    });
}
// Onclick Font 2
function myFont2(obj,id,font_name){
    require(['jquery'], function($){
        $('.font_block2.selected_font').removeClass('selected_font');
        $('.fonts2_'+id).addClass('selected_font');
        $('.font_value2').html(' ');
        $('.font_value2').append(font_name);            
        $(this).prop('required',true);
        var font_family = $(".font_block2.selected_font").css("font-family");
        $('.line2namediv').css("font-family",font_family);
    });
}
// Onclick Font 1
function myFont3(obj,id,font_name){
    require(['jquery'], function($){
        $('.font_block3.selected_font').removeClass('selected_font');
        $('.fonts3_'+id).addClass('selected_font');
        $('.font_value3').html(' ');
        $('.font_value3').append(font_name);
        $(this).prop('required',true);
        var font_family = $(".font_block3.selected_font").css("font-family");
        $('.line3namediv').css("font-family",font_family);
    });
}
// Onclick Color 1
function myColor(obj,id, color_name){
    require(['jquery'], function($){
        $('.color_block.selected_color').removeClass('selected_color');
        $('.color_'+id).addClass('selected_color');
        $('.thread_color_value').html(' ');
        $('.thread_color_value').append(color_name);
        $('.color-vald').val(color_name);
        $(this).prop('required',true);
        var color_code = $(".color_block.selected_color").css("background-color");
        $('.line1namediv').css("color",color_code);
    });
}
// Onclick Color 2
function myColor2(obj,id, color_name){
    require(['jquery'], function($){
        $('.color_block2.selected_color').removeClass('selected_color');
        $('.color2_'+id).addClass('selected_color');
        $('.thread_color_value2').html(' ');
        $('.thread_color_value2').append(color_name);
        $(this).prop('required',true);
        var color_code = $(".color_block2.selected_color").css("background-color");
        $('.line2namediv').css("color",color_code);
    });
}
// Onclick Color 3
function myColor3(obj,id, color_name){
    require(['jquery'], function($){
        $('.color_block3.selected_color').removeClass('selected_color');
        $('.color3_'+id).addClass('selected_color');
        $('.thread_color_value3').html(' ');
        $('.thread_color_value3').append(color_name);
        $(this).prop('required',true);
        var color_code = $(".color_block3.selected_color").css("background-color");
        $('.line3namediv').css("color",color_code);
    });
}
// Onclick Placement 1
function myPlacement(obj,text, value){
    require(['jquery'], function($){
        $('.selected_placement').removeClass('selected_placement');
        $('.'+text).addClass('selected_placement');
        $('.placement_value').html(' ');
        $('.placement_value').append(value);
        $('.placement-vald').val(value);
        $(this).prop('required',true);
    });
}
// Onclick Placement 2
function myPlacement2(obj,text, value){
    require(['jquery'], function($){
        $('.selected_placement').removeClass('selected_placement');
        $('.'+text).addClass('selected_placement');
        $('.placement_value2').html(' ');
        $('.placement_value2').append(value);
        $(this).prop('required',true);
    });
}
// Onclick Placement 3
function myPlacement3(obj,text, value){
    require(['jquery'], function($){
        $('.selected_placement').removeClass('selected_placement');
        $('.'+text).addClass('selected_placement');
        $('.placement_value3').html(' ');
        $('.placement_value3').append(value);
        $(this).prop('required',true);
    });
}
require(['jquery'], function($){
    $(document).ready(function(){
        $(".options_2").change(function(){
            var selected = $(this).children("option:selected").val();
            if(selected == 'logo2') {
                $('.line2stockdiv').show();
            }else{
                $('.line2stockdiv').hide();
            }
        });
        $(".logooptions_2").change(function(){
            var selected = $(this).children("option:selected").val();
            if(selected == 'customlogo2')
            {   
                $('.line2logodiv').show();
            }else{
                $('.line2logodiv').hide();
            }
        });
        $(".options_3").change(function() {
            var selected = $(this).children("option:selected").val();
            if(selected == '1')
            {   
                $('.line1namediv').show();
            }else{
                $('.line1namediv').hide();
            }
            if(selected == '2')
            {   
                $('.line1namediv').show();
                $('.line2namediv').show();
            }else{
                $('.line2namediv').hide();
            }
            if(selected == '3')
            {   
                $('.line1namediv').show();
                $('.line2namediv').show();
                $('.line3namediv').show();
            }else{
                $('.line3namediv').hide();
            }
        });
        $('#input_text_design').keyup(function() {
            var dInput = this.value;
            $('.line1namediv').html(dInput);
        });
        $(".name-line1").change(function(){
            var selected = $(this).children("option:selected").val();
            $('.line1namediv').css("text-transform",selected);
        });
        $('#input_text_design2').keyup(function() {
            var dInput = this.value;
            $('.line2namediv').html(dInput);
            $('.line2namediv').show();
        });
        $(".name-line2").change(function(){
            var selected = $(this).children("option:selected").val();
            $('.line2namediv').css("text-transform",selected);
        });
        $('#input_text_design3').keyup(function() {
            var dInput = this.value;
            $('.line3namediv').html(dInput);
        });
        $(".name-line3").change(function(){
            var selected = $(this).children("option:selected").val();
            $('.line3namediv').css("text-transform",selected);
            $('.line3namediv').show();
        });
        $('input[name=name_embroidery]').click(function(){
            if($('#name_embroidery').is(':checked')){
                var value = $('.options_3').children("option:selected").val();
                if(value == '1'){
                    $('.line1namediv').show();
                    $('.line2namediv').hide();
                    $('.line3namediv').hide();
                }
                if(value == '2') {
                    $('.line1namediv').show();
                    $('.line2namediv').show();
                    $('.line3namediv').hide();
                }
                if(value == '3') {
                    $('.line1namediv').show();
                    $('.line2namediv').show();
                    $('.line3namediv').show();
                }
            }else{
                $('.line1namediv').hide();
                $('.line2namediv').hide();
                $('.line3namediv').hide();
                $('.name_design_cus').hide();
            }
            if($('#stock_design').is(':checked')){
                var value = $('.options_2').children("option:selected").val();
                if(value == 'logo1'){
                    $('.line1stockdiv').show();
                    $('.line2stockdiv').hide();
                }
                if(value = 'logo2') {
                    $('.line1stockdiv').show();
                    $('.line2stockdiv').show();
                }
            }else {
                $('.line1stockdiv').hide();
                $('.line2stockdiv').hide();
                $('.stock.design').hide();
            }
            if($('#custom_logo').is(':checked')){
                var value = $('.logooptions_2').children("option:selected").val();
                if(value == 'customlogo1') {
                    $('.line1logodiv').show();
                    $('.line2logodiv').hide();
                }
                if(value = 'customlogo2') {
                    $('.line1logodiv').show();
                    $('.line2logodiv').show();
                }
            }else {
                $('.line1logodiv').hide();
                $('.line2logodiv').hide();
                $('.logo_design').hide();
            }
        });    
        $('input[name=stock_design]').click(function(){
            if($('#stock_design').is(':checked')) {
                var value = $('.options_2').children("option:selected").val();
                if(value == 'logo1'){
                    $('.line1stockdiv').show();
                    $('.line2stockdiv').hide();
                }if(value = 'logo2') {
                    $('.line1stockdiv').show();
                    $('.line2stockdiv').show();
                }
            }else {
                $('.line1stockdiv').hide();
                $('.line2stockdiv').hide();
            }                
            if($('#name_embroidery').is(':checked')){
                var value = $('.options_3').children("option:selected").val();
                if(value == '1'){
                    $('.line1namediv').show();
                    $('.line2namediv').hide();
                    $('.line3namediv').hide();
                }
                if(value == '2') {
                    $('.line1namediv').show();
                    $('.line2namediv').show();
                    $('.line3namediv').hide();
                }
                if(value == '3') {
                    $('.line1namediv').show();
                    $('.line2namediv').show();
                    $('.line3namediv').show();
                }
            }else {
                $('.line1namediv').hide();
                $('.line2namediv').hide();
                $('.line3namediv').hide();
            }
            if($('#custom_logo').is(':checked')){
                var value = $('.logooptions_2').children("option:selected").val();
                if(value == 'customlogo1') {
                    $('.line1logodiv').show();
                    $('.line2logodiv').hide();
                }
                if(value = 'customlogo2') {
                    $('.line1logodiv').show();
                    $('.line2logodiv').show();
                }
            }else {
                $('.line1logodiv').hide();
                $('.line2logodiv').hide();
            }
        }); 
        $('input[name=custom_logo]').click(function(){
            if($('#custom_logo').is(':checked')){
                var value = $('.logooptions_2').children("option:selected").val();
                if(value == 'customlogo1') {
                    $('.line1logodiv').show();
                    $('.line2logodiv').hide();
                }
                if(value = 'customlogo2') {
                    $('.line1logodiv').show();
                    $('.line2logodiv').show();
                }
            }else {
                $('.line1logodiv').hide();
                $('.line2logodiv').hide();
            }
            if($('#name_embroidery').is(':checked')){
                var value = $('.options_3').children("option:selected").val();
                if(value == '1'){
                    $('.line1namediv').show();
                    $('.line2namediv').hide();
                    $('.line3namediv').hide();
                }
                if(value == '2') {
                    $('.line1namediv').show();
                    $('.line2namediv').show();
                    $('.line3namediv').hide();
                }
                if(value == '3') {
                    $('.line1namediv').show();
                    $('.line2namediv').show();
                    $('.line3namediv').show();
                }
            }else {
                $('.line1namediv').hide();
                $('.line2namediv').hide();
                $('.line3namediv').hide();
            }
            if($('#stock_design').is(':checked')){
                var value = $('.options_2').children("option:selected").val();
                if(value == 'logo1'){
                    $('.line1stockdiv').show();
                    $('.line2stockdiv').hide();
                }
                if(value = 'logo2') {
                    $('.line1stockdiv').show();
                    $('.line2stockdiv').show();
                }
            }else {
                $('.line1stockdiv').hide();
                $('.line2stockdiv').hide();
            }
        });
    });
});
function readImageOne(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            require(['jquery'], function($){
                $('#showimg1logo').attr('src', e.target.result);
            });
        };

        reader.readAsDataURL(input.files[0]);
    }
}
function readImageTwo(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            require(['jquery'], function($){
                $('#showimg2logo').attr('src', e.target.result);
            });
        };

        reader.readAsDataURL(input.files[0]);
    }
}
function sticky_relocate() {
    require(['jquery'], function($){
        var window_top = $(window).scrollTop();
        var div_top = $('#stickydiv').offset().top;
        var div_stop = $('.red').innerHeight();
        if (window_top > div_top ) {
            $('#add-action').addClass('sticky');
            $('.embr_border').addClass('sticky');

        } else {
            $('#add-action').removeClass('sticky');
            $('.embr_border').removeClass('sticky');
        }
        if(window_top >= div_stop){
            $('#add-action').removeClass('sticky');
            $('.embr_border').removeClass('sticky');
        }
    });
}
require(['jquery'], function($){
$(function() {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
});
});
function stockimg (obj,id,name) {
    require(['jquery'], function($){
        $('.logoname.selected_logo').removeClass('selected_logo');
        $('.logoname_'+id).addClass('selected_logo');
        $('.stock_value').html(' ');
        $('.stock_value').append(name);
        $('.stock-vald').val(name);
        $(this).prop('required',true);
        var stock_logo = $(".logoname.selected_logo").find("img").attr("src");
        $('.line1stockdiv img').attr("src", stock_logo);
    });
}
function stockimg2(obj,id,name) {
    require(['jquery'], function($){
        $('.selected_logo2').removeClass('selected_logo2');
        $('.logoname2_'+id).addClass('selected_logo2');
        $('.stock_value2').html(' ');
        $('.stock_value2').append(name);
        $(this).prop('required',true);
        var stock_logo = $(".logoname.selected_logo2").find("img").attr("src");
        $('.line2stockdiv img').attr("src", stock_logo);
    });
}
function StockPlacement(obj,text, value){
    require(['jquery'], function($){
        $('.selected_stock').removeClass('selected_stock');
        $('.'+text).addClass('selected_stock');
        $('.stockplacement_value').html(' ');
        $('.stockplacement_value').append(value);
        $('.stockplacement-vald').val(value);
        $(this).prop('required',true);
    });
}
function StockPlacement2(obj,text, value){
    require(['jquery'], function($){
        $('.selected_stock2').removeClass('selected_stock2');
        $('.'+text).addClass('selected_stock2');
        $('.stockplacement_value2').html(' ');
        $('.stockplacement_value2').append(value);
        $(this).prop('required',true);
    });
}
function LogoPlacement(obj, text, value){
    require(['jquery'], function($){
        $('.selected_cusplacement').removeClass('selected_cusplacement');
        $('.'+text).addClass('selected_cusplacement');
        $('.logoplacement_value').html(' ');
        $('.logoplacement_value').append(value);
        $('.customlogoplacement-vald').val(value);
        $(this).prop('required',true);
    });
}
function LogoPlacement2(obj, text, value){
    require(['jquery'], function($){
        $('.selected_cusplacement2').removeClass('selected_cusplacement2');
        $('.'+text).addClass('selected_cusplacement2');
        $('.logoplacement_value2').html(' ');
        $('.logoplacement_value2').append(value);
        $(this).prop('required',true);
    });
}