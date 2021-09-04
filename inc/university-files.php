<?php

add_action('wp_enqueue_scripts', 'university_files');

function university_files() {
  wp_enqueue_style(
    'fontawesome',
    'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'
  );
  wp_enqueue_style(
    'typography',
    'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i'
  );
  wp_enqueue_style('main-styles', get_theme_file_uri('/build/index.css'));
  wp_enqueue_style(
    'main-styles-2',
    get_theme_file_uri('/build/style-index.css')
  );
  wp_enqueue_script(
    'google-maps',
    '//maps.googleapis.com/maps/api/js?key=' . GM_KEY,
    null,
    '1.0',
    true
  );
  wp_enqueue_script(
    'scripts',
    get_theme_file_uri('/build/index.js'),
    null,
    '1.0',
    true
  );

  if (is_page('home')) {
    wp_enqueue_script(
      'live-search',
      get_theme_file_uri('/build/search.js'),
      ['wp-element'],
      time(),
      true
    );
  }

  wp_localize_script('live-search', 'UniversityData', [
    'root_url' => get_site_url(),
  ]);
}
