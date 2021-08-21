<?php 
  get_header();

  global $post;
  $post = NULL;

  the_banner([
    'title' => 'All Events',
    'subtitle' => 'See what\'s going on in our world.'
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
  <a href="<?php echo site_url('/old-events')?>">Old Events</a>
</div>
<?php get_footer() ?>