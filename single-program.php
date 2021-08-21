<?php 
  get_header();

  while(have_posts()) {
    the_post();
    the_banner();
  ?>
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

        $professors = new WP_Query([
          'post_type' => 'professor',
          'posts_per_page' => -1,
          'orderby' => 'title',
          'order' => 'asc',
          'meta_query' => [
            [
              'key' => 'related_programs',
              'compare' => 'LIKE',
              'value' => '"' . get_the_ID() . '"'
            ]
          ]
        ]);

        if ($professors->have_posts()) { 
          echo '<hr class="section-break"/>';
          echo '<h2 class="headline headline--medium">' . get_the_title() .  ' Professor(s)</h2>';
        }
       
        echo '<ul class="professor-cards">';
        
        while ($professors->have_posts()) {
          $professors->the_post();

        ?>
          <li class="professor-card__list-item">
            <a class="professor-card" href="<?php the_permalink() ?>">
             <img class="professor-card__image" src="<?php the_post_thumbnail_url('professor-landscape'); ?>" />
             <span class="professor-card__name"><?php the_title(); ?></span>
            </a>
          </li>
        <?php
        }
        echo '</ul>';

        wp_reset_postdata();

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
          echo "<h2 class='headline headline--medium'>Upcoming " . get_the_title() .  " Events</h2>";  
        }
        
        while ($events->have_posts()) {
          $events->the_post();

          get_template_part('templates/event');
        }
        wp_reset_postdata();
      ?>
      </div>
  </div>
<?php 
  }
  
  get_footer();
?>
