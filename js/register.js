function validateFname() {

    if ($('#fname').val() == '') {    
        $('#fname-note').text('Please enter your first name');
    } else {
        $('#fname-note').text('');
    }
}

function validateLname() {
    if ($('#lname').val() == '') {    
        $('#lname-note').text('Please enter your last name');
    } else {
        $('#lname-note').text('');
    }
}

function validateEmail() {
    if ($('#email').val() == '') {    
        $('#email-note').text('Please enter your email');
    } else {
        $('#email-note').text('');
    }
}

function validatePwd() {
    if ($('#pwd').val() == '') {    
        $('#pwd-note').text('Please enter a password');
    } else if ($('#pwd').val().length < 6) {
        $('#pwd-note').text('Please enter a password with at least 6 characters');
    } else {
        $('#pwd-note').text('');
    }
}

function validateConfirmPwd() {
    if ($('#pwd_confirm').val() == '') {    
        $('#pwd-confirm-note').text('Please confirm your password');
    } else if ($('#pwd').val() !== $('#pwd_confirm').val()) {
        $('#pwd-confirm-note').text('Your password does not match');
    } else {
        $('#pwd-confirm-note').text('');
    }
}
