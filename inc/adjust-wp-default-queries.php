<?php

add_action('pre_get_posts', 'adjust_query');

function adjust_query($query) {
  if (is_admin() || !$query->is_main_query()) {
    return;
  }

  switch (true) {
    case is_post_type_archive('event'):
      $query->set('meta_key', 'event_date');
      $query->set('orderby', 'meta_value_num');
      $query->set('order', 'asc');
      $query->set('meta_query', [
        [
          'key' => 'event_date',
          'compare' => '>=',
          'value' => date('Ymd'),
          'type' => 'numeric',
        ],
      ]);

      break;

    case is_post_type_archive('program'):
      $query->set('posts_per_page', -1);
      $query->set('orderby', 'title');
      $query->set('order', 'asc');

      break;

    case is_post_type_archive('campus'):
      $query->set('posts_per_page', -1);

      break;
  }
}
