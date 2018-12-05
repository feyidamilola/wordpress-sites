<?php
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
define('DB_NAME', 'bizgrowt_virtual');

/** MySQL database username */
define('DB_USER', 'bizgrowt_virtual');

/** MySQL database password */
define('DB_PASSWORD', '{FTuIs8!C8M9');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '3C&zM0jN-5>tbE+TS{pzYLYWSQ]UlrH+1Z*,WQ33gjen !oc6|42Xj7?9xI#Y:J&');
define('SECURE_AUTH_KEY',  '/p&yd;^T:/MJ6ruaD: cMV!^xkf->Nb;1,>DC10VWszf~lVd&-aD=w0iVn&JG=vH');
define('LOGGED_IN_KEY',    'Ba2n{LJ.NQGgTl8RGMOU[z]>xi53}kL9=&FKb]}MIWu@}C_YFB#?=28C*}mzRFi+');
define('NONCE_KEY',        'FkE6,Z}rQ42Fcv!$JE9?P@4,mNmWFY;E=:EObICGUG&AH4F=t7J~+V=EplJC2b}T');
define('AUTH_SALT',        'bhm68a-g-!H#JE1Z|[A`%rC+]q[#hlzpP(=M?^KY$}UCcH#sM3WY!sd~lVt:#uFP');
define('SECURE_AUTH_SALT', '60Mq:(Gf~TV>tC[wKw|}Mwa5G[.!_=z@0||]Gq|clBLF^gW:Js`#p4OO!.N1wP!]');
define('LOGGED_IN_SALT',   '~#jLPs@rbqvv)mB*25yJ Hlu4zl{hMEQmZsP(}e3?uqyruB=hn%OUKb|pKRIg2:V');
define('NONCE_SALT',       'Z?<c{OII1naC;^xo?Z 3?n!e*l5*sKazHG*@)P<t6E4:g#5*+^%2M10xLm8VQA5X');

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
