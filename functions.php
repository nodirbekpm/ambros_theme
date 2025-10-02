<?php
/**
 * Theme Functions
 * Ambros Custom Theme
 */

/**
 * Theme setup
 */
function ambros_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'gallery', 'caption'));

    register_nav_menus(array(
        'header_menu' => 'Header Menu',
        'footer_menu' => 'Footer Menu',
    ));

    add_image_size('post_img', 373, 260, true);
}

add_action('after_setup_theme', 'ambros_theme_setup');


/**
 * HEADER va FOOTER menus
 */
//add_action('after_switch_theme', function () {
//    if (get_theme_mod('ambros_menus_seeded')) return;
//
//    // Header menu
//    $header_menu_name = 'Header Menu';
//    $header_menu = get_term_by('name', $header_menu_name, 'nav_menu');
//    $header_menu_id = $header_menu ? (int)$header_menu->term_id : wp_create_nav_menu($header_menu_name);
//
//    // Footer menu
//    $footer_menu_name = 'Footer Menu';
//    $footer_menu = get_term_by('name', $footer_menu_name, 'nav_menu');
//    $footer_menu_id = $footer_menu ? (int)$footer_menu->term_id : wp_create_nav_menu($footer_menu_name);
//
//    // ——— HEADER ITEMS ———
//    // About Us (dropdown)
//    $about_parent = wp_update_nav_menu_item($header_menu_id, 0, [
//        'menu-item-title'  => 'About Us',
//        'menu-item-url'    => '#',
//        'menu-item-status' => 'publish',
//    ]);
//    foreach ([
//                 ['Overview', '#'],
//                 ['Leadership', '#'],
//                 ['Board of Directors', '#'],
//                 ['Investors', '#'],
//             ] as [$title, $url]) {
//        wp_update_nav_menu_item($header_menu_id, 0, [
//            'menu-item-title'      => $title,
//            'menu-item-url'        => $url,
//            'menu-item-status'     => 'publish',
//            'menu-item-parent-id'  => $about_parent,
//        ]);
//    }
//
//    // Science (dropdown)
//    $science_parent = wp_update_nav_menu_item($header_menu_id, 0, [
//        'menu-item-title'  => 'Science',
//        'menu-item-url'    => '#',
//        'menu-item-status' => 'publish',
//    ]);
//    foreach ([
//                 ['Overview', '#'],
//                 ['Pipeline', '#pipeline'],
//                 ['Neridronate', '#'],
//                 ['Publications & Posters', '#'],
//             ] as [$title, $url]) {
//        wp_update_nav_menu_item($header_menu_id, 0, [
//            'menu-item-title'      => $title,
//            'menu-item-url'        => $url,
//            'menu-item-status'     => 'publish',
//            'menu-item-parent-id'  => $science_parent,
//        ]);
//    }
//
//    // Oddiy top-levellar
//    foreach ([
//                 ['Team', '#'],
//                 ['About us', '#'],
//                 ['Contact', '#contact'],
//             ] as [$title, $url]) {
//        wp_update_nav_menu_item($header_menu_id, 0, [
//            'menu-item-title'  => $title,
//            'menu-item-url'    => $url,
//            'menu-item-status' => 'publish',
//        ]);
//    }
//
//    // ——— FOOTER ITEMS ———
//    foreach ([
//                 ['Privacy Policy', home_url('/privacy-policy/')],
//                 ['Science', '#'],
//                 ['Team', '#'],
//                 ['About us', '#'],
//                 ['Contact', '#contact'],
//             ] as [$title, $url]) {
//        wp_update_nav_menu_item($footer_menu_id, 0, [
//            'menu-item-title'  => $title,
//            'menu-item-url'    => $url,
//            'menu-item-status' => 'publish',
//        ]);
//    }
//
//    // Menyularni lokatsiyalarga bog'lash
//    $locations = get_theme_mod('nav_menu_locations', []);
//    $locations['header_menu'] = $header_menu_id;
//    $locations['footer_menu'] = $footer_menu_id;
//    set_theme_mod('nav_menu_locations', $locations);
//
//    // Flag — endi qayta-seed bo'lmasin
//    set_theme_mod('ambros_menus_seeded', 1);
//});

