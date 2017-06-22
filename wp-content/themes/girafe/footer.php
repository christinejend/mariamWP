<footer role="contentinfo" class="footer">
  <?php wp_footer(); ?>
  <div class="footer__group">
    <div class="footer__join">
      <h1 class="footer__joinTitle">Nous joindre</h1>
      <ul class="footer__joinList">
        <li class="footer__joinElt">mariamfaso@gmail.com</li>
        <li class="footer__joinElt"><address class="">
          Avenue De La Gare 15 <br>
          6600 Bastogne BELGIQUE
        </address></li>
        <li class="footer__joinElt">+32(04)00 000 000</li>
      </ul>

    </div>
    <div class="footer__help">
      <h1 class="footer__helpTitle"><?php _e('Aidez les aussi !','mariam'); ?></h1>

        <ul class="footer__helpList">
          <?php
             $home = new WP_Query();
             $home->query([
                     'pagename'=>'Accueil',
                ]);
                if ( $home->have_posts() ):
                       while ( $home->have_posts() ):
                         $home->the_post();
               ?>
          <?php $lien3 = get_field('lien3'); ?>
          <a href="<?= $lien3 ?>" class="footer__helpLink"  title="Lien vers la page aider"><li class="footer__helpElt"><?php _e('Faire un don','mariam'); ?></li></a>
          <?php $lien1 = get_field('lien1'); ?>
          <a href="<?= $lien1 ?>" class="footer__helpLink" title="Lien vers la page pour participer à un voyage"><li class="footer__helpElt"><?php _e('Participer à un voyage','mariam'); ?></li></a>
          <?php $lien2 = get_field('lien2'); ?>
          <a href="<?= $lien2 ?>" class="footer__helpLink" title="Lien vers la page galerie"><li class="footer__helpElt"><?php _e('Sponsoriser','mariam'); ?></li></a>
          <?php endwhile; endif; ?>
        </ul>
    </div>
    <div class="footer__last">
      <h1 class="footer__lastTitle"><?php _e('Les derniers articles du journal','mariam'); ?></h1>
      <?php  $prjts = new WP_Query();
        $prjts->query([
                'post_type'=>'journal',
                'showposts'=>'4',
           ]);
           if ( $prjts->have_posts() ):
                  while ( $prjts->have_posts() ):
                    $prjts->the_post();
      ?>
      <ul class="footer__lastList">
        <li class="footer__lastElt"><a href="<?php the_permalink(); ?>" class="footer__lastLink"><?= the_field('titre'); ?></a></li>
        </ul>
      <?php endwhile; endif; ?>
    </div>
    <a href="index.html" class="footer__logo">
  <img src="<?= get_template_directory_uri() . '/assets/img/logo.png'; ?>" alt="" class="footer__img"></a>
</div>
<div class="footer__sociaux">
  <h2 class="footer__sociauxTitle hidden">Retrouvez nous sur</h2>
  <ul class="footer__sociauxList">
    <a href="#" title="Lien externe vers la page Facebook" class="footer__sociauxLink  fb"><li class="footer__sociauxList hidden">Facebook</li></a>
    <a href="#" title="Lien externe vers la page Twitter" class="footer__sociauxLink  twi"><li class="footer__sociauxList hidden">Twitter</li></a>
    <a href="#" title="Lien externe vers la page youtube" class="footer__sociauxLink  yt"><li class="footer__sociauxList hidden">Youtube</li></a>
    <a href="html/contact.html" title="Lien vers la page contact"class="footer__sociauxLink  mail"><li class="footer__sociauxList hidden">Contacter</li></a>
  </ul>
</div>
</footer>
</body>
