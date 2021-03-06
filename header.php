<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head() ?>
</head>
<body>
  <header class="site-header">
    <div class="container">
      <h1 class="school-logo-text float-left">
        <a href="<?php echo site_url() ?>"><strong>Fictional</strong> University</a>
      </h1>
      <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
        <nav class="main-navigation">
          <?php 
            $aboutUsClass = is_page('about-us') ? 'current-menu-item' : '';
            $blogClass = get_post_type() === 'post' ? 'current-menu-item' : '';
            $eventsClass = (get_post_type() === 'event' OR is_page('old-events')) ? 'current-menu-item' : '';
            $programClass = get_post_type() === 'program' ? 'current-menu-item' : '';
            $campuses = get_post_type() === 'campus' ? 'current-menu-item' : '';

          ?>
          <ul>
            <li class="<?php echo $aboutUsClass ?>"><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
            <li class="<?php echo $programClass ?>"><a href="<?php echo get_post_type_archive_link('program') ?>">Programs</a></li>
            <li class="<?php echo $eventsClass ?>"><a href="<?php echo get_post_type_archive_link('event') ?>">Events</a></li>
            <li class="<?php echo $campuses ?>"><a href="<?php echo get_post_type_archive_link('campus') ?>">Campuses</a></li>
            <li class="<?php echo $blogClass ?>"><a href="<?php echo site_url('/blog') ?>">Blog</a></li>
          </ul>
        </nav>
        <div class="site-header__util">
          <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
          <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
          <div class="open search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></div>
        </div>
      </div>
    </div>
  </header>