// 3) Header uchun Bootstrap 5 dropdownga mos custom walker
class Ambros_BS_Walker extends Walker_Nav_Menu {
    // Child bor-li uchun flag
    public function display_element($el, &$children, $max_depth, $depth, $args, &$output) {
        if (!$el) return;
        $id_field = $this->db_fields['id'];
        $args[0]->has_children = !empty($children[$el->$id_field]);
        parent::display_element($el, $children, $max_depth, $depth, $args, $output);
    }

    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty($item->classes) ? [] : (array) $item->classes;
        $has_children = !empty($args->has_children);

        // <li> classes
        $li_classes = $classes;
        if ($has_children && $depth === 0) $li_classes[] = 'dropdown';
        $li_class = implode(' ', array_filter(array_unique($li_classes)));

        $output .= '<li class="'. esc_attr($li_class) .'">';

        $title = esc_html($item->title);
        $url   = !empty($item->url) ? $item->url : '#';

        if ($has_children && $depth === 0) {
            // Siz so'raganidek <span class="dropdown-toggle"> bilan
            $output .= '<span class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">'
                .  $title
                .  '</span>';
        } else {
            $link_class = ($depth > 0) ? 'dropdown-item' : '';
            $output .= '<a class="'. esc_attr($link_class) .'" href="'. esc_url($url) .'">'. $title .'</a>';
        }
    }

    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= "</li>\n";
    }
}





/**
 * CPT faylini ulash
 */

require get_template_directory() . '/inc/custom-post-types.php';


/**
 * ACF faylini ulash
 */
//require get_template_directory() . '/inc/acf-fields.php';


/**
 * Contact form 7
 */
add_filter('wpcf7_use_p_tag_in_form', '__return_false');
add_filter('wpcf7_use_br_tag_in_form', '__return_false');
add_filter('wpcf7_autop_or_not', '__return_false');

add_filter('wpcf7_form_elements', function ($html) {
    return preg_replace('/<span class="wpcf7-form-control-wrap[^"]*?">(.*?)<\/span>/s', '$1', $html);
});


add_filter('wpcf7_form_tag_class', function ($class, $tag) {
    $user_classes = method_exists($tag, 'get_class_option') ? $tag->get_class_option() : [];
    $user_classes = is_array($user_classes) ? implode(' ', $user_classes) : trim((string)$user_classes);
    return trim($user_classes);
}, 10, 2);

// CF7 yuborilganda Flamingo'ga yozamiz (agar o'zi yozmayotgan bo'lsa)
//add_action('wpcf7_mail_sent', function ($contact_form) {
//    if (!class_exists('Flamingo_Inbound_Message')) return;
//
//    $submission = WPCF7_Submission::get_instance();
//    if (!$submission) return;
//
//    $posted = $submission->get_posted_data();
//
//    // Maydon nomlari:
//    $name = $posted['your-name'] ?? ($posted['name'] ?? '');
//    $email = $posted['your-email'] ?? ($posted['email'] ?? '');
//    $msg = $posted['your-comment'] ?? ($posted['message'] ?? '');
//
//    $subject = sprintf('CF7: %s', $contact_form->title());
//
//    Flamingo_Inbound_Message::add([
//        'channel' => 'contact-form-7',
//        'subject' => $subject,
//        'from' => trim($name . ' ' . $email),
//        'from_email' => $email,
//        'message' => $msg,
//        'fields' => $posted,
//        'meta' => ['form_id' => $contact_form->id()],
//    ]);
//}, 10, 1);

/**
 *  404 sahifani Asosiy sahifaga redirect qilish
 */
add_action('template_redirect', function () {
    if ( is_admin()
        || (defined('REST_REQUEST') && REST_REQUEST)
        || (function_exists('wp_doing_ajax') && wp_doing_ajax())
        || is_feed() || is_trackback() || is_preview() || is_customize_preview()
    ) {
        return;
    }

    if ( is_404() && !is_front_page() && !is_home() ) {
        wp_safe_redirect( home_url('/'), 302 );
        exit;
    }
});


/**
 * Post (faqat default 'post' ro'yxati) uchun Featured Image ustuni
 * CPT (team, company) lar uchun ustun va render custom-post-types.php ichida bor.
 */
add_filter('manage_post_posts_columns', function ($columns) {
    $thumb_col = ['featured_thumb' => __('Image', 'ambros')];

    $new = [];
    foreach ($columns as $key => $label) {
        if ($key === 'title') {
            $new = array_merge($new, $thumb_col);
        }
        $new[$key] = $label;
    }
    return $new;
}, 5);

