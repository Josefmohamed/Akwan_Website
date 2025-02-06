<?php

namespace Register_Entities;

class Books extends Entity
{
  public static function init()
  {
    
    register_post_type('books', [
        'label' => __('books', 'akwan_website'),
        'description' => __('Books news and reviews', 'akwan_website'),
        'labels' => array(
            'name' => _x('Book', 'Post Type General Name', 'akwan_website'),
            'singular_name' => _x('Book', 'Post Type Singular Name', 'akwan_website'),
            'menu_name' => __('Books', 'akwan_website'),
            'parent_item_colon' => __('Parent Book', 'akwan_website'),
            'all_items' => __('All Books', 'akwan_website'),
            'view_item' => __('View Book', 'akwan_website'),
            'add_new_item' => __('Add New Book', 'akwan_website'),
            'add_new' => __('Add New', 'akwan_website'),
            'edit_item' => __('Edit Book', 'akwan_website'),
            'update_item' => __('Update Book', 'akwan_website'),
            'search_items' => __('Search Book', 'akwan_website'),
            'not_found' => __('Not Found', 'akwan_website'),
            'not_found_in_trash' => __('Not found in Trash', 'akwan_website'),
        ),
        'supports' => array(
            'title',
            'custom-fields',
            'thumbnail'
        ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'menu_icon' => 'dashicons-book',
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


