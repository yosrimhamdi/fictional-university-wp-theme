<?php get_header() ?>
<?php
  while(have_posts()) {
    the_post();
  ?>
    <div class="page-banner">
      <div 
        class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('/src/images/ocean.jpg') ?>);">
      </div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title() ?></h1>
        <div class="page-banner__intro">
          <p>what shall I put in here</p>
        </div>
      </div>  
    </div>
    <div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program') ?>">
            <i class="fa fa-home" aria-hidden="true"></i> 
            All Programs
          </a> 
          <span class="metabox__main">Posted by <?php the_author_posts_link(); ?> on <?php the_time("n.j.y") ?> in <?php echo get_the_category_list(", ") ?></span>
        </p>
      </div>
      <div class="generic-content">
      <?php echo the_content(); ?>
      <?php
        $eventTitle = get_the_title();

        $events = new WP_Query([
          'post_type' => 'event',
          'posts_per_page' => 2,
          // ordring here
          'meta_key' => 'event_date',
          'orderby' => 'meta_value_num',
          'order' => 'asc',
          // filtering here
          'meta_query' => [
            [
              'key' => 'event_date',
              'compare' => '>=',
              'value' => date('Ymd'),
              'type' => 'numeric'
            ],
            [
              'key' => 'related_programs',
              'compare' => 'LIKE',
              'value' => '"' . get_the_ID() . '"'
            ]
          ]
        ]);

        if ($events->have_posts()) { 
          echo '<hr class="section-break"/>';
          echo "<h2 class='headline headline--medium'>Upcoming $eventTitle Events</h2>";  
        }
        
        while ($events->have_posts()) {
          $events->the_post();

          $date = new DateTime(get_field('event_date'));          
      ?>
        <div class="event-summary">
          <a class="event-summary__date t-center" href="<?php the_permalink() ?>">
            <span class="event-summary__month"><?php echo $date->format('M') ?></span>
            <span class="event-summary__day"><?php echo $date->format('d') ?></span>
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny">
              <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
            </h5>
            <p>
            <?php 
              echo has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 18);
            ?> <a href="<?php the_permalink() ?>" class="nu gray">Read more</a></p>
          </div>
        </div>
      <?php
        }

        wp_reset_postdata();
      ?>
      </div>
    </div>
  <?php
  }
?>

<?php get_footer() ?>
