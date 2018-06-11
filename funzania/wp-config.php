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
define('DB_NAME', 'bizgrowt_funzania');

/** MySQL database username */
define('DB_USER', 'bizgrowt_funzani');

/** MySQL database password */
define('DB_PASSWORD', 'funzania$@$');

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
define('AUTH_KEY',         'n<6wYVY*s$6Qb.,RtyIXAq^2[$I5(i`=L*Q`T<o?[^719n4,RoBbd3? f1!=M0`h');
define('SECURE_AUTH_KEY',  '1JlJ_q%|lyxO|I++Nif2Q{He@n3Dtxg@N3I;{HrsiB?m;bA:e,[GdnY|9R)jw^!`');
define('LOGGED_IN_KEY',    'S0|B1NwV{d-tzP7Fzy/45F[0E/{Y.jIN7mI)nm K|e&HOw2rX*bF0OSL,kFlcW!>');
define('NONCE_KEY',        ':5k:%c6 -PI.fFnCzp%!:l@E(t^>5HJk+#)7WY?-8=:YR.UEM]R=leErNWr`tjpy');
define('AUTH_SALT',        'J8<lKq*zl0G{YoND)xW~*v,p%HKLsB]PFLKfx|`)pB]J`$^e`1R0jtM&{@%Wt1e.');
define('SECURE_AUTH_SALT', '27F2|K{$:pf;X4E6KZCWWAn-<h}bHN> ?D^>,qwn;uaA9|PYK=/(5;>ajf&z G`6');
define('LOGGED_IN_SALT',   '?Wih`W$@~SNZSI|N2 _rtB5o/K6I]LgwN0yx1Y-l/DQ9s#G-5Nt1QV2-D)eIa&F:');
define('NONCE_SALT',       '>xx(}2gp_5Nu{`#zs!Cb_yHQZ:lS4X`j;H.#3,n9O&f9hL0akH+4YVeD6`guKb?;');

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
