<?php
/*
    Template Name: Contact
    http://localhost/mariam/wp-admin/themes.php
*/

  get_header(); ?>
<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
  <main role="main" class="contact helping">
        <h1 class="page__title" role="heading" aria-level="1"><?= the_title(); ?></h1>
        <?php $img1 = get_field('img1'); ?>
        <img src="<?= $img1; ?>" alt="" class="helping__img">
        <!--<h2 class="helping__Stitle"></h2>-->
        <p class="helping__text"><?= the_field('texte'); ?></p>
        <?php $lien = get_field('lien'); ?>
        <a href="<?= $lien; ?>"  class="helping__link envie"><?php _e('Envie d\'aider ?','mariam'); ?></a>
        <div class="helping__Sbloc">
          <?php $img2 = get_field('img2'); ?>
          <img src="<?= $img2; ?>" alt="" class="helping__img2">
          <div class="helping__form">
            <?= the_field('formulaire'); ?>
          </div>
        </div>
  </main>

        <?php endwhile; endif; ?>

  <?php get_footer(); ?>
