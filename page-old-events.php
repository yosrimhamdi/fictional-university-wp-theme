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
        $eventDate = new DateTime(get_field('event_date'));
    ?>
        <div class="event-summary">
          <a class="event-summary__date t-center" href="<?php the_permalink() ?>">
            <span class="event-summary__month"><?php echo $eventDate->format('M') ?></span>
            <span class="event-summary__day"><?php echo $eventDate->format('d') ?></span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny">
              <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
            </h5>
            <p><?php echo wp_trim_words(get_the_content(), 18) ?>. <a href="<?php the_permalink() ?>" class="nu gray">Learn more</a></p>
          </div>
        </div>
    <?php
      }

      echo paginate_links([
        'total' => $oldEvents->max_num_pages
      ]);
    ?>
  </div>
</div>
<?php get_footer() ?>