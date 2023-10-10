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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'bienestar_animal' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'LoBO5fR8dA{E%AIzI;ZTEwe*3Rr7&6o`w k%KN{gI^AQ6p,EG82,=P3fiV{L6^>5' );
define( 'SECURE_AUTH_KEY',  '&#OX]slk1]A##$Iot_Ij. yO {Q%E=0;wWb.N0aOTv$;.])vy3jW1xX4|c?x~nxK' );
define( 'LOGGED_IN_KEY',    'h;zDBWajpUSYhu:jn^b Te5x`o,K`#FDiG~$u8(ls2<:ex7egkHoTv+R<YPuH$P+' );
define( 'NONCE_KEY',        '&|*e5{00~48I%~|K3(-IZp}2th3_ek)*RDTJ~?T$X!1H;BE]aO`Q&nf7VzrMOy?H' );
define( 'AUTH_SALT',        'lbG{ihz^x.`.|_=9ge#,TUuDnI,svPSAA(7iBY~mc**MkJri0WU?{aeTq=CK%IO4' );
define( 'SECURE_AUTH_SALT', '^I|wK{g_CA9)@2y}b14]V5jLi0WDEo(v-eC+ew~Fy1p$H()~.NWvFGE/G_-rUg[X' );
define( 'LOGGED_IN_SALT',   '.)/;du*wn>{6!WSw6LJ3Vc-I.ctr#j (g .<?c8i{z*R&m)J%N:c]eCNGM[ibWH9' );
define( 'NONCE_SALT',       'k_&WH^]v!yvGS#`C<NowBP3|e5Ew`ddon||<>zS=B>ld3Au-%dNn:OA)=8*<kF)1' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_ayuntamiento';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
