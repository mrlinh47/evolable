<?php
define( 'WP_ALLOW_MULTISITE', true );

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);

define('DOMAIN_CURRENT_SITE', 'localhost');
define('PATH_CURRENT_SITE', '/evolable/');

define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);
@ini_set('display_errors', 0);

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_eaa');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'd~hZV PrOD!_ot+*-n1oOVs+ 21X-y(@ghBeYK>Zd7hn?6vHjxS#WvRZ`n: %5<V');
define('SECURE_AUTH_KEY',  '-S[@8<-w9xB0KL]Xp(/h;nXGGHToxDa|t$A5^<)9>b:_7%W #jULrl-2#4DRAB:X');
define('LOGGED_IN_KEY',    '|<M7~[!(*%4)`zP**O4N,/qBy&MfKvTi4(p.TKj!8&f<4xhNe-h>2TE-IJ;v;{/u');
define('NONCE_KEY',        'C{R;)he(pL}N =W.9-Y}=~t;QpD[@55]4,LyuJ0^|;Mc_?LjiPH#OeJby[9j!Y]=');
define('AUTH_SALT',        ' aM^L -9;] vOZhtwS),&~:;xD%I^b3:Mknl%JTZ Zd>,r:[gE4vxI9H]^ts[cL9');
define('SECURE_AUTH_SALT', 'P9^e6LR-Uu`uLJA9qbGTra-RCd}{JKEY]rra|u2<^xQX{:tpmZ8D.g?eS^IKyS5 ');
define('LOGGED_IN_SALT',   'O@xg{czM(i?}r5:xkPh5Ehy24k8&ePYuH6b :>=a|6*Qb~73OsT;`K#&4LM0`:iq');
define('NONCE_SALT',       ':UDl6&$<D:UBvC=?VPM3p7!Z1+.<$u5I>?V:bC94xx1 ]&9Fbyq@xe38lqNN^(ce');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