add_action('manage_post_posts_custom_column', function ($column, $post_id) {
    if ($column !== 'featured_thumb') {
        return;
    }
    if (has_post_thumbnail($post_id)) {
        echo get_the_post_thumbnail(
            $post_id,
            [60, 60],
            ['style' => 'width:60px;height:60px;object-fit:cover;border-radius:6px;display:block;']
        );
    } else {
        echo '—';
    }
}, 10, 2);

add_action('admin_head', function () {
    $screen = function_exists('get_current_screen') ? get_current_screen() : null;
    if ($screen && $screen->post_type === 'post') {
        echo '<style>
            .column-featured_thumb { width: 70px; }
            .column-featured_thumb img { display:block; margin:0 auto; }
        </style>';
    }
});


// duplicate
add_filter('post_row_actions', function ($actions, $post) {
    if (!current_user_can('edit_post', $post->ID)) {
        return $actions;
    }

    $nonce = wp_create_nonce('duplicate-post_' . $post->ID);
    $url   = add_query_arg([
        'action'   => 'duplicate_post',
        'post'     => $post->ID,
        '_wpnonce' => $nonce,
    ], admin_url('admin.php'));

    $dup_link = sprintf(
        '<a href="%s" title="%s">%s</a>',
        esc_url($url),
        esc_attr__('Duplicate this post', 'ambros'),
        esc_html__('Duplicate', 'ambros')
    );

    $new_actions = [];
    foreach ($actions as $key => $html) {
        $new_actions[$key] = $html;
        if ($key === 'inline hide-if-no-js') {
            $new_actions['duplicate'] = $dup_link;
        }
    }

    if (!isset($new_actions['duplicate'])) {
        $new_actions['duplicate'] = $dup_link;
    }

    return $new_actions;
}, 10, 2);

add_action('admin_action_duplicate_post', function () {
    if (!isset($_GET['post'], $_GET['_wpnonce'])) {
        wp_die(__('Invalid request.', 'ambros'));
    }

    $post_id = absint($_GET['post']);
    if (!wp_verify_nonce(sanitize_text_field($_GET['_wpnonce']), 'duplicate-post_' . $post_id)) {
        wp_die(__('Security check failed.', 'ambros'));
    }

    $post = get_post($post_id);
    if (!$post) {
        wp_die(__('Original post not found.', 'ambros'));
    }

    if (!current_user_can('edit_post', $post_id)) {
        wp_die(__('You are not allowed to duplicate this item.', 'ambros'));
    }

    $new_post_args = [
        'post_type'      => $post->post_type,
        'post_title'     => $post->post_title . ' (Copy)',
        'post_content'   => $post->post_content,
        'post_excerpt'   => $post->post_excerpt,
        'post_status'    => 'draft',
        'post_author'    => get_current_user_id(),
        'post_parent'    => $post->post_parent,
        'menu_order'     => $post->menu_order,
        'comment_status' => $post->comment_status,
        'ping_status'    => $post->ping_status,
        'post_password'  => $post->post_password,
    ];

    $new_post_id = wp_insert_post($new_post_args, true);
    if (is_wp_error($new_post_id)) {
        wp_die($new_post_id->get_error_message());
    }

    $taxes = get_object_taxonomies($post->post_type);
    foreach ($taxes as $tax) {
        $terms = wp_get_object_terms($post_id, $tax, ['fields' => 'ids']);
        if (!is_wp_error($terms)) {
            wp_set_object_terms($new_post_id, $terms, $tax, false);
        }
    }

    $meta = get_post_meta($post_id);
    if (!empty($meta)) {
        $skip_keys = ['_edit_lock', '_edit_last'];
        foreach ($meta as $key => $values) {
            if (in_array($key, $skip_keys, true)) {
                continue;
            }
            foreach ($values as $value) {
                add_post_meta($new_post_id, $key, maybe_unserialize($value));
            }
        }
    }

    wp_safe_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
    exit;
});


/**
 *  ACF OPTION PAGE
 */
if ( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'  => 'Site Settings',
        'menu_title'  => 'Site Settings',
        'menu_slug'   => 'site-settings',
        'capability'  => 'edit_posts',
        'redirect'    => false,
        'position'    => 2,
        'icon_url'    => 'dashicons-admin-generic',
    ));

}