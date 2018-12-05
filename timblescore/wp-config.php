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
define('DB_NAME', 'bizgrowt_timble');

/** MySQL database username */
define('DB_USER', 'bizgrowt_timble');

/** MySQL database password */
define('DB_PASSWORD', 'timblescore$@$');

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
define('AUTH_KEY',         ',m^)s c{q?FF X)xW)cX4zpHh2#`8mz[?]6~SzbqP[}c]$j6H>V[wbY_4gE@1sH^');
define('SECURE_AUTH_KEY',  '@=@.Y^0AaO3,-m>UXKf;hfQT_dCEt~#FmPkV#?>lTGsAZtPEcycf22!u/@K0[4o^');
define('LOGGED_IN_KEY',    'DO_@FcMe3T)ys*[xs?XoO-H((#};O,5^`hbTAHy#Zc(YRGvi8^1UC*rHlD^VsS%T');
define('NONCE_KEY',        'z}E9pkG6I#!Qa+R[_nY47LR gzv2<9eVvkY5wu&kbbNqawX>[-CjU1{l>zQ9a~kj');
define('AUTH_SALT',        '-G<@;.bU4bdKbH1ktl~Y`Kf?|b7gEu7;Bl|0&=)dO:fI~}r*WtYwF)8rsuERl* p');
define('SECURE_AUTH_SALT', 'XFN@]BbE~w)8yXGNk./Z]U`5CbbLy7;[z7(v2AqJ|~3D~bpWDf[!9DwDAk+@te$S');
define('LOGGED_IN_SALT',   'jTp%7- Vq.2 #}D~oM^[:a=m!rW9[<xkV*VVH9o{{Rlpb|-T8M`aU}{95DFjCO4K');
define('NONCE_SALT',       ')~1OusCj0Kn.UlEd@a[9BQNAU?@xmy0 %?G$5DPvKF=JV#ucLr;!3{c^y3s#p5cm');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'timble_';

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
