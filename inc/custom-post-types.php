<?php
/**
 * Custom post types for the theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package haenalee
 */
// Register CPTs
function haenalee_register_custom_post_types() {
    // Register 'work' custom post type
    $labels = array(
        'name'               => _x( 'Work', 'post type general name' ),
        'singular_name'      => _x( 'Work', 'post type singular name' ),
        'menu_name'          => _x( 'Work', 'admin menu' ),
        'name_admin_bar'     => _x( 'Work', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'work'  ),
        'add_new_item'       => __( 'Add New Work'  ),
        'new_item'           => __( 'New Work' ),
        'edit_item'          => __( 'Edit Work' ),
        'view_item'          => __( 'View Work' ),
        'all_items'          => __( 'All Work'  ),
        'search_items'       => __( 'Search Work' ),
        'parent_item_colon'  => __( 'Parent Work:' ),
        'not_found'          => __( 'No work found.' ),
        'not_found_in_trash' => __( 'No work found in Trash.' ),
        'insert_into_item'   => __( 'Insert into work'),
        'uploaded_to_this_item' => __( 'Uploaded to this work'),
        );

        $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'work'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-grid-view',
        'supports'           => array( 'title', 'editor', 'thumbnail')
        );

    register_post_type( 'work', $args );

}

// Hook into WP hook and add custom post types.
add_action( 'init', 'haenalee_register_custom_post_types' );