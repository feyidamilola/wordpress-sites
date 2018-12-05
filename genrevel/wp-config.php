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
define('DB_NAME', 'bizgrowt_genrevel');

/** MySQL database username */
define('DB_USER', 'bizgrowt_genreve');

/** MySQL database password */
define('DB_PASSWORD', 'genrevel$@$');

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
define('AUTH_KEY',         'z&,3p)*IleAH[2Uz>R)~MfG QO^)H6{I2[C4I6(lVI1I{j<th}<cov;{1Z U?p>l');
define('SECURE_AUTH_KEY',  'Y)mQuR$LB%!*F/1W+bf872KJIkC36-4yU04>d))%z__OS9sHDDNG+^GRs}|bm|l8');
define('LOGGED_IN_KEY',    'm*?cu0.I!aK zu(&*YWx0y$f`bx3gqSth+6(},aklHB;?$*HLD?/@H5{][=9oZq6');
define('NONCE_KEY',        'FU|4H#+RMNdYC3<m4JCL2eQ3}x=i#uaAX86IMuESYWq&E1ZRd0jRQ Qb./pD7 K4');
define('AUTH_SALT',        '56aor_s;+Z.W,8pSH;#/N9E&?_S94b]l`` RyBVB8v-6~5~ 8XWJrChVzmr1x!-R');
define('SECURE_AUTH_SALT', 'Z4.]F@Puz?^cYWH(uN=A.kYh hORVkSALw[*nkry>+fw=;wB6-lSP Z[JVwsxhmz');
define('LOGGED_IN_SALT',   '9.9Tw/DAx~=0RyG,Vl*ej$gg4xCKHue) ln5;KGMkV8Z`G0i MPX-i}Xyp;v+yyY');
define('NONCE_SALT',       '}><LlEh~KXI}Js64w`4fQ]rBE#SvC~N-X=@_~h-Rb%:).mr~~X%OH+}$+u/6E-:O');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'gen_';

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
