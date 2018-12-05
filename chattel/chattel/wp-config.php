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
define('DB_NAME', 'bizgrowt_wp427');

/** MySQL database username */
define('DB_USER', 'bizgrowt_wp427');

/** MySQL database password */
define('DB_PASSWORD', '6S.7m-BpK8');

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
define('AUTH_KEY',         'qv7rnmxlnubu5lcanq9wdgdfwwuljpjsslqnkr3nngqhq3q8qour1f815gceiqiw');
define('SECURE_AUTH_KEY',  'sfmonexqodxlsdel7esiou80s1hgucmqk07cf7klcemwaet1seimbvitxudtxqhl');
define('LOGGED_IN_KEY',    'ooxdccajuijoxmvlqksrj7jsdxu5zixnfafs4rliqdtgwhbwcn8zwwmgb7jgclp4');
define('NONCE_KEY',        '3d57kvfm7kav42en2fi0iy41qo6lxwmrf1ta0p4omeofmlqb9fflv1qsp7uzvgrh');
define('AUTH_SALT',        'mw5fkcoboerpsbtxdpra0sebqmcb9kv4qtd5xkt6ss8wrf4a7y1xrkxuvbkj6giy');
define('SECURE_AUTH_SALT', 'gltuwrvejuf6bxfwnjkeomw9a1jnnw7uzjo4xsxnt46tox4u8s4axsfhszvz4trl');
define('LOGGED_IN_SALT',   '4vkthtmuqsszmrqg2ylgmbofuknncuuybuxu9mxin6rynyv5gnvkrsjhji8qo3g9');
define('NONCE_SALT',       'ivlsg1zgfwkaj1yl4ym4jyq8efyl92sozid4txgovjqizumvordbizjqxyv8opz5');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wplw_';

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
