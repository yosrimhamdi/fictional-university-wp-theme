<?php 
  get_header();
  
  while(have_posts()) {
    the_post();
    the_banner();
  ?>
    <div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event') ?>">
            <i class="fa fa-home" aria-hidden="true"></i> 
            All EVents
          </a> 
          <span class="metabox__main"><?php the_title() ?></span>
        </p>
      </div>
      <div class="generic-content">
      <?php 
        echo the_content();
        
        $relatedPrograms = get_field('related_programs');

          if ($relatedPrograms) {
            echo '<hr class="section-break" />';
            echo '<h2 class="headline headline--medium">Related Program(s)</h2>';
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
      </ul>
      </div>
    </div>
<?php
  }
?>
<?php get_footer() ?>
