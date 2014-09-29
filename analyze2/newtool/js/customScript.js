function validateEmail(email) { 
    var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return reg.test(email);
}

function validate(){
    var state = $('#state');
    var captcha = $('#captcha');
    var security_code = $('#security_code');
    var flag = 0;
    
    if(state.val() == '0'){ // If No State Selected
        $('#state_error').html('&#8592;  Select a proper state');
        state.focus();
        flag = 1;
    }
    else
        $('#state_error').html('');
    
//    alert("Captcha Value is "+captcha.val()+"  and  security value is  "+security_code.val());
    if(captcha.val() != security_code.val()){
        $('#captcha_error').html('&#8592;  Give here the Above Captcha');
        if(flag != 1)security_code.focus();
        flag = 1;
    }
    else
        $('#captcha_error').html('');
    
    if(flag == 1)
        return false;
    else 
        return true;
}