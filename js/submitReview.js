var rating;
$(':radio').change(function() {
    rating = this.value;
    console.log('New star rating: ' + this.value);
});



document.getElementById('reviewFormSubmitBtn').onclick = function() {
    console.log('calling review button');
    let reviewBody = document.createElement('div');
    let reviewer = document.createElement('h5');
    let star = document.createElement('span');
    let number = document.createElement('span');
    let reviewText = document.createElement('p');
    let reviewText2 = document.createElement('p');
    let line = document.createElement('hr');
    line.setAttribute('class', 'my-4');


    number.setAttribute('class', 'avg-rating');
    reviewer.setAttribute('class', 'mt-0');
    star.setAttribute('class', 'fas fa-star checked');


    number.innerHTML = rating;
    reviewer.innerHTML = 'username';
    reviewText.innerHTML = document.getElementById('review-text').value;

    reviewBody.setAttribute('class', 'media-body');
    reviewBody.append(reviewer);
    reviewBody.append(star);
    reviewBody.append(number);
    reviewBody.append(reviewText);
    reviewBody.append(reviewText2);


    let img = document.createElement('img')
    img.setAttribute('src', 'http://placehold.it/150x150');
    img.setAttribute('class', 'align-self-start mr-3');
    


    let newReview = document.createElement('div');
    newReview.setAttribute('class', 'media');
    newReview.append(img);
    newReview.append(reviewBody);

    document.getElementById('reviews').append(line);
    document.getElementById('reviews').append(newReview);


};
