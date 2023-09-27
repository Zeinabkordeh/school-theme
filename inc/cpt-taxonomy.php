<?php

function taze_custom_post_types () {
    $labels = array(
        'name'                  => _x( 'Students', 'post type general name' ),
        'singular_name'         => _x( 'Student', 'post type singular name'),
        'menu_name'             => _x( 'Students', 'admin menu' ),
        'name_admin_bar'        => _x( 'Student', 'add new on admin bar' ),
        'add_new'               => _x( 'Add New', 'student' ),
        'add_new_item'          => __( 'Add New Student' ),
        'new_item'              => __( 'New Student' ),
        'edit_item'             => __( 'Edit Student' ),
        'view_item'             => __( 'View Student' ),
        'all_items'             => __( 'All Students' ),
        'search_items'          => __( 'Search Students' ),
        'parent_item_colon'     => __( 'Parent Students:' ),
        'not_found'             => __( 'No Students found.' ),
        'not_found_in_trash'    => __( 'No Students found in Trash.' ),
        'archives'              => __( 'Students'),
        'insert_into_item'      => __( 'Insert into student'),
        'uploaded_to_this_item' => __( 'Uploaded to this student'),
        'filter_item_list'      => __( 'Filter students list'),
        'items_list_navigation' => __( 'Students list navigation'),
        'items_list'            => __( 'Students list'),
        'featured_image'        => __( 'Student featured image'),
        'set_featured_image'    => __( 'Set Student featured image'),
        'remove_featured_image' => __( 'Remove Student featured image'),
        'use_featured_image'    => __( 'Use as featured image'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'students' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array( 'title', 'thumbnail', 'editor'),
    );

    register_post_type( 'taze-student', $args );
}
add_action('init', 'taze_custom_post_types');

function taze_register_taxonomies() {
    $labels = array(
        'name'                  => _x( 'Students Catagories', 'post type general name' ),
        'singular_name'         => _x( 'Student Category', 'post type singular name'),
        'add_new_item'          => __( 'Add New Student Category' ),
        'new_item'              => __( 'New Student Category' ),
        'edit_item'             => __( 'Edit Student Category' ),
        'view_item'             => __( 'View Student Categories' ),
        'all_items'             => __( 'All Student Categories' ),
        'search_items'          => __( 'Search Student Categories' ),
        'parent_item_colon'     => __( 'Parent Student Category:' ),
        'menu_name'             => __('Student Category'),
        'new_item_name'         =>__('New Student Category Name'),
        'update item'           =>__('Update Student Category'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menu'  => true,
        'show_admin_column'    =>true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'taze-student-categories' ),
        'hierarchical'       => true,
    );

    register_taxonomy( 'taze-student-category', array('taze-student'), $args );
}
add_action('init', 'taze_register_taxonomies');