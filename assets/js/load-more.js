jQuery(document).ready(function($) {
    let page = 0;

    $('#getDateButton').on('click', function() {
        const elements = document.querySelectorAll('[data-photo-id]');

    // Créer un tableau pour stocker les valeurs des attributs data-photo-id
    const photoIds = [];

    // Parcourir chaque élément et extraire la valeur de l'attribut data-photo-id
    elements.forEach((element) => {
        const photoId = element.getAttribute('data-photo-id');
        photoIds.push(photoId);
    });
    console.log(photoIds);

        $.ajax({
            url: MyAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'load_more_photos',
                photoArray: photoIds
            },
            success: function(response) {
                $('#dateDisplay').append(response);
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    });
});
