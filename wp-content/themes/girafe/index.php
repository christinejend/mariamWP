<?php
/*
    Template Name: Homepage
    http://localhost/mariam/wp-admin/themes.php
*/

  get_header(); ?>

<main role="main" class="home">
  <?php
     $prop = new WP_Query();
     $prop->query([
             'pagename'=>'A propos',
        ]);
        if ( $prop->have_posts() ):
               while ( $prop->have_posts() ):
                 $prop->the_post();
       ?>
    <p class="home__info"><?= the_field('intro')?></p>
    <a href="<?php the_permalink(); ?>" title="Lien vers la page à propos" class="home__linkProps cta home__cta"><?php _e('Envie d\'en savoir plus?','mariam'); ?></a>
  <?php endwhile; endif; ?>


    <div class="home__link--back">
      <div class="home__link">
        <?php $lien1 = get_field('lien1'); ?>
        <a href="<?= $lien1 ?>" title="Lien vers la page voyager">
          <div class="link link__one">
            <h2 role="heading" aria-level="2" class="link__title link__one--pos"><?php _e('Voyager','mariam'); ?></h2>
              <div class="link__hide">
                  <p class="link__hover"><?php _e('Envie d\'aider aussi? Renseignez-vous sur le prochain voyage organisé.','mariam'); ?></p>
              </div>

          </div>
        </a>
        <?php $lien2 = get_field('lien2'); ?>
        <a href="<?= $lien2 ?>" title="Lien vers la page de sponsors">
          <div class="link link__two">
              <h2 role="heading" aria-level="2" class="link__title link__one--pos"><?php _e('Sponsoriser','mariam'); ?></h2>
              <div class="link__hide">
                  <p class="link__hover"><?php _e('Toute aide est la bienvenue, renseignez vous sur le sponsors.','mariam'); ?> </p>
            </div>
          </div>
        </a>
        <?php $lien3 = get_field('lien3'); ?>
        <a href="<?= $lien3 ?>" title="Lien vers la page de don">
          <div class="link link__three">
            <h2 role="heading" aria-level="2" class="link__title link__one--pos"><?php _e('Faire un don','mariam'); ?></h2>
              <div class="link__hide">
                <p class="link__hover"><?php _e('Envie de participer? N\'hésitez pas à faire un don.','mariam'); ?></p>
              </div>
          </div>
        </a>
        <?php $lien4 = get_field('lien4'); ?>
        <a href="<?= $lien4 ?>" title="Lien vers la page d'évenement">
          <div class="link link__four">
              <h2 role="heading" aria-level="2" class="link__title link__one--pos"><?php _e('Évènements','mariam'); ?></h2>
                <div class="link__hide">
                  <p class="link__hover"><?php _e('Quand se déroule la prochaine soirée? Par ici vous saurez tout.','mariam'); ?></p>
              </div>
          </div>
        </a>
        <!--<img src="assets/img/g.png" alt="" class="link__img">-->
      </div> <!--FIN HOME__LINK-->
    </div><!--FIN HOME__LINK--back -->
    <div class="">
      <h2 role="heading" aria-level="2" class=" actu__title hidden"><?php _e('Dernières actu','mariam'); ?></h2>

      <?php  $prjts = new WP_Query();
        $prjts->query([
                'post_type'=>'evenement',
                'showposts'=>'2',
           ]);
           if ( $prjts->have_posts() ):
                  while ( $prjts->have_posts() ):
                    $prjts->the_post();
      ?>
      <a href="<?php the_permalink(); ?>" class="actu__linkSingle"title="Lien vers l'article">
      <div class="home__actu">
        <h3 role="heading" aria-level="3" class="home__title actu__title"><?= the_field('titre')?> </h3>
        <p class="actu__text home__text"><?= dw_the_excerpt(350);?> </p>
      </div>
      </a>
      <?php endwhile; endif; ?>


    <a href="<?= $lien4 ?>" class="actu__linkAll cta home__cta" title="Lien vers tous les articles"><?php _e('Voir tous les articles','mariam'); ?></a>
    </div>


    <?php
       $spon = new WP_Query();
       $spon->query([
               'page_id'=>'59',
          ]);
          if ( $spon->have_posts() ):
                 while ( $spon->have_posts() ):
                   $spon->the_post();
         ?>

    <a href="<?= the_permalink(); ?>">
    <div class="home__sponsors"> <!--SLIDER-->
      <div class="home__sponImg">
        <div class="home__sImg">
        <span class="home__spon"><?= the_field('spon1')?></span>
        </div>
      </div>
      <div class="home__sponTxt">
        <h1 class="home__title home__sponTitle"><?= the_field('title')?></h1>
        <p class="home__text"><?= the_field('texte')?></p>
      </div>
    </div>
    </a>
    <?php endwhile; endif; ?>
    <?php
       $prjts = new WP_Query();
       $prjts->query([
               'post_type'=>'evenement',
               'showposts'=>'1',
          ]);
          if ( $prjts->have_posts() ):
                 while ( $prjts->have_posts() ):
                   $prjts->the_post();
         ?>
    <a href="<?= the_permalink(); ?>">
      <div class=" home__journal">
        <?php $gdImg = get_field('grande_img'); ?>
          <img src="<?= $gdImg; ?>" alt="" class="home__journalImg">
        <div class=" home__journalTxt">
        <!--  <h1 class="home__journalTitle">Journal de bords</h1>-->
          <h2 class="home__journalTitle"><?= the_field('titre'); ?></h2>
          <p class="home__journalT"><?= dw_the_excerpt(350); ?></p>
        </div>
      </div>
    </a>
    <?php endwhile; endif; ?>
    <?php
       $projet = new WP_Query();
       $projet->query([
               'post_type'=>'projet',
                'showposts'=>'1',
          ]);
          if ( $projet->have_posts() ):
                 while ( $projet->have_posts() ):
                   $projet->the_post();
         ?>
    <a href="<?= the_permalink(); ?>" class="">
    <div class="home__prVoyage">
      <h2 role="heading" aria-level="2" class="home__title prVoyage__title">Notre dernier voyage <?= the_field('titre'); ?></h2>
      <p class="prVoyage__text home__text"><?= dw_the_excerpt(350); ?></p>
    </div>
    </a>
      <a href="html/projets.html" class=" actu__link cta home__cta"><?php _e('Voir tous les projets','mariam'); ?> </a>
      <?php endwhile; endif; ?>
  </main>

  <?php get_footer(); ?>
