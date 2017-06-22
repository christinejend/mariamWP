<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="keywords" content="MariamFaso asbl "/>
    <meta name="author" content="Christine Jend."/>
    <link href="https://fonts.googleapis.com/css?family=Raleway|Muli" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/main.css '; ?>" />
    <title><?= bloginfo('name')?></title>
  </head>
  <body>
  <header class="ban" role="banner">
    <h1 class="ban__title hidden" role="heading" aria-level="1">MariamFaso</h1>
    <a href="#">
    <img src="<?= get_template_directory_uri() . '/assets/img/logo.png'; ?>" alt="" class="ban__logo">
    </a>
  <!--  <a href="#drop" class="ban__dropBt" id="bt">Menu</a>-->
    <nav role="navigation" class="ban__nav" id="drop">
      <input type="checkbox"  title="menu" class="ban__check" id="toogle-nav" >
      <label for="toogle-nav" checked="checked" class="ban__dropBt"></label>
      <h2 class="hidden">Menu</h2>
       <ul class="ban__list">
        <!--<a href="html/propos.html" class="ban__link" title="Lien vers la page À propos"><li class="ban__elt">À propos</li></a>
         <a href="html/actus.html" class="ban__link" title="Lien vers la page d'actualité"><li class="ban__elt">Évènements</li></a>
         <a href="html/projets.html" class="ban__link" title="Lien vers la page des projets"><li class="ban__elt">Projets</li></a>
         <a href="html/galerie.html" class="ban__link" title="Lien vers la page galerie"><li class="ban__elt">Galerie</li></a>
         <a href="html/aider.html"class="ban__link"  title="Lien vers la page aider"><li class="ban__elt">Aider</li></a>
         <a href="html/contact.html" class="ban__link" title="Lien vers la page contact"><li class="ban__elt">Contact</li></a>
      --> <?php foreach (dw_get_nav_items('menu') as $item):?>
                <a href="<?= $item->link?>" class="ban__link">
                <li class="ban__elt">
                  <?= $item->label?></li>
                </a>
                  <?php if($item->children): ?>
                  <ul class="menu__sub">
                  <?php foreach ($item->children as $sub):?>
                    <li class="menu__item">
                      <a href="<?= $sub->link;?>" class="ban__link"><?= $sub->label;?></a>
                    </li>
                  <?php endforeach;?>
                  </ul>
                <?php endif;?>
                </li>
                <?php endforeach;?></ul>
              </nav>
  </header>
