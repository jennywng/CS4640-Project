function createReviewDiv(id, title, desc, loc, rating) {
    console.log("creating bathroom: " + id);
    var $content = $("<div>", {class: "bathroomContainer"});
    var $div = $("<div>", {class: 'media'});
    $div.attr('value', id);

    var $img = $("<img>", {class: "align-self-start mr-3"});
    $img.attr('src', "http://placehold.it/150x150");

    var $divBody = $("<div>", {class: "media-body"});

    var $a = $("<a>", {'class': 'bathroom-link', 'id': id, 'value': id});
    var $h5 = $("<h5>", {class: "mt-0"});
    $h5.text(title);
    $h5.appendTo($a);
    $a.appendTo($divBody);
    $a.attr('href', "bathroom-profile.html")

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

    console.log($content);

    return $content;
}


function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}

var bathID = getCookie('currentBathroomID');

function getBathroomDetail(bID) {
    var $bathroomListEle = $("#bathroomlist");
    
    $.ajax({
        url: 'php/get-bathroom-detail.php',
        type: 'GET',
        data: {
            'bathroomID': bID,
        },
        success: function(data) {
            if (data === 'No results' || data === 'error, no user') {
                console.log(data);
            } else {
                console.log(JSON.parse(data));
            }
        }
    }); 
}
