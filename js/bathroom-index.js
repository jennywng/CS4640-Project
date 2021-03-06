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

    var $a = $("<a>", {'class': 'bathroom-link', 'id': "bathroom" + id, 'value': id, 'href': "bathroom-detail.php?bID=" + id});
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
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this. status == 200) {
            var $bathroomListEle = $("#bathroomlist");
            // console.log(this.responseText);
            var bathrooms = JSON.parse(this.responseText);
            console.log(bathrooms.all_bathrooms_data);
            bathrooms.all_bathrooms_data.forEach((item) => {
                var bath = createBathroomDiv(item.bID, item.title, item.description, item.location, item.avgRating, 
                    item.genderN, item.femP, item.paper, item.air, item.breast, item.diaper);
                $bathroomListEle.append(bath);
            });
        }
    };
    xhr.open("POST", "php/get-bathrooms.php", true);
    xhr.send();
}

// function getBathrooms() {
//     var $bathroomListEle = $("#bathroomlist");
    
//     $.ajax({
//         url: 'php/get-bathrooms.php',
//         type: 'POST',
//         dataType: 'json',
//         success: function(data) {
//             var bathrooms = data.all_bathrooms_data;
//             bathrooms.forEach((item) => {
//                 var bath = createBathroomDiv(item.bID, item.title, item.description, item.location, item.avgRating, 
//                     item.genderN, item.femP, item.paper, item.air, item.breast, item.diaper);
//                 $bathroomListEle.append(bath);
//             });
//         }
//     }); 
// }

