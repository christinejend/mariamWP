<?php
/*
    Template Name: Projets
    http://localhost/mariam/wp-admin/themes.php
*/

  get_header(); ?>

<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

  <main role="main" class="prjs">
    <h1 role="heading" aria-level="1" class="page__title"><?= the_field('titre_principale'); ?></h1>
    <p class="prjs__txt home__text"><?= the_field('texte_expli'); ?></p>
    <?php $lien = get_field('lien'); ?>
    <a href="<?= $lien; ?>" class="prjs__linkEnvie  ctaAll"><?php _e('Envie d\'aider ?','mariam'); ?></a>
    <?php endwhile; endif; ?>
    <div class="prjs__projet">
      <?php
         $prjts = new WP_Query();
         $prjts->query([
                 'post_type'=>'projet',
                 'name'=>'Lengo',
            ]);
            if ( $prjts->have_posts() ):
                   while ( $prjts->have_posts() ):
                     $prjts->the_post();
           ?>
      <a href="<?php the_permalink(); ?>">
      <div class="prjs__bloc prjs__bloc--one">
        <?php $gdImg = get_field('grande_img'); ?>
        <img src="<?= $gdImg; ?>" alt="" class="prjs__projetImg ">
        <div class="prjs__blocText">
          <h2 role="heading" aria-level="2" class="prjt__title"><?= the_field('titre'); ?></h2>
          <p class="prjt__text"><?= dw_the_excerpt(350);?> ?></p>
        </div>
      </div>
      <?php endwhile; endif; ?>
      </a>

      <?php
         $prjtsup = new WP_Query();
         $prjtsup->query([
                 'post_type'=>'projet',
                 'name'=>'ait-oualiad-au-sud-du-maroc-2007',
            ]);
            if ( $prjtsup->have_posts() ):
                   while ( $prjtsup->have_posts() ):
                     $prjtsup->the_post();
           ?>
      <a href="<?php the_permalink(); ?>">
    <div class="prjs__bloc2">
        <?php $gdImg = get_field('grande_img'); ?>
        <img src="<?= $gdImg; ?>" alt="" class="prjs__projetImg2 ">
        <div class="prjs__blocText2">
          <h2 role="heading" aria-level="2" class="prjt__title prjt__title2"><?= the_field('titre'); ?></h2>
          <p class="prjt__text prjt__text2"><?= dw_the_excerpt(450); ?></p>
        </div>
      </div>
      </a>
    <?php endwhile; endif; ?>
    </div>

    <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
    <p class="prjs__text1 home__text"><?= the_field('texte_expli2'); ?></p>
    <div class="prjs__avis">
      <blockquote class="avis__text "><p><?= the_field('avis'); ?></p>
        <br><small><?= the_field('auteur_cit'); ?></small>
      </blockquote>
      </div>
    <p class="prjs__text home__text"><?= the_field('texte_expli3'); ?></p>
    <?php $lien = get_fields('lien2'); ?>
    <a href="<?= $lien2; ?>" class="prjs__linkCont ctaAll"><?php _e('Notre équipe reste toujours joignable','mariam'); ?>
      </a>


    </main>

    <?php endwhile; endif; ?>

<?php get_footer(); ?>
