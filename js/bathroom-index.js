function createBathroomDiv(id, title, desc, loc) {
    console.log("creating bathroom: " + id);
    var $content = $("<div>", {class: "bathroomContainer"});
    var $div = $("<div>", {class: 'media'});
    $div.attr('value', id);

    var $img = $("<img>", {class: "align-self-start mr-3"});
    $img.attr('src', "http://placehold.it/150x150");

    var $divBody = $("<div>", {class: "media-body"});

    var $a = $("<a>");
    var $h5 = $("<h5>", {class: "mt-0"});
    $h5.text(title);
    $h5.appendTo($a);
    $a.appendTo($divBody);
    $a.attr('href', "bathroom-profile.html")

    var $pooSpan = $("<span>", {class: "fas fa-poo checked"});
    var $ratingSpan = $("<span>", {class: "rating"});
    $ratingSpan.text("  0");
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

    console.log($content);

    return $content;
}


function getBathrooms() {
    console.log("getting bathrooms");
    var $bathroomListEle = $("#bathroomlist");
    // var bathroomListEle = document.getElementById('bathroomlist');
    console.log($bathroomListEle);

    $.ajax({
        url: 'php/get-bathrooms.php',
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            var bathrooms = data.all_bathrooms_data;
            console.log(bathrooms);
            bathrooms.forEach((item) => {
                var bath = createBathroomDiv(item.bID, item.title, item.description, item.location);
                $bathroomListEle.append(bath);
              });

        }
    }); 
}
