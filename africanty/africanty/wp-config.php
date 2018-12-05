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
define('DB_NAME', 'bizgrowt_afri');

/** MySQL database username */
define('DB_USER', 'bizgrowt_afri');

/** MySQL database password */
define('DB_PASSWORD', 'africanty123$@$');

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
define('AUTH_KEY',         'h+B9+|]+Ud4R=`wX}~ok4)fYxk[%9GZB9::V}hE<qTXxzFMV@w=^8HbmH)#zByud');
define('SECURE_AUTH_KEY',  '`Z]&nJrtskO}jNJT6Z+_fNY6I(1LS`B4G#=+wwm}0csCl BSeu|Lj_/W)JV5I<9i');
define('LOGGED_IN_KEY',    't~g/{yHF8 K:1OHBITEw:j:*0_&ga4;XKK=:QIww.4V9V-$Yy}}#(Pygo%^FcK9!');
define('NONCE_KEY',        ',4o~d7n*GTJ1n21R :V!^4{9%Km[,0yteu@`?s##@2)J4%;e^sLi_+umM_:Tv>73');
define('AUTH_SALT',        'SXlyJI&hyF#5Bjk Z{o3V@rJ|z;d=_r#xZQo%[V=go~C<3`D5qp`|gYk>~AzgIx<');
define('SECURE_AUTH_SALT', '^eb]FxMU`DI8N*$&iR)dDf.}=%HON^j`i}4$}90gS*@;:>Qo~HC[j;>,M1Ps@a9&');
define('LOGGED_IN_SALT',   'q~ pflE]<Z@tms%srN!5br!.:}SK ;vGU5]z-CN{6&~W#0,Vk`<|Y )?(`_ZB6jC');
define('NONCE_SALT',       ')ipW]/:u>fi<QK.:Wh|mPM`l;iyNJf_~BRZwH.a==,u,?m{CMPk1-~|n[8=z[kaT');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'afc_';

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
