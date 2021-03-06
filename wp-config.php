<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'groschopp' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '~Q[$Lobl*%4Shan&|tw--AMhmNNS%cL6+ILol!l;d]RmN:K9kLbR*.kvLEp2/SXo');
define('SECURE_AUTH_KEY',  '0ckR-b,ZiV9M{Sy/ispRSuSdQb4|.A`.OZ^H!=_j{q8II09lru$jtfflAs~G$A-p');
define('LOGGED_IN_KEY',    'G(5Eh5,*;4=) !P>.H/A-RvAmiu#vb%@+tGQj%,hXH:|B:C2 u;kGq+D#9==xJ8E');
define('NONCE_KEY',        '+>kr&ZJ0>p:{K obUWGks@oWQ4+u#F `?E_wQxs HuNrKpf;{&(E/Wn*L |/gmyQ');
define('AUTH_SALT',        'bf}k*|~uaUyWGSzUcQ<R?a|{sNY.FcPL<xJ/[.R?eUPch1h#0.t@1{$>2SWm4+ud');
define('SECURE_AUTH_SALT', 'C!_MJcjmu7Z+4B5/et86>*T+#v;-^$vR11Ew!2Fdq1r0pq8~o]wA*6Z~bWl@+m~m');
define('LOGGED_IN_SALT',   ')|oAF[RHi*b( uYPqq(T<ZXKm^9xuXsJA*Dw*lThyt1eY[1BF<1#H9(E*{F(<n5f');
define('NONCE_SALT',       '4tZC][jS7uFCt*Hc%@~%d1X]RfdT5wQk5f|r#m$KkCkyPFHjL@=_d}tnxaL|DxBy');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */

define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
