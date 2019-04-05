var medias = document.getElementsByClassName('bathroomContainer');
var genderNeutrals = document.getElementsByClassName('gender-neutral');
var paperTowels = document.getElementsByClassName('paper-towel');
var airDryers = document.getElementsByClassName('air-dryer');
var feedings = document.getElementsByClassName('feeding');
var diapers = document.getElementsByClassName('diaper');


var gender = document.getElementById('gender-check');

gender.addEventListener('change', e => {
    if (e.target.checked == true) {
        for (let i = 0; i < medias.length; i++) {
            medias[i].style.visibility = 'hidden';
        }
        if (genderNeutrals.length > 0) {
            for (let i = 0; i < genderNeutrals.length; i++) {
                genderNeutrals[i].style.visibility = 'visible';
            }
        }
    } else {
        for (let i = 0; i < medias.length; i++) {
            medias[i].style.visibility = 'visible';
        }
    }
});


var paper = document.getElementById('paper-check');

paper.addEventListener('change', e => {
    if (e.target.checked == true) {
        for (let i = 0; i < medias.length; i++) {
            medias[i].style.visibility = 'hidden';
        }
        if (paperTowels.length > 0) {
            for (let i = 0; i < paperTowels.length; i++) {
                paperTowels[i].style.visibility = 'visible';
            }
        }
    } else {
        for (let i = 0; i < medias.length; i++) {
            medias[i].style.visibility = 'visible';
        }
    }
});


var air = document.getElementById('air-check');

air.addEventListener('change', e => {
    if (e.target.checked == true) {
        for (let i = 0; i < medias.length; i++) {
            medias[i].style.visibility = 'hidden';
        }
        if (airDryers.length > 0) {
            for (let i = 0; i < airDryers.length; i++) {
                airDryers[i].style.visibility = 'visible';
            }
        }
    } else {
        for (let i = 0; i < medias.length; i++) {
            medias[i].style.visibility = 'visible';
        }
    }
});


var feed = document.getElementById('feed-check');

feed.addEventListener('change', e => {
    if (e.target.checked == true) {
        for (let i = 0; i < medias.length; i++) {
            medias[i].style.visibility = 'hidden';
        }
        if (feedings.length > 0) {
            for (let i = 0; i < feedings.length; i++) {
                feedings[i].style.visibility = 'visible';
            }
        }
    } else {
        for (let i = 0; i < medias.length; i++) {
            medias[i].style.visibility = 'visible';
        }
    }
});

var diaper = document.getElementById('diaper-check');

diaper.addEventListener('change', e => {
    if (e.target.checked == true) {
        for (let i = 0; i < medias.length; i++) {
            medias[i].style.visibility = 'hidden';
        }
        if (diapers.length > 0) {
            for (let i = 0; i < diapers.length; i++) {
                diapers[i].style.visibility = 'visible';
            }
        }
    } else {
        for (let i = 0; i < medias.length; i++) {
            medias[i].style.visibility = 'visible';
        }
    }
});