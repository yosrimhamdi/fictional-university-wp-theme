<?php get_header() ?>
<?php
  while(have_posts()) {
    the_post();
    the_banner();
    ?>
    <div class="container container--narrow page-section">
      <div class="generic-content">
        <div class="row group">
          <div class="one-third"><?php the_post_thumbnail('professor-portrait'); ?></div>
          <div class="two-third"><?php the_content(); ?></div>
        </div>
        
        <?php 
          $relatedPrograms = get_field('related_programs');

          if ($relatedPrograms) {
            echo '<hr class="section-break" />';
            echo '<h2 class="headline headline--medium">Subject(s) Taught</h2>';
            echo '<ul class="link-list min-list">';

            foreach ($relatedPrograms as $program) {
              ?>
                <li div><a href="<?php  echo get_the_permalink($program) ?>">
                  <?php echo get_the_title($program) ?></a>
                </li>
              <?php
            } 
          }         
        ?>
      </div>
    </div>
<?php 
  }
  
  get_footer() 
?>
