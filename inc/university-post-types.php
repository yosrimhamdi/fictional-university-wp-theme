<?php

function university_post_types() {
  register_post_type('event', [
    'show_in_rest' => true,
    'supports' => ['title', 'editor', 'excerpt'],
    'rewrite' => [
      'slug' => 'events',
    ],
    'has_archive' => true,
    'public' => true,
    'labels' => [
      'name' => 'Events',
      'add_new_item' => 'Add New Event',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Events',
      'singular_name' => 'Event',
    ],
    'menu_icon' => 'dashicons-bell',
  ]);

  register_post_type('program', [
    'menu_icon' => 'dashicons-book-alt',
    'public' => true,
    'labels' => [
      'name' => 'Programs',
      'all_items' => 'All Programs',
      'add_new_item' => 'Add New Program',
    ],
    'show_in_rest' => true,
    'rewrite' => [
      'slug' => 'programs', // for the archive slug /programs
    ],
    'has_archive' => true,
  ]);

  register_post_type('professor', [
    'public' => true,
    'labels' => [
      'name' => 'Professors',
      'all_items' => 'All Professors',
    ],
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-welcome-learn-more',
    'supports' => ['title', 'editor', 'thumbnail'],
  ]);

  register_post_type('campus', [
    'show_in_rest' => true,
    'public' => true,
    'menu_icon' => 'dashicons-location-alt',
    'labels' => [
      'name' => 'Campuses',
      'all_items' => 'All Campuses',
    ],
    'has_archive' => true,
    'rewrite' => ['slug' => 'campuses'],
  ]);
}

add_action('init', 'university_post_types');
