// ############################
// js of header buttons
// ############################

// const espaceMembresButton = document.querySelector('.espace-membres');
const devenirMembreButton = document.querySelector('.devenir-membre');

// espaceMembresButton.addEventListener('mouseover', handleMouseOver);
devenirMembreButton.addEventListener('mouseover', handleMouseOver);
function handleMouseOver(e) {
    e.preventDefault();

    devenirMembreButton.classList.add('active-1');
    devenirMembreButton.classList.remove('active-2');

    // if (e.target === espaceMembresButton) {
    //     // espaceMembresButton.classList.add('active-2');
    //     devenirMembreButton.classList.add('active-1');
    // } else if (e.target === devenirMembreButton) {
    //     devenirMembreButton.classList.add('active-2');
    //     // espaceMembresButton.classList.add('active-1');
    // }

}

devenirMembreButton.addEventListener('mouseout', handleMouseOut);
// espaceMembresButton.addEventListener('mouseout', handleMouseOut);
function handleMouseOut(e) {
    e.preventDefault();
    devenirMembreButton.classList.add('active-2');
    devenirMembreButton.classList.remove('active-1');
    // if (e.target === espaceMembresButton) {
    //     // espaceMembresButton.classList.remove('active-2');
    //     devenirMembreButton.classList.remove('active-1');
    // } else if (e.target === devenirMembreButton) {
    //     devenirMembreButton.classList.remove('active-2');
    //     // espaceMembresButton.classList.remove('active-1');
    // }
}

// ############################
// js of swipper "slides"
// ############################

var allActualitesSwiper = new Swiper(".actualites-swiper.toutes-actualites", {
    slidesPerView: 3,
    spaceBetween: 32,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',

    navigation: {
        nextEl: ".swiper-actualites-next.toutes-actualites",
        prevEl: ".swiper-actualites-prev.toutes-actualites",
    },

    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1025: {
            spaceBetween: 20,
        },
        1601: {
            spaceBetween: 32,
        },
    },
});

var diversActualitesSwiper = new Swiper(".actualites-swiper.divers", {
    slidesPerView: 3,
    spaceBetween: 32,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',

    navigation: {
        nextEl: ".swiper-actualites-next.divers",
        prevEl: ".swiper-actualites-prev.divers",
    },

    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1025: {
            spaceBetween: 20,
        },
        1601: {
            spaceBetween: 32,
        },
    },
});

var evenementsActualitesSwiper = new Swiper(".actualites-swiper.evenements", {
    slidesPerView: 3,
    spaceBetween: 32,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',

    navigation: {
        nextEl: ".swiper-actualites-next.evenements",
        prevEl: ".swiper-actualites-prev.evenements",
    },

    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1025: {
            spaceBetween: 20,
        },
        1601: {
            spaceBetween: 32,
        },
    },
});

var mondeActualitesSwiper = new Swiper(".actualites-swiper.monde", {
    slidesPerView: 3,
    spaceBetween: 32,
    loop: true,
    centerSlide: 'true',
    fade: 'true',
    grabCursor: 'true',

    navigation: {
        nextEl: ".swiper-actualites-next.monde",
        prevEl: ".swiper-actualites-prev.monde",
    },

    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1025: {
            spaceBetween: 20,
        },
        1601: {
            spaceBetween: 32,
        },
    },
});


// document.addEventListener('DOMContentLoaded', function () {
//     // Initialize Swipers
//     var swipers = {};
//     document.querySelectorAll('.swiper').forEach(function (swiperElement) {
//         swipers[swiperElement.classList[1]] = new Swiper(swiperElement, {
//             navigation: {
//                 nextEl: '.swiper-actualites-next.' + swiperElement.classList[1],
//                 prevEl: '.swiper-actualites-prev.' + swiperElement.classList[1],
//             },
//         });
//     });

//     // Show category function
//     window.showCategory = function (category) {
//         document.querySelectorAll('.actualites-swiper').forEach(function (swiper) {
//             swiper.style.display = swiper.classList.contains(category) ? 'block' : 'none';
//         });

