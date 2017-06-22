<?php
/*
    Template Name: Single-journal
    http://localhost/mariam/wp-admin/themes.php
*/

  get_header(); ?>
<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
  <main role="main" class="article">

  <h1 class="page__title article__title" role="heading" aria-level="1"><?= the_field('titre'); ?></h1>
  <h2 class="article__date" role="heading" aria-level="2"><span class="day">20 </span><br><span class="month">Septembre </span><br><span class="year">2015</span><br></h2>
  <h2 class="article__type" role="heading" aria-level="2">Type</h2>
  <a href="<?php dw_insertbackbutton('hey'); ?>" class="helping__back back article__back">Retour à la liste</a>
  <h2 class="article__lieu" role="heading" aria-level="2">Bruxelles</h2>
  <div class="article__img">
  <?php $gdImg = get_field('grande_img'); ?>
  <img src="<?= $gdImg; ?>" alt="" class="article__img">
  </div>
  <p class="article__text"><?= the_field('expli_projet'); ?></p>
  <?php $img2 = get_field('image_2'); ?>
  <img src="<?= $img2; ?>" alt="" class="article__img2">
  <p class="article__text2"><?= the_field('expli_2'); ?></p>
  <?php $img2 = get_field('image_3'); ?>
  <img src="<?= $img3; ?>" alt="" class="article__img3">
  <p class="article__text3"><?= the_field('expli_3'); ?></p>
<?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
