/**
 * Author:              Kyle Vermeulen <kyle@source-lab.co.za>
 * Upated:              02/09/2014
 * Dependencies:        jQuery
 * 
 **/

/**
 * A function which handles what happens when a field is identified as being invalid
 * 
 * @param string target
 * @returns false
 */
function validationError(target) {
    jQuery(target).addClass('error');
    
}

function validate (target){
    if(
        jQuery(target).val().trim() === '' ||
        jQuery(target).val().trim() === jQuery(target).data('default')
    ){
        validationError(target);
        return false;
    }else{
        return true;
    }
}

function validate_email (target){
    var atSymbol    = jQuery(target).val().indexOf('@');
    var dot         = jQuery(target).val().indexOf('.');
    var lastDot     = jQuery(target).val().lastIndexOf('.');
    var length      = (jQuery(target).val().length)-1;
    var secondAt    = jQuery(target).val().indexOf('@', (atSymbol+1));
    
    if(
        jQuery(target).val().trim() === '' ||
        jQuery(target).val().trim() === jQuery(target).data('default') ||
        atSymbol < 0 ||
        atSymbol === 0 ||
        dot < 0 ||
        lastDot < atSymbol ||
        lastDot >= length ||
        secondAt > 0
    ){
        validationError(target);
        return false;
    }else{
        return true;
    }
}


function validate_file (target, filetypes_arr, max_size) {
    if(jQuery(target).val() !== ''){
        var file = jQuery(target)[0].files[0];
        var size = file.size;
        
        var value = jQuery(target).val();
        var lastDot = value.lastIndexOf('.');
        var type = value.substr(lastDot);
        
        is_valid_ext = false;

        for(var i in filetypes_arr){
            if(type === filetypes_arr[i]){
                is_valid_ext = true;
            }
        }
        
        if(is_valid_ext){
            if(max_size*1048576 > size){
                return true;
            }else{
                return false;
            }
        }else{
            return false;        
        }
    }else{
        return false;
    }
}


function clear_focus(target, defaultVal){
    jQuery(target).focus(function(){
        if(jQuery(this).val() == defaultVal){
            //jQuery(this).css('background-color', '#FFFFFF');
            jQuery(this).val('');
        }
    });
    
    jQuery(target).focusout(function(){
        if(jQuery(this).val() == ''){
            //jQuery(this).css('background-color', '#FFFFFF');
            jQuery(this).val(defaultVal);
        }
    });
}


/**
 * ^^^^^^^
 * 
 * jQuery form plugin compatible, I will redo the rest of the functions as I need them
 * but everything above this point is good to go!
 * 
 */


function validate_checkboxes(target){
    var error = '<div class="bubble-left"></div><div class="bubble-inner">Please make at least 1 selection.</div><div class="bubble-right"></div>';

    jQuery('.' + target).focus(function(){
        jQuery(target + '_error').html('');
    })

    jQuery('.' + target).change(function(){
        jQuery(target + '_error').html('');
    })

    if(jQuery('.' + target).is(':checked')){
        return true;
    }else{
        jQuery(target + '_error').html(error);
        return false;
    }
}



function valideate_tinymce(target){    
    if(tinymce.get(target).getContent() !== ''){
        return true;
    }else{        
        return false;
    }

}

function validate_length(string, condition){
    if(string.length < condition){
        return false;
    }else{
        return true;
    }
}

function contains_num(string){
    split_string = string.split("");
    
    for(i=0; i<split_string.length; i++){
        if(!isNaN(split_string[i])){
            return true;
        }        
    }
    
    return false;
}

function contains_letter(string){
    split_string = string.split("");
    
    for(i=0; i<split_string.length; i++){
        if(isNaN(split_string[i])){
            return true;
        }        
    }
    
    return false;
}

function validate_password(target){
    var error = '<div class="bubble-left"></div><div class="bubble-inner">Password must be at least 8 characters long and must contain a combination of letters and numbers.</div><div class="bubble-right"></div>';
    
    jQuery(target).focus(function(){
        jQuery(target + '_error').html('');
    })
        
    if(!validate_length(jQuery(target).val(), 8) || !contains_letter(jQuery(target).val()) || !contains_num(jQuery(target).val())){
        jQuery(target + '_error').html(error);
        return false;
    }else{
        return true;
    }
}

