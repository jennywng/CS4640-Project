//reviewFormSubmitBtn
$(':radio').change(function() {
    var rating = this.value;
    console.log('New star rating: ' + this.value);
});



document.getElementById('reviewFormSubmitBtn').onclick = function() {
    console.log('calling review button')
    let reviewBody = document.createElement('div');
    let reviewer = document.createElement('h5').setAttribute('class', 'mt-0');
    let star = document.createElement('span').setAttribute('class', 'fas fa-star checked');
    let number = document.createElement('span').setAttribute('class', 'avg-rating');
    let reviewText = document.createElement('p');


    number.innerHTML = rating;
    reviewer.innerHTML = 'username'
    reviewText.innerHTML = document.getElementById(review);
    console.log(reviewText.innerHTML);
    console.log(star.innerHTML);

    reviewBody.setAttribute('class', 'media');
    reviewBody.append(reviewer);
    reviewBody.append(star);
    reviewBody.append(number);
    reviewBody.append(reviewText);

    let img = document.createElement('img').setAttribute('class', 'align-self-start mr-3').setAttribute('src', 'http://placehold.it/150x150');



    let newReview = document.createElement('div');
    newReview.setAttribute('class', 'media');
    newReview.append(img);
    newReview.append(reviewBody);
    // newReview.action = 'bathroom-profile.html';
    // newReview.method='GET';
    document.getElementById('reviews').append(newReview);


};

// // submitBtn.addEventListener(onclick);
// let form = document.createElement('form');
// form.action = 'https://google.com/search';
// form.method = 'GET';

// form.innerHTML = '<input name="q" value="test">';

// // the form must be in the document to submit it
// document.body.append(form);

// form.submit();