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
define('DB_NAME', 'bizgrowt_crown');

/** MySQL database username */
define('DB_USER', 'bizgrowt_crown');

/** MySQL database password */
define('DB_PASSWORD', 'shadecrown$@$');

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
define('AUTH_KEY',         'jQzMj<%.81(Rb73eg0+d,,|uuz%Sc^bYJ5zL0|0/<eiH`Y:!{7N%:d$kCC8{[@w4');
define('SECURE_AUTH_KEY',  'Rxmg5&O8YuZiq_PZwI&:vd4TcB5+Ex}C2gSddaMlvpd7#czS vW3F}|N^ Mn(g&y');
define('LOGGED_IN_KEY',    '~&.BX58#6dg5v7!&]j:L|MFSpiyUeN,64s;hPTuk^68V;^aol@/Fy/tt}qA~7vLL');
define('NONCE_KEY',        'gU/DpPfd(SW@{w],/-G<&VlMPAv+W^;nnAptA7A8:w90f_keV5!MD,@/DM-R7c+p');
define('AUTH_SALT',        'E3Qt :?Ac?hrwz1r^EP9BqobO>Kp_f#PT$Kd:6xsEz30xC}zE7Faw^$yi[}=h/Cl');
define('SECURE_AUTH_SALT', '?**9a a,_xD!jnuu($Z@?Apb8/12]<v##@Qjb%,7Vhx*V(_Cj|Yi7PezT=Pq50!x');
define('LOGGED_IN_SALT',   '%j$+~[0NPN!gL`|}EmH?+-gAiCTd&#A@&CEOO@=b4EA|k!oan3z6L2/N/=Nn0D9[');
define('NONCE_SALT',       '~Z(l,u&]d<DH44ygI{wW2YGZrlj4<OEF9=jAc@Yi6dz#JH;4(X ck>DP{%8@J6E4');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sc_';

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
