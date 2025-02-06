<?php

namespace Register_Entities;

class Articles extends Entity
{
    public static function init()
    {
        register_post_type('articles', [
            'label' => __('articles', 'akwan_website'),
            'description' => __('Articles news and reviews', 'akwan_website'),
            'labels' => array(
                'name' => _x('Article', 'Post Type General Name', 'akwan_website'),
                'singular_name' => _x('Article', 'Post Type Singular Name', 'akwan_website'),
                'menu_name' => __('Articles', 'akwan_website'),
                'parent_item_colon' => __('Parent Article', 'akwan_website'),
                'all_items' => __('All Articles', 'akwan_website'),
                'view_item' => __('View Article', 'akwan_website'),
                'add_new_item' => __('Add New Article', 'akwan_website'),
                'add_new' => __('Add New', 'akwan_website'),
                'edit_item' => __('Edit Article', 'akwan_website'),
                'update_item' => __('Update Article', 'akwan_website'),
                'search_items' => __('Search Article', 'akwan_website'),
                'not_found' => __('Not Found', 'akwan_website'),
                'not_found_in_trash' => __('Not found in Trash', 'akwan_website'),
            ),
            'supports' => array(
                'title',
                'custom-fields',
                'thumbnail'
            ),
            'taxonomies'          => array( 'post_tag' ),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'menu_icon' => 'dashicons-groups',
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => 'post',
            'show_in_rest' => true,
        ]);



    }
}


