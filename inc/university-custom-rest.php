<?php

add_action('rest_api_init', function () {
  register_rest_field('post', 'authorName', [
    'get_callback' => 'get_the_author',
  ]);
});