//         document.querySelectorAll('.category-button').forEach(function (button) {
//             button.classList.remove('selected');
//         });
//         document.querySelector('.category-button[onclick*="' + category + '"]').classList.add('selected');
//     };

//     // Initialize with default view
//     showCategory('toutes-actualites');
// });


function showSlider(category) {
    document.querySelector('.toutes-actualites').style.display = 'none';
    document.querySelector('.divers').style.display = 'none';
    document.querySelector('.evenements').style.display = 'none';
    document.querySelector('.monde').style.display = 'none';

    document.querySelector(`.${category}`).style.display = 'block';
}


window.showAllActualites = function () {
    updateSelectedButton('showAllActualites');
    showSlider('toutes-actualites');
};

window.showDivers = function () {
    updateSelectedButton('showDivers');
    showSlider('divers');
};

window.showEvenements = function () {
    updateSelectedButton('showEvenements');
    showSlider('evenements');
};

window.showMonde = function () {
    updateSelectedButton('showMonde');
    showSlider('monde');
};

function updateSelectedButton(selectedFunction) {
    const buttons = document.querySelectorAll('.category-button');
    buttons.forEach(button => {
        button.classList.remove('selected');
        if (button.getAttribute('onclick').includes(selectedFunction)) {
            button.classList.add('selected');
        }
    });
}

// ################################################
var leadersSwiper = new Swiper(".leaders-swiper", {
    slidesPerView: 3,
    grid: {
        rows: 2,
    },
    grabCursor: 'true',
    spaceBetween: 30,
    navigation: {
        nextEl: ".leaders-swiper-btn.next",
        prevEl: ".leaders-swiper-btn.prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            grid: {
                rows: 2,
            },
        },
        768: {
            spaceBetween: 20,
            slidesPerView: 2,
            grid: {
                rows: 2,
            },
        },
        1025: {
            spaceBetween: 30,
            slidesPerView: 3,
            grid: {
                rows: 2,
            },
        },
    },
});

var temoignagesSwiper = new Swiper(".temoignages-swiper", {
    slidesPerView: 3.8,
    grabCursor: 'true',
    spaceBetween: 40,
    navigation: {
        nextEl: ".temoignages-swiper-btn.next",
        prevEl: ".temoignages-swiper-btn.prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1.2,
        },
        768: {
            slidesPerView: 1.8,
        },
        1025: {
            spaceBetween: 20,
        },
        1601: {
            slidesPerView: 3.8,
            spaceBetween: 40,
        },
    },
});

var offresSwiper = new Swiper(".offres-swiper", {
    slidesPerView: 4,
    grabCursor: 'false',
    allowTouchMove: 'false',
    spaceBetween: 32,
    grid: {
        rows: 2,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            grabCursor: 'true',
            allowTouchMove: 'true',
            spaceBetween: 32,
            grid: {
                rows: 2,
            },
        },
        768: {
            slidesPerView: 2,
            grabCursor: 'true',
            allowTouchMove: 'true',
            spaceBetween: 32,
            grid: {
                rows: 2,
            },
        },
        1025: {
            slidesPerView: 4,
            grabCursor: 'false',
            allowTouchMove: 'false',
            spaceBetween: 20,
            grid: {
                rows: 2,
            },
        },
        1601: {
            slidesPerView: 4,
            grabCursor: 'false',
            allowTouchMove: 'false',
            spaceBetween: 32,
            grid: {
                rows: 2,
            },
        },
    },
});

var mediathequeSwiper = new Swiper(".mediatheque-swiper", {
    slidesPerView: 4,
    grabCursor: 'false',
    allowTouchMove: 'false',
    spaceBetween: 56,
    breakpoints: {
        0: {
            slidesPerView: 1,
            grabCursor: 'true',
            allowTouchMove: 'true',
            spaceBetween: 56,
        },
        768: {
            slidesPerView: 2,
            grabCursor: 'true',
            allowTouchMove: 'true',
            spaceBetween: 56,
        },
        1025: {
            slidesPerView: 4,
            grabCursor: 'false',
            allowTouchMove: 'false',
            spaceBetween: 56,
        },
        1601: {
            slidesPerView: 4,
            grabCursor: 'false',
            allowTouchMove: 'false',
            spaceBetween: 56,
        },
    },
});


