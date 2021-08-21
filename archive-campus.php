<?php 
  get_header();

  global $post;
  $post = NULL;

  the_banner([
    'title' => 'All Campuses',
    'subtitle' => 'Look at that location.'
  ]);
?>
<div class="container container--narrow page-section">
 <div class="acf-map">
  <?php 
      while(have_posts()) { 
        the_post();
        $location = get_field('map_location');

        echo "<div class='marker' data-lat='$location[lat]' data-lng='$location[lng]'></div>";
      } 
    ?>
 </div>
</div>
<?php get_footer() ?>