<?php
/*
    Template Name: A propos
    http://localhost/mariam/wp-admin/themes.php
*/

  get_header(); ?>
  <main role="main" class="prop">
        <div class="prop__but">

          <h1 role="heading" aria-level="1" class="page__title"><span class="page__sous"><?= the_field('titre_principale') ?></h1></span>
<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
          <p class="prop__info"><?= the_field('intro') ?></p>
          <h2 class="prop__bold"><?php _e('Mais c\'est plus que cela encore.','mariam'); ?> </h2>
        <p class="prop__info2"><?= the_field('expli'); ?></p>
          <div class="prop__bloc">
            <?php $img1 = get_field('img1'); ?>
            <img src="<?= $img1; ?>" alt="" class="prop__img">
            <p class="prop__text--droite"><?= the_field('txt_1') ?></p>
          </div>
          <?php $img2 = get_field('img_2'); ?>
          <img src="<?= $img2; ?>" alt="" class="prop__img--d">
          <p class="prop__text--gauche"><?= the_field('txt_2') ?></p>
<?php endwhile; endif; ?>

          <?php
             $home = new WP_Query();
             $home->query([
                     'pagename'=>'Accueil',
                ]);
                if ( $home->have_posts() ):
                       while ( $home->have_posts() ):
                         $home->the_post();
               ?>
          <div class="home__link--back">
            <div class="home__link">
              <?php $lien1 = get_field('lien1'); ?>
              <a href="<?php echo $lien1 ?>" title="Lien vers la page voyager">
                <div class="link link__one">
                  <h2 role="heading" aria-level="2" class="link__title link__one--pos"><?php _e('Voyager','mariam'); ?></h2>
                    <div class="link__hide">
                        <p class="link__hover"><?php _e('Envie d\'aider aussi? Renseignez-vous sur le prochain voyage organisé.','mariam'); ?></p>
                    </div>

                </div>
              </a>
              <?php $lien2 = get_field('lien2'); ?>
              <a href="<?php echo $lien2 ?>" title="Lien vers la page de sponsors">
                <div class="link link__two">
                    <h2 role="heading" aria-level="2" class="link__title link__one--pos"><?php _e('Sponsoriser','mariam'); ?></h2>
                    <div class="link__hide">
                        <p class="link__hover"><?php _e('Toute aide est la bienvenue, renseignez vous sur le sponsors.','mariam'); ?> </p>
                  </div>
                </div>
              </a>
              <?php $lien3 = get_field('lien3'); ?>
              <a href="<?php echo $lien3 ?>" title="Lien vers la page de don">
                <div class="link link__three">
                  <h2 role="heading" aria-level="2" class="link__title link__one--pos"><?php _e('Faire un don','mariam'); ?></h2>
                    <div class="link__hide">
                      <p class="link__hover"><?php _e('Envie de participer? N\'hésitez pas à faire un don.','mariam'); ?></p>
                    </div>
                </div>
              </a>
              <?php $lien4 = get_field('lien4'); ?>
              <a href="<?php echo $lien4 ?>" title="Lien vers la page d'évenement">
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
        <?php endwhile; endif; ?>
      </div>
    </div>
    <?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>
    <?php $lien = get_fields('lien'); ?>
    <a href="<?= $lien; ?>" title="Lien vers la page contact" class="prop__contactLink"><?php _e('Besoin de nous contactez?','mariam'); ?></a>
    <div class="prop__equipe">
      <h1 role="heading" aria-level="1" class="page__title prop__title2"><?= the_field('titre_bas'); ?></h1>
        <ul class="prop__list">
          <li class="prop__elt"><?= the_field('gerant_1'); ?> <br> Président</li>
          <li class="prop__elt"><?= the_field('gerant_2'); ?> <br> Président</li>
          <li class="prop__elt"><?= the_field('gerant_3'); ?> <br> Administrateur</li>
          <li class="prop__elt"><?= the_field('gerant_4'); ?> <br> Trésorière</li>
        </ul>
        <p class="prop__equipText"><?= the_field('texte_equipe'); ?></p>
    </div>
    <?php endwhile; endif; ?>
</main>




<?php get_footer(); ?>
