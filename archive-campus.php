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
  <?php 
    while(have_posts()) { 
      the_post();
      
      get_template_part('templates/event');
    } 
    
    echo paginate_links(); 
  ?>
</div>
<?php get_footer() ?>