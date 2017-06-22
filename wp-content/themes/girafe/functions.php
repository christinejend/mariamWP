<?php
/* Trouver fonctions pour extraire la date 00 - Mois - année*/
 // AJoute un custom post type, se lancera lorsque le wordpress se chargera
add_action( 'init', 'dw_create_post_type' );
/*retirer les tags automatique acf */
remove_filter ('acf_the_content', 'wpautop');
/* bouton back pour post*/

//add_filter ('the_content', 'dw_insertbackbutton');

/*  Ajoute le menu*/
add_action( 'init', 'dw_register_menu' );

function dw_create_post_type() {
  register_post_type( 'projet',
    array(
      'labels' => array(
        'name' => 'Projets',
        'singular_name' => __( 'Projet' ),
        'add_new'=> 'Ajouter un projet de voyage'

      ),
      'description'=>'Permet d\'ajouter ou retirer un projet',
      'menu_icon' => 'dashicons-admin-site',
      'menu_position'=>'14',
      'public' => true
    )
  );
  register_post_type( 'journal',
    array(
      'labels' => array(
        'name' => 'Journal de bord',
        'singular_name' => __( 'Journal' ),
        'add_new'=> 'Ajouter un article au journal de bord '

      ),
      'description'=>'Permet d\'ajouter ou retirer un article au journal de bod',
      'menu_icon' => 'dashicons-welcome-write-blog',
      'menu_position'=>'15',
      'public' => true
    )
  );
  register_post_type( 'evenement',
    array(
      'labels' => array(
        'name' => 'Événements',
        'singular_name' => __( 'événement' ),
        'add_new'=> 'Ajouter un événement'

      ),
      'description'=>'Permet d\'ajouter ou retirer un événement',
      'menu_icon' => 'dashicons-groups',
      'menu_position'=>'16',
      'public' => true
    )
  );
  register_taxonomy('lieu', 'evenement', [
        'label'=>'Lieux', //tableau clefs
        'labels'=> [
            'singular_name'=> 'Lieu',
            'edit_item'=> 'Editer l\'Lieu',
            'add_new_item'=> 'Ajouter un Lieu'
        ],
        'public'=>'true',
        'description'=>'Lieu dans lequel l\'événement a eu lieu',
        'hierarchical'=>'true'
    ]);
    register_taxonomy('type', 'evenement', [
          'label'=>'Types', //tableau clefs
          'labels'=> [
              'singular_name'=> 'Type',
              'edit_item'=> 'Editer le type',
              'add_new_item'=> 'Ajouter un Type'
          ],
          'public'=>'true',
          'description'=>'Type d\'événement (Marche, Souper, Réunion, ...)',
          'hierarchical'=>'true'
      ]);
      register_taxonomy('type', 'evenement', [
            'label'=>'Types', //tableau clefs
            'labels'=> [
                'singular_name'=> 'Type',
                'edit_item'=> 'Editer le type',
                'add_new_item'=> 'Ajouter un Type'
            ],
            'public'=>'true',
            'description'=>'Type d\'événement (Marche, Souper, Réunion, ...)',
            'hierarchical'=>'true'
        ]);
        register_taxonomy('lieu', 'evenement', [
              'label'=>'Lieux', //tableau clefs
              'labels'=> [
                  'singular_name'=> 'Lieu',
                  'edit_item'=> 'Editer l\'Lieu',
                  'add_new_item'=> 'Ajouter un Lieu'
              ],
              'public'=>'true',
              'description'=>'Lieu dans lequel l\'événement a eu lieu',
              'hierarchical'=>'true'
          ]);
}

/* AJoute barre rechercher*/
function add_search_box($items, $args) {
        ob_start();
        get_search_form();
        $searchform = ob_get_contents();
        ob_end_clean();

        $items .= '<li>' . $searchform . '</li>';
        return $items;
}

/* Ajoute le menu */
function dw_register_menu() {
  register_nav_menu('menu', __( 'Menu principale, affiché dans le header.', 'mariam' ));
}

/* GET MENU ITEM */
function dw_get_nav_items($location){
  //Récupère les items du menu $location et les transformer en objet contenant $link et $label

  $id =dw_get_nav_id($location);
  if(!$id) return []; //SI on a pas ID on retourne un tab vide
  $nav=[];
  $children = [];

  foreach(wp_get_nav_menu_items($id) as $object){
    $item = new stdClass(); //Créer un objet vide en php
    $item->link = $object->url;
    $item->label= $object->title;
    $item->children = [];// QUand on ajoute un item a nav, on l'ajoute a chaque fois sur l'id de l'objet

    if($object->menu_item_parent){
      $item->parent = $object->menu_item_parent;
      $children[] = $item; //Stocke les element qui ont un parent mais en attende de confirmer que ce parent existe
    }
    else{
        $nav[$object->ID] = $item; // AJoute un item dans le tab nav = array_push($nav,$item)
    }
  }
  foreach ($children as $item) { //Assigne enfant au parent
    $nav[$item->parent]->children[] = $item;
  }
  return $nav;
}

/* GET MENU id from Location*/
function dw_get_nav_id($location)
{ foreach(get_nav_menu_locations()  as $navLocation => $id){
    if($navLocation == $location) return $id;
  }
  return false;
}

/* Affiche une partie du texte explication projet/even/journal*/
function dw_get_the_excerpt($length = null){

  $excerpt= get_field('expli_projet');
  if(is_null($length) || strlen($excerpt) <= $length) return $excerpt;
  return trim(substr($excerpt, 0, $length)) . '&hellip;';

}
/* RETURN the excerpt*/
function dw_the_excerpt($length = null){
  echo dw_get_the_excerpt($length);
}


/* Ajoute un bouton retour au page d'article*/
function dw_insertbackbutton ($content){
    if ( is_single()) {
        $back = $_SERVER['HTTP_REFERER'];
        if( isset($back) && $back !='') {
             $content .= '<a class="theme-button" href="'.$back.'" title="Retour"><i class="icon-caret-left"></i> Retour</a> ';
        }
    };
    return $content;
}

/* Ajoute classe active au menu*/                            /* NOT WORKING*/
add_filter('nav_menu_css_class' , 'current_item_nav_class' , 10 , 2);
function current_item_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
add_filter('pre_get_posts','custom_search_filter');

function custom_search_filter( $query ) {

    // Si on est entrain de faire une recherche
    if ( $query->is_search ) {

        switch( $_GET['search']  ) {

            case 'book':
                $query->set( 'post_type', 'book' );
                break;

            case 'cat1':
                $query->set( 'category_name','cat1' );
                break;

            case 'cat2':
                $query->set( 'category_name','cat2' );
                break;
        }
    }
    return $query;
}