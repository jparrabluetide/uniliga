<?php
/**
 * Obtiene el ID de un post a partir de su slug y tipo de contenido.
 *
 * @param string $slug El slug del contenido que se busca.
 * @param string $post_type El tipo de contenido (ej. 'page', 'post', 'bluetide_template').
 * @return int|null El ID del post si se encuentra, o null si no existe.
 */
function get_id_by_slug($slug, $post_type) {
    // Usamos la función de WordPress para obtener el objeto del post.
    $post_object = get_page_by_path($slug, OBJECT, $post_type);

    // Verificamos si la función encontró un objeto válido.
    if ($post_object) {
        // Si lo encontró, devolvemos su propiedad ID.
        return $post_object->ID;
    }

    // Si no se encontró nada, devolvemos null.
    return null;
}
