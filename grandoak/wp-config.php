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
define('DB_NAME', 'astractc_grand');

/** MySQL database username */
define('DB_USER', 'astractc_grand');

/** MySQL database password */
define('DB_PASSWORD', 'grandoak$@$');

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
define('AUTH_KEY',         'H5h+uTGKdUY+I6V$KP3Msnv]ox<pKx*1>}6,<2#h}!RB/WqcGSK{7wgE6L[{afCG');
define('SECURE_AUTH_KEY',  '.@Qod^`y:_-Fz0~(?pqY#@@&0!o=Ya3X(|8,jV+IL_E~5h:OmBl$I_bVo_blaCeM');
define('LOGGED_IN_KEY',    'w aFaY!Z:O_k^we}W?N^7aiE|}Bhkq8v9aR>x>j0),6BJfzMk7Bc*A9wFm$0:@,A');
define('NONCE_KEY',        'cW9:j_pP7%ck-V]rpHK0R=n]=m4EcKJk>F_#|nX)NX(-5y.5^=J|a;kZH*Wp<=uj');
define('AUTH_SALT',        'T^a7U+f4lep}) Abt5|]hwsmF_!SL+1}7LW<S)Z*c5dmll,19Uj/X)3hZ>>ZTvDK');
define('SECURE_AUTH_SALT', '@hySm~y(Nzxlw_0m,DsN{(T%jbi?!xEFlDu,;EJ84C (INOwc<ruC#cI[`t9#Uev');
define('LOGGED_IN_SALT',   'a3[=mei7p&k`]8$OV2?K*^.diJ9aEK|I=oWf}6_{0~Mp@;S#OHw:zxED[M#%Su[M');
define('NONCE_SALT',       '@ksz^^{0v>(MZ7uem,:T $qn%L/Wqtb)Ob.Z9&-Sa*A9[z}b78Pz=,p67Ko(fbOt');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'grand_';

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
define('WP_DEBUG_LOG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
