$('.message a').click(function(){
    $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    document.getElementById('login-note').innerHTML = "";
 });


 function validateForm() {
     var em = document.loginform.email.value;
     var pw = document.loginform.pword.value;
     var email = "jrw3mx@virginia.edu";
     var password = "password";
     if ((em == email) && (pw == password)) {
         window.location = "user-home.html";
         return true;
     } else {
         document.getElementById('login-note').innerHTML = "Username or password incorrect";
         return false;
     }
 }