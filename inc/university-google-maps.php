<?php

function university_map_key($api) {
  $api['key'] = GM_KEY;

  return $api;
}

add_filter('acf/fields/google_map/api', 'university_map_key');
