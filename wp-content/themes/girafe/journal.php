<?php
/*
    Template Name: Journal
    http://localhost/mariam/wp-admin/themes.php
*/

  get_header(); ?>
  <main role="main" class="article">
    <h1 role="heading" aria-level="1" class="page__title">Journal de bords</h1>
  <?php
     $jour   = new WP_Query();
     $jour  ->query([
             'post_type'=>'journal',
        ]);
        if ( $jour  ->have_posts() ):
               while ( $jour  ->have_posts() ):
                 $jour  ->the_post();
       ?>
       <div class="actus__single">
        <p class="actus__singleDate"><span class="day">20 </span><br> <span class="month">Juin </span><br><span class="year">2012</span><br></p>
        <h2 role="heading" aria-level="2" class="actus__singleTitle"><?= the_field('titre'); ?></h2>
        <p class="actus__singleType">Souper</p>
        <p class="actus__singleLieu">Lieu</p>
        <?php $gdImg = get_field('grande_img'); ?>
          <img src="<?= $gdImg; ?>" alt="" class="actus__img">
        <p class="actus__singleText"><?= dw_the_excerpt(453);?></p>
        <a href="<?= the_permalink(); ?>" class="actus__ctaLink">Lire la suite</a>
      </div>
<?php endwhile; endif; ?>
</main>
  <?php get_footer(); ?>
