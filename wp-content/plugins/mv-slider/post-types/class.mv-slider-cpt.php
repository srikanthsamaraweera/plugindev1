<?php

if (!class_exists('MV_Slider_Post_Type')) {
    class MV_Slider_Post_Type
    {
        function __construct()
        {
            add_action('init', array($this, 'create_post_type'));
            add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
            add_action('save_post', [$this, 'save_post'], 10, 2);

            add_filter('manage_mv-slider_posts_columns', [$this, 'mv_slider_cpt_columns']);
            add_action('manage_mv-slider_posts_custom_column', array($this, 'mv_slider_custom_columns'), 10, 2);
            add_filter('manage_edit-mv-slider_sortable_columns', array($this, 'mv_slider_sortable_columns'));

        }

        public function mv_slider_cpt_columns($columns)
        {
            $columns['mv_slider_link_text'] = esc_html__('Link Text', 'mv-slider');
            $columns['mv_slider_link_url'] = esc_html__('Link URL', 'mv-slider');
            return $columns;
        }

        public function mv_slider_custom_columns($column, $post_id)
        {
            switch ($column) {
                case 'mv_slider_link_text':
                    echo esc_html(get_post_meta($post_id, 'mv_slider_link_text', true));
                    break;
                case 'mv_slider_link_url':
                    echo esc_url(get_post_meta($post_id, 'mv_slider_link_url', true));
                    break;
            }
        }

        public function mv_slider_sortable_columns($columns)
        {
            $columns['mv_slider_link_text'] = 'mv_slider_link_text';
            $columns['mv_slider_link_url'] = 'mv_slider_link_url';
            return $columns;
        }



        public function create_post_type()
        {
            register_post_type(
                'mv-slider',
                array(
                    'label' => 'Slider',
                    'description' => 'Sliders',
                    'labels' => array(
                        'name' => 'Sliders',
                        'singular_name' => 'Slider'
                    ),
                    'public' => true,
                    'supports' => array('title', 'editor', 'thumbnail'),
                    'hierarchical' => false,
                    'show_ui' => true,
                    'show_in_menu' => false,
                    'menu_position' => 5,
                    'show_in_admin_bar' => true,
                    'show_in_nav_menus' => true,
                    'can_export' => true,
                    'has_archive' => false,
                    'exclude_from_search' => false,
                    'publicly_queryable' => true,
                    'show_in_rest' => true,
                    'menu_icon' => 'dashicons-images-alt2'
                )
            );
        }

        public function add_meta_boxes()
        {
            add_meta_box(
                'mv_slide_meta',
                'Slider Links',
                [$this, 'add_inner_meta_boxes'],
                'mv-slider',
                'normal',
                'high'
            );
        }

        public function add_inner_meta_boxes($post)
        {
            require_once(MV_SLIDER_PATH . 'views/mv_slider_metabox.php');
        }

        public function save_post($post_id)
        {

            if (isset($_POST['mv_slider_nonce'])) {
                if (!wp_verify_nonce($_POST['mv_slider_nonce'], 'mv_slider_nonce')) {
                    return;
                }
            }

            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
                return;
            }

            if (isset($_POST['post_type']) && $_POST['post_type'] === 'mv-slider') {
                if (!current_user_can('edit_page', $post_id)) {
                    return;
                } elseif (!current_user_can('edit_post', $post_id)) {
                    return;
                }
            }

            if (isset($_POST['action']) && $_POST['action'] == 'editpost') {

                $oldlink_text = get_post_meta($post_id, 'mv_slider_link_text', true);
                $newlink_text = sanitize_text_field($_POST['mv_slider_link_text']);

                $oldlink_url = get_post_meta($post_id, 'mv_slider_link_url', true);
                $newlink_url = sanitize_text_field($_POST['mv_slider_link_url']);

                if ($newlink_text) {
                    update_post_meta($post_id, 'mv_slider_link_text', $newlink_text, '');
                } else {
                    update_post_meta($post_id, 'mv_slider_link_text', 'View', '');
                }
                if ($newlink_url) {
                    update_post_meta($post_id, 'mv_slider_link_url', $newlink_url, '');
                } else {
                    update_post_meta($post_id, 'mv_slider_link_url', '#', '');
                }



            }
        }

    }
}