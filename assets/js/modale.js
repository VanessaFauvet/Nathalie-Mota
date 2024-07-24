// Apparition et disparition de la modale de contact
addEventListener("DOMContentLoaded", (event) => {
    const contactBtn = document.getElementById('menu-item-116');
    const refBtn = document.getElementById('ref-btn');

    if (refBtn !== null) {
        const refValue = refBtn.dataset.ref
        refBtn.addEventListener("click", function() {
            popupAppear(refValue)
        });
    }
    
    contactBtn.addEventListener("click", function() {
        popupAppear('')
    });
    const modale = document.getElementById('modale');

    modale.addEventListener("click", function (e) {
        if (e.target == modale) {
            popupAppear()
        }
    });
});

function popupAppear(ref = null) {
    console.log(ref)
    const modale = document.getElementById('modale');

    if (modale.classList.contains('visible')) {
        modale.classList.remove('visible')
    } else {
        if (ref !== null) {
            document.querySelector('input[name = "your-ref"]') . value = ref
        }
        modale.classList.add('visible')
    }
}
