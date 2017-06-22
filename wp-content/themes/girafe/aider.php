<?php
/*
    Template Name: Aider
    http://localhost/mariam/wp-admin/themes.php
*/

  get_header(); ?>
<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
  <main role="main" class="aider">
    <h1 role="heading" aria-level="1" class="page__title"><?= the_field('titre'); ?></h1>
    <p class="aider__text--center"><?= the_field('para'); ?></p>
    <?php $lien = get_fields('lien'); ?>
    <a href="<?= $lien; ?>" title="Lien vers la page contact" class="aider__contactLink ctaAll"><span class="aider__pl"><?php _e('Une idée à nous proposer ?','mariam'); ?></span></a>
    <?php endwhile; endif; ?>
    <?php
       $don = new WP_Query();
       $don->query([
               'page_id'=>'61',
          ]);
          if ( $don->have_posts() ):
                 while ( $don->have_posts() ):
                   $don->the_post();
         ?>
    <a href="<?= the_permalink(); ?>" title="Lien vers la page Don">
    <div class="aider__bloc aider__firstBloc">
      <?php $img = get_field('img1'); ?>
        <img src="<?=  $img; ?>" alt="" class=" aider__img">
      <div class="aider__blocTxt aider__blocTxt1">
        <h2 role="heading" aria-level="2" class="aider__title"><?= the_title(); ?></h2>
        <p class="aider__text aider__text"><?= the_field('texte'); ?></p>
      </div>
    </div>
    </a>
    <?php endwhile; endif; ?>
    <?php
       $part = new WP_Query();
       $part->query([
               'page_id'=>'63',
          ]);
          if ( $part->have_posts() ):
                 while ( $part->have_posts() ):
                   $part->the_post();
         ?>
    <a href="<?= the_permalink(); ?>" title="Lien vers la page Partir">
    <div class="aider__bloc">
      <?php $img = get_field('img1'); ?>
      <img src="<?= $img; ?>" alt="" class="aider__imgD aider__img">
      <div class="aider__blocTxt aider__blocTxt--middle">
        <h2 role="heading" aria-level="2" class="aider__title2"><?= the_title(); ?></h2>
        <p class="aider__text2"><?= the_field('texte'); ?></p>
      </div>
    </div>
    </a>
    <?php endwhile; endif; ?>
    <?php
       $part = new WP_Query();
       $part->query([
               'page_id'=>'59',
          ]);
          if ( $part->have_posts() ):
                 while ( $part->have_posts() ):
                   $part->the_post();
         ?>
    <a href="<?= the_permalink(); ?>" title="Lien vers la page sponsors">
  <div class="aider__bloc">
    <?php $img = get_field('img1'); ?>
      <img src="<?= $img; ?>" alt="" class="aider__imgG aider__img aider__der ">
    <div class="aider__blocTxt aider__blocTxt3">
      <h2 role="heading" aria-level="2" class="aider__title"><?= the_title(); ?></h2>
      <p class="aider__text aider__text--g"><?= the_field('texte'); ?></p>
    </div>

  </div>
  </a>
  <?php endwhile; endif; ?>
<?php get_footer(); ?>
