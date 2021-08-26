<?php get_header()?>
<?php
while (have_posts()) {
  the_post();
  the_banner();

  $location = get_field('map_location');
  ?>
    <div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
          <a 
            class="metabox__blog-home-link" 
            href="<?php echo get_post_type_archive_link('campus') ?>"
          >
            <i class="fa fa-home" aria-hidden="true"></i>
            All Campuses
          </a>
          <span class="metabox__main"><?php the_title() ?></span>
        </p>
      </div>
      <div class="generic-content">
        <div><?php the_content() ?></div>
        <div>
          <?php
            $programs = new WP_Query([
              'post_type' => 'program',
              'posts_per_page' => -1,
              'orderby' => 'title',
              'order' => 'asc',
              'meta_query' => [
                [
                'key' => 'related_campuses',
                'compare' => 'LIKE',
                'value' => '"' . get_the_ID() . '"'
                ]
              ]
            ]);

            if ($programs->have_posts()) {
              echo '<h4 class="headline headline--medium">Program(s) available at this campus</h4>';
              echo '<ul class="min-list link-list" >';

              while ($programs->have_posts()):
                $programs->the_post();
              ?>
                <li><a href="<?php the_permalink() ?>"><?php echo the_title() ?></a></li>
              <?php
              endwhile ;

              echo '</ul>';
            }       
          ?>
        </div>
        <div class="acf-map">
          <?php the_map($location) ?>
        </div>
      </div>
    </div>
  <?php
}
?>

<?php get_footer() ?>
