<?php
/*
    Template Name: Galerie
    http://localhost/mariam/wp-admin/themes.php
*/

  get_header(); ?>

<main  role="main" class="galerie">
  <h1 role="heading" aria-level="1" class="page__title"><span class="page__sous"><?= the_title(); ?></h1></span>
  <div class="galerie__bloc">
    <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; endif; ?>
  </div>

</main>




  <?php get_footer(); ?>
