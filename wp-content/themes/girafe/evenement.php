<?php
/*
    Template Name: Evenement
    http://localhost/mariam/wp-admin/themes.php
*/

  get_header(); ?>
  <main role="main" class="article">
    <h1 role="heading" aria-level="1" class="page__title">Tous nos évéments</h1>

    <!--  <//?php echo do_shortcode( '[searchandfilter fields="search,post_date" order_dir=",asc,desc types=",date" headings=",Post Date"]' ); ?>
  --><?php
     $prjts = new WP_Query();
     $prjts->query([
             'post_type'=>'evenement',
        ]);
        if ( $prjts->have_posts() ):
               while ( $prjts->have_posts() ):
                 $prjts->the_post();
       ?>
       <div class="actus__single">
        <p class="actus__singleDate"><span class="day">20 </span><br> <span class="month">Juin </span><br><span class="year">2012</span><br></p>
        <h2 role="heading" aria-level="2" class="actus__singleTitle"><?= the_field('titre'); ?></h2>
        <p class="actus__singleType">Souper</p>
        <p class="actus__singleLieu">Lieu</p>
        <?php $gdImg = get_field('grande_img'); ?>
          <img src="<?= $gdImg; ?>" alt="" class="actus__img">
        <p class="actus__singleText"><?= dw_the_excerpt(350);?>></p>
        <a href="<?= the_permalink(); ?>" class="actus__ctaLink">Lire la suite</a>
      </div>
<?php endwhile; endif; ?>
</main>

  <?php get_footer(); ?>
