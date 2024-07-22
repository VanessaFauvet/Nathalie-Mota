<?php
// Affichage des taxonomies
$taxonomy = [
    'categorie' => 'CATÉGORIES',
    'format'    => 'FORMATS',
    'annee'    => 'TRIER PAR',
];

foreach ($taxonomy as $taxonomy_slug => $label) {
    $terms = get_terms($taxonomy_slug);

    if (!is_wp_error($terms) && !empty($terms)) {
        echo "<select id='{$taxonomy_slug}' class='custom-select taxonomy-select'>";
        echo "<option value=''>{$label}</option>";

        foreach ($terms as $term) {
            echo "<option value='{$term->slug}'>{$term->name}</option>";
        }

        echo "</select>";
    }
}
?>