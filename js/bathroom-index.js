{/* <div class="bathroomContainer">
    <div class="media">
        <img></img>
        <div class="media-body">
            <h5><a>Title</a></h5>
            <span>Star</span> <span>Rating</span>
            <p>Address</p>
        </div>
    </div>
</div> */}

function stringToBoolean(val){
    var a = {
        '1':true,
        '0':false
    };
    return a[val];
}



function setCookie(bID) {
    if (document.cookie.indexOf("currentBathroomID=") >= 0) {
        // delete previous cookie if there was one
        var d2 = new Date();
        d2.setTime(d2.getTime() - 7200);
        var expires2 = "expires=" + d2.toUTCString();
        document.cookie = "currentBathroomID=;" + expires2 + "; path=/;";
    } else {
        var d = new Date();
        d.setTime(d.getTime() + 3600);
        var expires = "expires=" + d.toUTCString();
        document.cookie = "currentBathroomID=" + bID + ";" + expires + "; path=/";
    }
}




function createBathroomDiv(id, title, desc, loc, rating, gender, fem, paper, air, breast, diaper) {
    console.log("creating bathroom: " + id);
    var $content = $("<div>", {class: "bathroomContainer"});
    var $div = $("<div>", {class: 'media'});
    $content.attr('value', id);

    // adding tags to class attr of bathroomContainer
    if (gender==='1') {$content.addClass("gender-check");}
    if (fem==='1') {$content.addClass("products-check");}
    if (paper==='1') {$content.addClass("paper-check");}
    if (air==='1') {$content.addClass("air-check");}
    if (breast==='1') {$content.addClass("feed-check");}
    if (diaper==='1') {$content.addClass("diaper-check");}


    var $img = $("<img>", {class: "align-self-start mr-3"});
    $img.attr('src', "http://placehold.it/150x150");

    var $divBody = $("<div>", {class: "media-body"});

    var $a = $("<a>", {'class': 'bathroom-link', 'id': "bathroom" + id, 'value': id, 'href': "bathroom-profile.html", 'onclick': 'setCookie(' + id + ')'});
    var $h5 = $("<h5>", {class: "mt-0"});
    $h5.text(title);
    $h5.appendTo($a);
    $a.appendTo($divBody);


    var $pooSpan = $("<span>", {class: "fas fa-poo checked"});
    var $ratingSpan = $("<span>", {class: "rating"});
    $ratingSpan.text("  " + rating);
    $pooSpan.appendTo($divBody);
    $ratingSpan.appendTo($divBody);

    var $p = $("<p>");
    $p.text(loc);
    $p.appendTo($divBody);

    var $hr = $("<hr>", {class: "my-4"});
    
    
    $img.appendTo($div);
    $divBody.appendTo($div);

    $content.append($div);
    $content.append($hr);

    return $content;
}


function getBathrooms() {
    var $bathroomListEle = $("#bathroomlist");
    
    $.ajax({
        url: 'php/get-bathrooms.php',
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            var bathrooms = data.all_bathrooms_data;
            bathrooms.forEach((item) => {
                var bath = createBathroomDiv(item.bID, item.title, item.description, item.location, item.avgRating, 
                    item.genderN, item.femP, item.paper, item.air, item.breast, item.diaper);
                $bathroomListEle.append(bath);
            });
        }
    }); 
}

