jQuery(document).ready(function($) {
    //   $('#getDateButton').on('click', function() {
    //     ajax_photos;

    //   })
});

jQuery(document).ready(function($) {
    $('#getDateButton').on('click', function() {
        ajax_photos();

      });

      $('#categorie').on('change', function() {
        ajax_photos(true);

      });

      $('#format').on('change', function() {
        ajax_photos(true);

      });

      $('#annee').on('change', function() {
        ajax_photos(true);

      });


function ajax_photos(source = null) {
const elements = document.querySelectorAll('[data-photo-id]');
        const category = document.getElementById('categorie').value;
        console.log(category);
        const format = document.getElementById('format').value;
        const year = document.getElementById('annee').value;


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
                photoArray: photoIds,
                category: category,
                year: year,
                format: format
            },
            success: function(response) {
                if(source == null) {
                    $('#dateDisplay').append(response);
                } else {
                    $('#dateDisplay').html(response);
                    console.log('Filtre')
                }
                
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
}
});