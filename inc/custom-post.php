<?php 


/*------------------------------------*\
    Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for, called akaZsu
function custom_post_type_akaZsu()
{
    register_taxonomy_for_object_type('category', 'Category'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'Tag');
    register_post_type('exhibition', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Gallery', 'Gallery'), // Rename these to suit
            'singular_name' => __('Gallery', 'Gallery'),
            'add_new' => __('Add New', 'Gallery'),
            'add_new_item' => __('Add New Gallery', 'akaZsu'),
            'edit' => __('Edit', 'Gallery'),
            'edit_item' => __('Edit Gallery', 'Gallery'),
            'new_item' => __('New Gallery', 'Gallery'),
            'view' => __('View Gallery Image', 'Gallery'),
            'view_item' => __('View gallery Image', 'Gallery'),
            'search_items' => __('Search Gallery Image', 'Gallery'),
            'not_found' => __('Gallery could not be found', 'Gallery'),
            'not_found_in_trash' => __('Gallery dosent exist', 'Gallery')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom akaZsu Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

add_action('init', 'custom_post_type_akaZsu'); // Add our akaZsu Blank Custom Post Type

?>