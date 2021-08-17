<?php

function load_files() {
  wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('typography', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('main-styles', get_theme_file_uri('/build/index.css'));
  wp_enqueue_style('main-styles-2', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_script('scripts', get_theme_file_uri('/build/index.js'), null, '1.0', true);
}

add_action('wp_enqueue_scripts', 'load_files');

function university_features() {
  // register_nav_menu('headerMenu', 'Header Menu');
  // register_nav_menu('FooterMenuLocationOne', 'Footer Menu Location One');
  // register_nav_menu('FooterMenuLocationTwo', 'Footer Menu Location Two');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');

  add_image_size('professor-landscape', 400, 260, true);
  add_image_size('professor-portrait', 480, 650, true);
  add_image_size('banner-image', 1500, 350, true);
}

add_action('after_setup_theme', 'university_features');

function adjust_query($query) {
  if (is_admin() || !$query->is_main_query()) {
    return;   
  }

  switch (true) {
    case is_post_type_archive('event') : {
      $query->set('meta_key', 'event_date');
      $query->set('orderby', 'meta_value_num');
      $query->set('order', 'asc');
      $query->set('meta_query', [
        [
         'key' => 'event_date',
         'compare' => '>=',
         'value' => date('Ymd'),
         'type' => 'numeric'
        ]
       ]);
      
      break;
    }

    case is_post_type_archive('program') : {
      $query->set('posts_per_page', -1);
      $query->set('orderby', 'title');
      $query->set('order', 'asc');
    }
  }
}

add_action('pre_get_posts', 'adjust_query');
