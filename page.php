<?php get_header() ?>
<div class="page-banner">
    <div 
      class="page-banner__bg-image"
      style="background-image: url(<?php echo get_theme_file_uri('/assets/images/ocean.jpg') ?>);">
    </div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title() ?></h1>
      <div class="page-banner__intro">
        <p>WORDPRESS COSTUM FIELD</p>
      </div>
    </div>  
</div>
<div class="container container--narrow page-section">
  <?php $parentPageId = wp_get_post_parent_id(get_the_ID()); if ($parentPageId) { ?>
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p>
        <a class="metabox__blog-home-link" href="<?php echo get_the_permalink($parentPageId) ?>">
          <i class="fa fa-home" aria-hidden="true"></i> 
          Back to <?php echo get_the_title($parentPageId) ?>
        </a> 
        <span class="metabox__main"><?php the_title() ?></span>
      </p>
    </div>
  <?php } ?>
  <div class="page-links">
    <?php if ($parentPageId): ?>
    <h2 class="page-links__title">
      <a href="<?php echo get_the_permalink($parentPageId) ?>">
        <?php echo get_the_title($parentPageId) ?>
      </a>
    </h2>
    <?php endif; ?>
    <ul class="min-list">
      <?php 
        wp_list_pages([
          'title_li' => NULL,
          'child_of'=> $parentPageId ? $parentPageId : get_the_ID()
        ]);
      ?>
    </ul>
  </div>
  <div class="generic-content"><?php the_content() ?></div>
</div>
<?php get_footer() ?>