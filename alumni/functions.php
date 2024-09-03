<?php
add_action('after_setup_theme', 'mdc_setup');

function mdc_setup(){
add_theme_support('post-thumbnails');
add_theme_support('menus');
add_theme_support('title-tag');
register_nav_menus(array(
    'menu'=>'menu principale'
));

}

function enqueue_custom_scripts() {
    // Enqueue Swiper CSS
    wp_enqueue_style(
        'swiper-css',
        get_template_directory_uri() . '/assets/css/swiper-bundle.min.css',
        array(),
        null
    );

    // Enqueue Swiper JS
    wp_enqueue_script(
        'swiper-script',
        get_template_directory_uri() . '/assets/js/swiper-bundle.min.js',
        array(),
        null,
        true 
    );

    // Enqueue custom JS
    wp_enqueue_script(
        'j-script',
        get_template_directory_uri() . '/script.js',
        array('swiper-script'), // Dependencies (Swiper JS should be loaded before this)
        null,
        true // Load in footer
    );
}

// Hook the function to wp_enqueue_scripts
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


// cacher la barre d'admin
// add_filter('show_admin_bar', '__return_false');


// function create_service_post_type() {
//     register_post_type('service',
//         array(
//             'labels' => array(
//                 'name' => __('Services'),
//                 'singular_name' => __('Service')
//             ),
//             'public' => true,
//             'has_archive' => true,
//             'supports' => array('icon', 'title', 'content'),
//             'menu_position' => 5,
//             'menu_icon' => 'dashicons-admin-tools',
//         )
//     );
// }
// add_action('init', 'create_service_post_type');

