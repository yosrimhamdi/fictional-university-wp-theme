<?php

function load_files() {
  wp_enqueue_style('main-styles', get_stylesheet_uri());
  wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('typography', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_script('scripts', get_theme_file_uri('/assets/js/scripts.js'), null, '1.0', true);
}

add_action('wp_enqueue_scripts', 'load_files');

function university_features() {
  register_nav_menu('HeaderNav', 'Header Nav');
  add_theme_support('title-tag');
}

add_action('after_setup_theme', 'university_features');
