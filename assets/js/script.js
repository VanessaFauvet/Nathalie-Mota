// Apparition et disparition de la modale de contact
addEventListener("DOMContentLoaded", (event) => {
    const contactBtn = document.getElementById('menu-item-82');

    contactBtn.addEventListener("click", popupAppear, false);
    const modale = document.getElementById('modale');

    modale.addEventListener("click", function (e) {
        console.log(e.target)
        if (e.target == modale) {
            popupAppear()
        }
    });
});

function popupAppear() {
    const modale = document.getElementById('modale');

    if (modale.classList.contains('visible')) {
        modale.classList.remove('visible')
    } else {
        modale.classList.add('visible')
    }
}