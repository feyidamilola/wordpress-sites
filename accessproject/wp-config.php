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
define('DB_NAME', 'bizgrowt_access');

/** MySQL database username */
define('DB_USER', 'bizgrowt_access');

/** MySQL database password */
define('DB_PASSWORD', 'accessproject$@$');

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
define('AUTH_KEY',         'wPGW6N0:HOhiL}fbc&Yw~?Q*BMQ.*PeTGJ|G-26rkC(OBBL3T<-kk*L9F{kt4G_K');
define('SECURE_AUTH_KEY',  'O3h<w|=6YmpMeJ-=nC.5UHhUmZZ[b[N|[,bF%5EONb],D799~oA/(iS]YDea.#8}');
define('LOGGED_IN_KEY',    '%5wK76>2A>#rPg*>A@6sHIWoWR]%uiN),i/C5GqH&:9efed| <,]7=9GmCGErC+s');
define('NONCE_KEY',        '5):Am!D| D*fivu6T8@y;hnnnOx5OB~hT7m~e%[+$F!F#eH:RthD5l:*>_V^i)WA');
define('AUTH_SALT',        'mw`0XN3FdX!$?]B*HBO8~FwQhKi`e$:K$PJ=C^[rM%mejVIAgQbQ[%9s|d1vZHDt');
define('SECURE_AUTH_SALT', 'wYu,O>(e77NIlU!N2tO9L4 |/CU647J8q)`l6c;LDTU9&El}l=3+*&6AnHmkXt#^');
define('LOGGED_IN_SALT',   'N:RwH&bd@wkNmo[*)oGuTgS6m#%kK&Gl(dNA~eB&!3-BxPULOzO6fEJJ*ZNHQj(C');
define('NONCE_SALT',       'BgbH&t~~fc:ZT@Kh8=>Eoyr{ ~[^9ZNGrJR~L*(w(>C~#ud>$xB7%c#*Cm,S[k!N');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'ap_';

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