function create_service_post_type() {
    register_post_type('service',
        array(
            'labels' => array(
                'name' => __('Services'),
                'singular_name' => __('Service')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'), // Title, content (description), and featured image (icon)
            'menu_position' => 5,
            'menu_icon' => 'dashicons-admin-tools',
            'rewrite' => array('slug' => 'services'), // Optional: Customize the URL slug
        )
    );
}
add_action('init', 'create_service_post_type');


// Register Custom Post Type for Actualités
function create_actualites_post_type() {
    register_post_type('actualites',
        array(
            'labels' => array(
                'name' => __('Actualités'),
                'singular_name' => __('Actualité'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'rewrite' => array('slug' => 'actualites'),
        )
    );
}
add_action('init', 'create_actualites_post_type');

// Register Custom Taxonomy for Categories
function create_actualites_taxonomies() {
    register_taxonomy(
        'actualites_category',
        'actualites',
        array(
            'label' => __('Categories'),
            'rewrite' => array('slug' => 'actualites-category'),
            'hierarchical' => true,
        )
    );
}
add_action('init', 'create_actualites_taxonomies');

// ###################################
// offre emploi
function create_offers_post_type() {
    register_post_type('offers',
        array(
            'labels' => array(
                'name' => __('Offers'),
                'singular_name' => __('Offers')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-admin-tools',
            'rewrite' => array('slug' => 'offers'),
        )
    );
}
add_action('init', 'create_offers_post_type');

register_taxonomy(
    'offer_type',
    'offers',
    array(
        'labels' => array(
            'name' => __('Offer Types'),
            'singular_name' => __('Offer Type'),
        ),
        'hierarchical' => true,
        'public' => true,
        'rewrite' => array('slug' => 'offer-type'),
    )
);

add_action('init', 'create_offers_post_type');

// ###################################
// leaders
function create_leaders_post_type() {
    register_post_type('leaders',
        array(
            'labels' => array(
                'name' => __('Leaders'),
                'singular_name' => __('Leaders')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-admin-tools',
            'rewrite' => array('slug' => 'leaders'),
        )
    );
}

register_taxonomy(
    'leaders_type',
    'leaders',
    array(
        'labels' => array(
            'name' => __('Leaders Types'),
            'singular_name' => __('Leaders Type'),
        ),
        'hierarchical' => true,
        'public' => true,
        'rewrite' => array('slug' => 'leaders-type'),
    )
);

add_action('init', 'create_leaders_post_type');

// ###################################
// Temoignages
function create_temoignages_post_type() {
    register_post_type('temoignages',
        array(
            'labels' => array(
                'name' => __('Temoignages'),
                'singular_name' => __('Temoignages')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-admin-tools',
            'rewrite' => array('slug' => 'temoignages'),
        )
    );
}

register_taxonomy(
    'temoignages_type',
    'temoignages',
    array(
        'labels' => array(
            'name' => __('Temoignages Types'),
            'singular_name' => __('Temoignages Type'),
        ),
        'hierarchical' => true,
        'public' => true,
        'rewrite' => array('slug' => 'temoignages-type'),
    )
);

add_action('init', 'create_temoignages_post_type');

// ###################################
// Mediatheque
function create_mediatheque_post_type() {
    register_post_type('mediatheque',
        array(
            'labels' => array(
                'name' => __('Mediatheque'),
                'singular_name' => __('Mediatheque')
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'), // Add 'excerpt' if you want to provide a description for videos
            'menu_position' => 5,
            'menu_icon' => 'dashicons-admin-tools',
            'rewrite' => array('slug' => 'mediatheque'),
        )
    );
}
add_action('init', 'create_mediatheque_post_type');

function add_mediatheque_video_url_meta_box() {
    add_meta_box(
        'mediatheque_video_url',
        __('Video URL'),
        'mediatheque_video_url_meta_box_callback',
        'mediatheque',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_mediatheque_video_url_meta_box');

function mediatheque_video_url_meta_box_callback($post) {
    $value = get_post_meta($post->ID, '_video_url', true);
    echo '<label for="video_url">Video URL: </label>';
    echo '<input type="text" id="video_url" name="video_url" value="' . esc_attr($value) . '" size="30" />';
}

function save_mediatheque_video_url_meta_box_data($post_id) {
    if (array_key_exists('video_url', $_POST)) {
        update_post_meta($post_id, '_video_url', sanitize_text_field($_POST['video_url']));
    }
}
add_action('save_post', 'save_mediatheque_video_url_meta_box_data');

// Add custom columns to the admin screen
function add_mediatheque_columns($columns) {
    $columns['video_url'] = __('Video URL');
    return $columns;
}
add_filter('manage_mediatheque_posts_columns', 'add_mediatheque_columns');

// Populate custom columns with data
function display_mediatheque_columns($column, $post_id) {
    switch ($column) {
        case 'video_url':
            $video_url = get_post_meta($post_id, '_video_url', true);
            echo $video_url ? '<a href="' . esc_url($video_url) . '" target="_blank">' . esc_html($video_url) . '</a>' : __('No URL');
            break;
    }
}
add_action('manage_mediatheque_posts_custom_column', 'display_mediatheque_columns', 10, 2);


// Function to track post views
function track_post_views($post_id) {
    if (!is_single()) return; // Only count views on single post pages

    // Check if the post is already viewed in this session
    $viewed_posts = (array) maybe_unserialize($_COOKIE['viewed_posts']);
    if (in_array($post_id, $viewed_posts)) return;

    // Increment post view count
    $views = get_post_meta($post_id, '_post_views_count', true);
    $views = $views ? intval($views) : 0;
    $views++;
    update_post_meta($post_id, '_post_views_count', $views);

    // Store post ID in a cookie to prevent multiple counts in one session
    $viewed_posts[] = $post_id;
    setcookie('viewed_posts', maybe_serialize($viewed_posts), time() + 3600, COOKIEPATH, COOKIE_DOMAIN);
}
add_action('wp_head', function() {
    if (is_singular('mediatheque')) {
        track_post_views(get_the_ID());
    }
});

// Add custom column for views
function add_mediatheque_views_column($columns) {
    $columns['views'] = __('Views');
    return $columns;
}
add_filter('manage_mediatheque_posts_columns', 'add_mediatheque_views_column');

// Populate the custom column with the view count
function display_mediatheque_views_column($column, $post_id) {
    if ($column === 'views') {
        $views = get_post_meta($post_id, '_post_views_count', true);
        echo $views ? $views : '0';
    }
}
add_action('manage_mediatheque_posts_custom_column', 'display_mediatheque_views_column', 10, 2);





?>