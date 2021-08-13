<?php 
  get_header();

  $oldEvents = new WP_Query([
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
<div class="page-banner">
    <div 
      class="page-banner__bg-image"
      style="background-image: url(<?php echo get_theme_file_uri('/src/images/ocean.jpg') ?>);">
    </div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title() ?></h1>
      <div class="page-banner__intro">
        <p><?php the_content() ?></p>
      </div>
    </div>  
</div>
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
    ?>
  </div>
</div>
<?php get_footer() ?>