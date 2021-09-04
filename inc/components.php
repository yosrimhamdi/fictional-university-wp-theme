<?php

function the_banner($args = []) {
  $args['image'] =
    $args['image'] ??
    (get_field('page_banner_background_image')['sizes']['banner-image'] ??
      get_theme_file_uri('/src/assets/images/ocean.jpg'));
  $args['title'] = $args['title'] ?? get_the_title();
  $args['subtitle'] = $args['subtitle'] ?? get_field('page_banner_subtitle');
  ?>
<div class="page-banner">
  <div
    class="page-banner__bg-image"
    style="background-image: url(<?php echo $args['image']; ?>)"
  ></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
    <div class="page-banner__intro">
      <p><?php echo $args['subtitle']; ?></p>
    </div>
  </div>
</div>
<?php
}

function the_map($location, $link = false) {
  ?>
<div
  class="marker"
  data-lat="<?php echo $location['lat']; ?>"
  data-lng="<?php echo $location['lng']; ?>"
>
  <h3>
    <?php if ($link): ?>
    <a href="<?php the_permalink(); ?>">
      <?php echo get_the_title(); ?>
    </a>
    <?php else:echo get_the_title();endif; ?>
  </h3>
  <?php echo $location['address']; ?>
</div>
<?php
}