// const menu = document.querySelector('nav');
// const menu_items = document.querySelector('nav').childNodes;
// const openMenuBtn = document.querySelector('.open-menu');
// const closeMenuBtn = document.querySelector('.close-menu');
// const header = document.querySelector('header');
// const main = document.querySelector('main');
// const footer = document.querySelector('footer');
// const h = document.querySelector('hr');

// openMenuBtn.addEventListener('click', showMenu);
// closeMenuBtn.addEventListener('click', closeMenu);

// // Close menu when you click on a menu item 
// menu_items.forEach(item => {
//     item.addEventListener('click', function () {
//         closeMenu();
//     })
// })

// function showMenu() {
//     header.style.display = 'none';
//     h.style.display = 'none';    
//     main.style.display = 'none';
//     footer.style.display = 'none';

//     menu.style.top = '0';
// }

// function closeMenu() {
//     menu.style.top = '-100%';

//     header.style.display = 'flex';
//     h.style.display = 'flex';
//     main.style.display = 'flex';
//     footer.style.display = 'flex';
// }


// const espaceMembres = document.querySelector('.mobile-espace-membres');
// const espaceMembres_items = document.querySelectorAll('.mobile-espace-membres a');
// const openEspaceMembresBtn = document.querySelector('.open-espace-membres');
// const closeEspaceMembresBtn = document.querySelector('.close-espace-membres');

// openEspaceMembresBtn.addEventListener('click', showEspaceMembres);
// closeEspaceMembresBtn.addEventListener('click', closeEspaceMembres);

// function showEspaceMembres() {
//     header.style.display = 'none';
//     main.style.display = 'none';
//     footer.style.display = 'none';    

//     espaceMembres.style.display = 'flex';  
// }

// function closeEspaceMembres() {
//     espaceMembres.style.display = 'none';
//     header.style.display = 'flex';
//     main.style.display = 'flex';
//     footer.style.display = 'flex';
// }





// document.getElementById('#btn-burger').addEventListener('click', function() {
//     document.querySelector('.nav-left').classList.toggle('active');
//     document.querySelector('.nav-right').classList.remove('active'); // Optionally hide right nav
// });

// document.getElementById('#btn-person-plus').addEventListener('click', function() {
//     document.querySelector('.nav-right').classList.toggle('active');
//     document.querySelector('.nav-left').classList.remove('active'); // Optionally hide left nav
// });


// const closeEspaceMembresBtn = document.querySelector('.close-espace-membres');
//  closeEspaceMembresBtn.addEventListener('click', closeEspaceMembres);

// function closeEspaceMembres() {
//     espaceMembres.style.display = 'none';
//     header.style.display = 'flex';
//     main.style.display = 'flex';
//     footer.style.display = 'flex';
// }




// espaceMembresButton.addEventListener('mouseover', handleMouseOver);
// devenirMembreButton.addEventListener('mouseover', handleMouseOver);
// function handleMouseOver(e) {
//     e.preventDefault();
//     if (e.target === espaceMembresButton) {
//         espaceMembresButton.classList.add('active-2');
//         devenirMembreButton.classList.add('active-1');
//     } else if (e.target === devenirMembreButton) {
//         devenirMembreButton.classList.add('active-2');
//         espaceMembresButton.classList.add('active-1');
//     }

// }

// ############################
// js of header media screen
// ############################

const left_nav = document.querySelector('.nav-left');
const right_nav = document.querySelector('.nav-right');
const btnBurger = document.querySelector('#btn-burger');
const btnPerso = document.querySelector('#btn-person-plus');

btnBurger.addEventListener('click', () => {
    left_nav.classList.toggle('active')
    right_nav.classList.remove('active')
});

btnPerso.addEventListener('click', () => {
    right_nav.classList.toggle('active')
    left_nav.classList.remove('active')
    // if(right_nav.classList.contains('active')){
    //     closeEspaceMembres().add;
    // }
});