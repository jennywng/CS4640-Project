// animating register and login toggle
// $('.message a').click(function(){
//     $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
//     document.getElementById('login-note').innerHTML = "";
// });


function validateEmail() {
    if ($('#l_email').val() == '') {    
        $('#email-note').text('Please enter your email');
    } else {
        $('#email-note').text('');
    }
}

function validatePwd() {
    if ($('#l_pwd').val() == '') {    
        $('#pwd-note').text('Please enter your password');
    } else {
        $('#pwd-note').text('');
    }
}