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
      <?php the_content() ?>
      <div class="acf-map">
        <?php the_map($location) ?>
      </div>
      </div>
    </div>
  <?php
}
?>

<?php get_footer() ?>
