<?php

namespace Register_Entities;

class Teams extends Entity
{
  public static function init()
  {
    register_post_type('teams', [
        'label' => __('teams', 'akwan_website'),
        'description' => __('Teams news and reviews', 'akwan_website'),
        'labels' => array(
            'name' => _x('Team', 'Post Type General Name', 'akwan_website'),
            'singular_name' => _x('Team', 'Post Type Singular Name', 'akwan_website'),
            'menu_name' => __('Teams', 'akwan_website'),
            'parent_item_colon' => __('Parent Team', 'akwan_website'),
            'all_items' => __('All Teams', 'akwan_website'),
            'view_item' => __('View Team', 'akwan_website'),
            'add_new_item' => __('Add New Team', 'akwan_website'),
            'add_new' => __('Add New', 'akwan_website'),
            'edit_item' => __('Edit Team', 'akwan_website'),
            'update_item' => __('Update Team', 'akwan_website'),
            'search_items' => __('Search Team', 'akwan_website'),
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
  
    register_taxonomy(
        'regions',
        'teams',
        array(
            'labels'       => array(
                'name'          => 'Regions',
                'singular_name' => 'Region',
                'add_new_item'  => 'Add New Region',
                'new_item_name' => "New Category",
            ),
            'public'       => true,
            'hierarchical' => true,
            'show_in_rest' => true,
            'description'  => 'Used to define the team region'
        )
    );
  
    register_taxonomy(
        'groups',
        'teams',
        array(
            'labels'       => array(
                'name'          => 'Groups',
                'singular_name' => 'Group',
                'add_new_item'  => 'Add New Group',
                'new_item_name' => "New Category",
            ),
            'public'       => true,
            'hierarchical' => true,
            'show_in_rest' => true,
            'description'  => 'Used to define the team group'
        )
    );
  
  }
}


