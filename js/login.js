$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    document.getElementById('login-note').innerHTML = "";
});


function validateFormField(ele) {
    var ele = $(ele);
    if (ele.value.length == 0) {
        $('#name-register-note').innerHTML = 'Please enter a value';
    }
}


// window.addEventListener(window,"load", function() {
//     var loginForm = document.getElementById("loginform");
//     window.addEventListener(loginForm, "submit", function() {
//          validateLogin(loginForm);
//          console.log("event listener added");
//      });
//     var registerForm = document.getElementById("registerform");
//     window.addEventListener(registerForm, "submit", function() {
//         validateRegister(registerForm);
//         console.log("event listener added");
//     })
//  });



//  function validateLogin(form) {
//     console.log("logging in");
//     var email = form.l_email.value;
//     var password = form.l_pwd.value;
//     console.log(email);
//     console.log(password);
//     // $.ajax({
//     //     url: 'php/login.php',
//     //     type: 'POST',
//     //     data: {'email': email, 'pwd': password},
//     //     success: function(data) {
//     //         console.log('success');
//     //     }
//     // }); 
//  }

//  function validateRegister(form) {

//  }