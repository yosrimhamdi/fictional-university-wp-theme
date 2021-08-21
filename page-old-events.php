<?php 
  get_header();

  while(have_posts()) {
    the_post();
    the_banner();
  }

  $oldEvents = new WP_Query([
    'paged' => get_query_var('paged', 1),
    'post_type' => 'event',
    'meta_query' => [
      [
        'key' => 'event_date',
        'compare' => '<',
        'value' => date('Ymd'),
        'type' => 'numeric'
      ]
    ]
  ]);
?>
<div class="container container--narrow page-section">
  <div class="generic-content">
    <?php
      while ($oldEvents->have_posts()) {
        $oldEvents->the_post();
       
        get_template_part('templates/event');
      }

      echo paginate_links([
        'total' => $oldEvents->max_num_pages
      ]);
    ?>
  </div>
</div>
<?php get_footer() ?>