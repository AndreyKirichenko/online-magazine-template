<?php

function parse_gallery_shortcode($atts) {
    global $post;

    if ( ! empty( $atts['ids'] ) ) {
        // 'ids' is explicitly ordered, unless you specify otherwise.
        if ( empty( $atts['orderby'] ) )
            $atts['orderby'] = 'post__in';
        $atts['include'] = $atts['ids'];
    }

    extract(shortcode_atts(array(
        'orderby' => 'menu_order ASC, ID ASC',
        'include' => '',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 3,
        'size' => 'medium',
        'link' => 'file'
    ), $atts));


    $args = array(
        'post_type' => 'attachment',
        'post_status' => 'inherit',
        'post_mime_type' => 'image',
        'orderby' => $orderby
    );

    if ( !empty($include) )
        $args['include'] = $include;
    else {
        $args['post_parent'] = $id;
        $args['numberposts'] = -1;
    }

    $images = get_posts($args);

    if (sizeof($images) > 0) {
        $result = '<div class="gallery">';
        foreach ($images as $image) {
            // $description = $image->post_content;
            // if($description == '') $description = $image->post_title;
            $img_alt = get_post_meta($image->ID, '_wp_attachment_image_alt', true);

            $img_thumb_data = wp_get_attachment_image_src($image->ID, 'thumbnail');
            $img_full_data = wp_get_attachment_image_src($image->ID, 'full');

            $result .=
                '<a class="gallery__thumbnail-link" href="' . $img_full_data[0] . '" target="_blank">
                    <img src="' . $img_thumb_data[0] . '" alt="' . $img_alt . '" />
                </a>';
        }

        $result .= '</div>';
        echo $result;
    }
}