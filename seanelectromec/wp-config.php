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
define('DB_NAME', 'bizgrowt_sean');

/** MySQL database username */
define('DB_USER', 'bizgrowt_sean');

/** MySQL database password */
define('DB_PASSWORD', 'seanelectromec$@$');

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
define('AUTH_KEY',         'X[ZB&suB>/>5n(65%2rfb-)EU-HQy#_[g- C7;q;[I4t|O|Q@=[Kj&7KM^Ogqrc3');
define('SECURE_AUTH_KEY',  'zr_HhvbR7x.T+@63<hf8|{HV5(CN/t: !a;4o>(pJ4gP%u]GM<>HZwQ:hA4w!sfe');
define('LOGGED_IN_KEY',    '`]&]CPa^:hCzSBvYfV%.OeHQ>-eO1GC*Rj<^qJ<+RwrjW]Vsc%6.Yc(e7pHB|bL;');
define('NONCE_KEY',        '`!m0E7/x=Gpa8!hHnTrOncOQ0%)!NQh)tN*fY2<Y)oxAmK}sNNL~*)_/|c$Im4Ha');
define('AUTH_SALT',        'CYgwfae=6S!$N>H.OvhfiTay=w@P@yd<:P-giJ>@@My0HK*qxg^s!5edN|V%k13+');
define('SECURE_AUTH_SALT', '8#/_6Mm+>Y67Cs2$c~ybG;u[uqH#I6oph)V& OOxnq4w_p#g3ZNpu+qXcn0Cr_NV');
define('LOGGED_IN_SALT',   'Pq:qT&*}3#[p^$yZ37`2I^GXB?LT(ys>0_0&t86. hClG[@7yM|WY$/wJjxuwHQ_');
define('NONCE_SALT',       '<y5b^nE?HcNk`IIRn{CMk?k>-3Jh2 _xH/[F6Wl+dvo=A.3|D<r_S|EUnZ]r>!yb');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'elect_';

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
