var product = document.getElementById('products-check');
product.addEventListener('change', e => {
    if (e.target.checked == true) {

        $('.product-check').prependTo('#bathroomList');
        // $("div[class='bathroomContainer']:not(.paper-check)").hide();
        $(".bathroomContainer").hide();
        $('.product-check').fadeIn("slow");
    } else {
        $(".bathroomContainer").hide();
        $(".bathroomContainer").fadeIn("slow");
    }
});

var paper = document.getElementById('paper-check');
paper.addEventListener('change', e => {
    if (e.target.checked == true) {

        $('.paper-check').prependTo('#bathroomList');
        // $("div[class='bathroomContainer']:not(.paper-check)").hide();
        $(".bathroomContainer").hide();
        $('.paper-check').fadeIn("slow");
    } else {
        $(".bathroomContainer").hide();
        $(".bathroomContainer").fadeIn("slow");
    }
});

var gender = document.getElementById('gender-check');
gender.addEventListener('change', e => {
    if (e.target.checked == true) {
        $('.gender-check').prependTo('#bathroomList');
        // $("div[class='bathroomContainer']:not(.paper-check)").hide();
        $(".bathroomContainer").hide();
        $('.gender-check').fadeIn("slow");
    } else {
        $(".bathroomContainer").hide();
        $(".bathroomContainer").fadeIn("slow");
    }
});

var air = document.getElementById('air-check');
air.addEventListener('change', e => {
    if (e.target.checked == true) {
        $('.air-check').prependTo('#bathroomList');
        // $("div[class='bathroomContainer']:not(.paper-check)").hide();
        $(".bathroomContainer").hide();
        $('.air-check').fadeIn("slow");
    } else {
        $(".bathroomContainer").hide();
        $(".bathroomContainer").fadeIn("slow");
    }
});


var feed = document.getElementById('feed-check');
feed.addEventListener('change', e => {
    if (e.target.checked == true) {
        $('.feed-check').prependTo('#bathroomList');
        // $("div[class='bathroomContainer']:not(.paper-check)").hide();
        $(".bathroomContainer").hide();
        $('.feed-check').fadeIn("slow");
    } else {
        $(".bathroomContainer").hide();
        $(".bathroomContainer").fadeIn("slow");
    }
});

var diaper = document.getElementById('diaper-check');

diaper.addEventListener('change', e => {
    if (e.target.checked == true) {
        $('.diaper-check').prependTo('#bathroomList');
        // $("div[class='bathroomContainer']:not(.paper-check)").hide();
        $(".bathroomContainer").hide();
        $('.diaper-check').fadeIn("slow");
    } else {
        $(".bathroomContainer").hide();
        $(".bathroomContainer").fadeIn("slow");
    }
});