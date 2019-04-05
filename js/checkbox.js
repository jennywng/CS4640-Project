// var $medias = $('.bathroomContainer');
// var $genderNeutrals = $('.gender-neutral');
// var $femProducts = $('.fem-prod')
// var $paperTowels = $('.paper-towel');
// var $airDryers = $('.air-dryer');
// var $feedings = $('.feeding');
// var $diapers = $('.diaper');


var paper = document.getElementById('paper-check');

paper.addEventListener('change', e => {
    if (e.target.checked == true) {

        $('.paper-check').prependTo('#bathroomList');

        // $("div[class='bathroomContainer']:not(.paper-check)").hide();
        $(".bathroomContainer").hide();
        $('.paper-check').fadeIn("slow");

    } else {
        $(".bathroomContainer").show();
    }
});





// var paper = document.getElementById('paper-check');

// paper.addEventListener('change', e => {
//     if (e.target.checked == true) {
//         for (let i = 0; i < medias.length; i++) {
//             medias[i].style.visibility = 'hidden';
//         }
//         if (paperTowels.length > 0) {
//             for (let i = 0; i < paperTowels.length; i++) {
//                 paperTowels[i].style.visibility = 'visible';
//             }
//         }
//     } else {
//         for (let i = 0; i < medias.length; i++) {
//             medias[i].style.visibility = 'visible';
//         }
//     }
// });


// var air = document.getElementById('air-check');

// air.addEventListener('change', e => {
//     if (e.target.checked == true) {
//         for (let i = 0; i < medias.length; i++) {
//             medias[i].style.visibility = 'hidden';
//         }
//         if (airDryers.length > 0) {
//             for (let i = 0; i < airDryers.length; i++) {
//                 airDryers[i].style.visibility = 'visible';
//             }
//         }
//     } else {
//         for (let i = 0; i < medias.length; i++) {
//             medias[i].style.visibility = 'visible';
//         }
//     }
// });


// var feed = document.getElementById('feed-check');

// feed.addEventListener('change', e => {
//     if (e.target.checked == true) {
//         for (let i = 0; i < medias.length; i++) {
//             medias[i].style.visibility = 'hidden';
//         }
//         if (feedings.length > 0) {
//             for (let i = 0; i < feedings.length; i++) {
//                 feedings[i].style.visibility = 'visible';
//             }
//         }
//     } else {
//         for (let i = 0; i < medias.length; i++) {
//             medias[i].style.visibility = 'visible';
//         }
//     }
// });

// var diaper = document.getElementById('diaper-check');

// diaper.addEventListener('change', e => {
//     if (e.target.checked == true) {
//         for (let i = 0; i < medias.length; i++) {
//             medias[i].style.visibility = 'hidden';
//         }
//         if (diapers.length > 0) {
//             for (let i = 0; i < diapers.length; i++) {
//                 diapers[i].style.visibility = 'visible';
//             }
//         }
//     } else {
//         for (let i = 0; i < medias.length; i++) {
//             medias[i].style.visibility = 'visible';
//         }
//     }
// });