<?php

add_action('after_setup_theme', 'university_features');

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
