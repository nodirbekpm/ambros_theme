<?php
/**
 * Custom Post Types: Team & Company
 */

add_action('init', function () {
// TEAM
    register_post_type('team', [
        'labels' => [
            'name'               => __('Team', 'ambros'),
            'singular_name'      => __('Team Member', 'ambros'),
            'menu_name'          => __('Team', 'ambros'),
            'add_new'            => __('Add New', 'ambros'),
            'add_new_item'       => __('Add New Member', 'ambros'),
            'edit_item'          => __('Edit Member', 'ambros'),
            'new_item'           => __('New Member', 'ambros'),
            'view_item'          => __('View Member', 'ambros'),
            'search_items'       => __('Search Team Members', 'ambros'),
            'not_found'          => __('Not found', 'ambros'),
            'not_found_in_trash' => __('Not found in Trash', 'ambros'),
        ],
        'public'            => true,
        'show_in_rest'      => true,
        'has_archive'       => true,
        'rewrite'           => ['slug' => 'team', 'with_front' => false],
        'menu_icon'         => 'dashicons-groups',
        'menu_position'     => 6,
        'supports'          => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
        'capability_type'   => 'post',
        'map_meta_cap'      => true,
    ]);

// COMPANY
    register_post_type('company', [
        'labels' => [
            'name'               => __('Companies', 'ambros'),
            'singular_name'      => __('Company', 'ambros'),
            'menu_name'          => __('Companies', 'ambros'),
            'add_new'            => __('Add New', 'ambros'),
            'add_new_item'       => __('Add New Company', 'ambros'),
            'edit_item'          => __('Edit Company', 'ambros'),
            'new_item'           => __('New Company', 'ambros'),
            'view_item'          => __('View Company', 'ambros'),
            'search_items'       => __('Search Companies', 'ambros'),
            'not_found'          => __('Not found', 'ambros'),
            'not_found_in_trash' => __('Not found in Trash', 'ambros'),
        ],
        'public'            => true,
        'show_in_rest'      => true,
        'has_archive'       => true,
        'rewrite'           => ['slug' => 'company', 'with_front' => false],
        'menu_icon'         => 'dashicons-building',
        'menu_position'     => 7,
        'supports'          => ['title', 'editor', 'thumbnail', 'excerpt', 'revisions'],
        'capability_type'   => 'post',
        'map_meta_cap'      => true,
    ]);

}, 0);

add_action('after_switch_theme', function () {
    flush_rewrite_rules();
});

/**
 * Admin ro'yxatida Title’dan oldin Featured Image ustuni
 * - team va company CPT’lariga qo'llanadi
 */
function my_cpt_add_thumb_column($columns) {
    $new = [];
    $thumb_col = ['featured_thumb' => __('Image', 'ambros')];

    foreach ($columns as $key => $label) {
        if ($key === 'title') {
            $new = array_merge($new, $thumb_col);
        }
        $new[$key] = $label;
    }
    return $new;
}

function my_cpt_render_thumb_column($column, $post_id) {
    if ($column === 'featured_thumb') {
        if (has_post_thumbnail($post_id)) {
            $pt = get_post_type($post_id);

            if ($pt === 'company') {
                echo get_the_post_thumbnail(
                    $post_id,
                    [100, 50],
                    ['style' => 'width:100px;height:50px;object-fit:contain;border-radius:6px;display:block;']
                );
            } elseif ($pt === 'team') {
                // 373x260, cover
                echo get_the_post_thumbnail(
                    $post_id,
                    [100, 70],
                    ['style' => 'width:100px;height:70px;object-fit:cover;border-radius:6px;display:block;']
                );
            } else {
                // Fallback (boshqa post turlari uchun)
                echo get_the_post_thumbnail(
                    $post_id,
                    [60, 60],
                    ['style' => 'width:60px;height:60px;object-fit:cover;border-radius:6px;display:block;']
                );
            }
        } else {
            echo '—';
        }
    }
}

foreach (['team', 'company'] as $pt) {
    add_filter("manage_{$pt}_posts_columns", 'my_cpt_add_thumb_column', 5);
    add_action("manage_{$pt}_posts_custom_column", 'my_cpt_render_thumb_column', 10, 2);
}

add_action('admin_head', function () {
    echo '<style>
        .column-featured_thumb img { display:block; margin:0 auto; }

        body.post-type-company .column-featured_thumb { width: 120px; }

        body.post-type-team .column-featured_thumb { width: 120px; }
    </style>';
});
