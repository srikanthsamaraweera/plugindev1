<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'plugin1' );

/** Database username */
define( 'DB_USER', 'srikanth' );

/** Database password */
define( 'DB_PASSWORD', 'Robinhood456' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'WCH5;Vzdy-<y=|e&c7B~@%B^el^/=lA|t8t[]c6I0oLN4XT0_)#Ze>92[h[Qgvh4' );
define( 'SECURE_AUTH_KEY',  'DclD@d8s!OBM_|FQo[B) @/dZ?Fq6eAB5cEo)j2V)rt-#5FZs )yj%%o!x<MSC<L' );
define( 'LOGGED_IN_KEY',    'sGR9boP;TGDu`MP&U.Vx3=6${vE xLcqACvj4+bcV_&*XkQIF{t]qtOWE/!%r0pK' );
define( 'NONCE_KEY',        '}_;7Z]]w%|L!!b)N7?37G|c+Hs;UEw0 ZH^7u|$Yt9e%QPCG-c#J{#_B1Q+%H`I#' );
define( 'AUTH_SALT',        'r9m&lt|C*j&%SNtDpRzMq2[>C$)ow@{8^XoGzZ*G<<ON >vU~PQ{JEdCQ!^5_ha4' );
define( 'SECURE_AUTH_SALT', 'w=QqZaeaUNDYs?p|O:I!I+4279u()|Hs1J]nA{L))Eb-m@(]-{BupDO3?/?.8bQ*' );
define( 'LOGGED_IN_SALT',   'tzM,2das])L_/Oze)$,g[9tNl!0(8U`n)R,9=?5|`/]zu5czCCUCGmGjIzlB!QHd' );
define( 'NONCE_SALT',       'A8XtU=W:.g*{FaY^)UXPG!!dP}H5rcujN?Mfw<;$)XuB}Z?7miRq_nC+Y?wP:,oy' );

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
