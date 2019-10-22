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
define( 'DB_NAME', 'portfolio' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '+CEKh729>C.+].bH!,I!.Bsg]/ZWUVh<]C94lGm_b,CnMy9z3cA(nqF~PNi[.6so' );
define( 'SECURE_AUTH_KEY',  '&JA/v1jO&&FMMf?):,bS|HC}`#oBaX!,FdPE`x^=Zn.h sDDc3bIX c_zKpGArFr' );
define( 'LOGGED_IN_KEY',    ']j7t<zV]vsTI~t074DOz@ae>HfEkb=7#%b_J7bn3f)_,(81$jUYUC|v]$Cu@s26P' );
define( 'NONCE_KEY',        'RoF 7#@1IWps~U3tc-)VE+`U=]A-E/V<AI_R&SI@WGVh?~[Dmp/+m0ut_.[sC&$V' );
define( 'AUTH_SALT',        'Ng?*Ni&BLJEX(C%)>e}OPE-=lRY_JI0<pNpGOKA<{^m|){#DfZJ$_<_vI&oUu}6e' );
define( 'SECURE_AUTH_SALT', 'bMxshX&6.FHZ%cvXq1tK&*|^l^G4l&Q|M1?w,M[z%d]I1$wX%UY;:k9u?s: SB2B' );
define( 'LOGGED_IN_SALT',   'rR-gb/0~qx|8xWZ`^Iaj lsu0Vg0vaI^0w8w`,)I436pw_oG}?lBy^m6lX>VYex<' );
define( 'NONCE_SALT',       'jf!z>p^}3]~$af-hW,AHXq83NOh3IVcJlZe;lgh<Qo/343{uO5PuWg^nQ56=K*6o' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'p_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
