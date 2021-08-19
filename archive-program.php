<?php 
  get_header();

  global $post;
  $post = NULL;
  
  the_banner([
    'title' => 'All Programs',
    'subtitle' => 'See the program that suites you.'
  ]);
?>
<div class="container container--narrow page-section">
  <ul class="link-list min-list">
  <?php 
    while (have_posts()):
      the_post();
      $eventDate = new DateTime(get_field('event_date'));
  ?>
      <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
  <?php 
    endwhile;
    echo paginate_links(); 
  ?>
  </ul>
</div>
<?php get_footer() ?>