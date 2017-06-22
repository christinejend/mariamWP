<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'christinncbase');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'christinncbase');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'adminRoot7');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'christinncbase.mysql.db');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'i_u,#@4H5U2-w/NM63/fq&Gt!90?BDD~GHdD^NmomT9J;svi}xPtSPSq98W8pY[|');
define('SECURE_AUTH_KEY',  'ZKdbol2)S)5chRGMZ!{X>>d6^&6koQ1q[n>>I=T$jT]i~D#5AH@t] A?-U+y8G}O');
define('LOGGED_IN_KEY',    'eq`oum<%D@kR,UaM7[*VYE?GI@6Ohp9VEyl6w>iL`jO7#e+NTD<9n]k=^WvH3%}k');
define('NONCE_KEY',        '*G54kgMy<{=Xz+;Tg{gi%Cjr&3bQS`*N}doqrb@ngo&wxly9s]-T<F(2gRcM$m<O');
define('AUTH_SALT',        'yErfrAW5[|5q6M~Gvb ;Qwi8RvIy{x2,bh&w^]Bl3Yz~T9LXNxq Q?XA:<T-ASC=');
define('SECURE_AUTH_SALT', '6QhZou<(<d0^L!%RQ[1%o+X]c&+uMjgq QF@Y]Ts=eIb6=QZ>o^yIeRXsZfMf+YP');
define('LOGGED_IN_SALT',   '{J&S@+|So@b~goQHBUmV$_Z9sf>vAspE,>II<737-^&_qD.*Nori%fUDLns&*a.N');
define('NONCE_SALT',       'IvCql.PhkguM@qigjHl+166WR)/ir5uz%--w.@9.?e<d4jD6;}+-<#[]tky2{u?}');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'mariam_wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
