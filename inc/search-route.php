<?php

add_action('rest_api_init', 'universityRegisterSearch');

function universityRegisterSearch() {
  register_rest_route('university/v1', 'search', [
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'universitySearch',
  ]);
}

function universitySearch($data) {
  $postsTypes = ['post', 'page', 'program', 'professor', 'campus', 'event'];
  $allResults = [];

  foreach ($postsTypes as $postType) {
    $post = new WP_Query([
      'posts_per_page' => -1,
      'post_type' => $postType,
      'orderby' => 'title',
      'order' => 'asc',
      's' => sanitize_text_field($data['term']),
    ]);

    $postTypeResult = [];

    while ($post->have_posts()) {
      $post->the_post();

      $postTypeResult[] = [
        'title' => get_the_title(),
        'description' => get_the_content(),
        'url' => get_the_permalink(),
        'id' => get_the_ID(),
        'author' => get_author_name(),
        'postType' => get_post_type(),
        // 'image' => get_the_post_thumbnail_url('professor-portrait'),
      ];
    }

    $allResults[$postType . 's'] = $postTypeResult;
  }

  return $allResults;
}
