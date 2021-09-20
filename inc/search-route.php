<?php

add_action('rest_api_init', 'universityRegisterSearch');

function universityRegisterSearch() {
  register_rest_route('university/v1', 'search', [
    'methods' => WP_REST_SERVER::READABLE,
    'callback' => 'universitySearch',
  ]);
}

function universitySearch($data) {
  $postsTypes = ['post', 'page', 'program', 'campus'];
  $results = [];
  $programsIds = [];

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

      $postTypeResult[] = get_formatted_post();

      if ($postType == 'program') {
        $programsIds[] = get_the_ID();
      }
    }

    if ($postType == 'campus') {
      $results['campuses'] = $postTypeResult;
    } else {
      $results[$postType . 's'] = $postTypeResult;
    }
  }

  return array_merge($results, getRelatedProgramPosts($programsIds));
}

function getRelatedProgramPosts($programsIds) {
  $relatedProgramPostTypes = ['professor', 'event'];

  $results = ['professors' => [], 'events' => []];

  foreach ($programsIds as $id) {
    foreach ($relatedProgramPostTypes as $postType) {
      $postTypeResult = [];

      $posts = new WP_Query([
        'post_type' => $postType,
        'meta_query' => [
          [
            'key' => 'related_programs',
            'compare' => 'LIKE',
            'value' => '"' . $id . '"',
          ],
        ],
      ]);

      while ($posts->have_posts()) {
        $posts->the_post();

        if (isNew($results[$postType . 's'], get_formatted_post())) {
          $postTypeResult[] = get_formatted_post();
        }
      }

      $results[$postType . 's'] = array_merge(
        $results[$postType . 's'],
        $postTypeResult
      );
    }
  }

  return $results;
}

function get_formatted_post() {
  return [
    'title' => get_the_title(),
    'date' => get_the_date(),
    'url' => get_the_permalink(),
    'id' => get_the_ID(),
    'authorName' => get_the_author(),
    'postType' => get_post_type(),
    'imageUrl' => get_the_post_thumbnail_url(null, 'professor-landscape'),
    'description' => has_excerpt()
      ? get_the_excerpt()
      : wp_trim_words(get_the_content(), 10),
  ];
}

function isNew($posts, $post) {
  foreach ($posts as $p) {
    if ($p->id == $post->id) {
      return false;
    }
  }

  return true;
}
