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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', '100kapsul' );

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
define( 'AUTH_KEY',         '#-,UQ4js$@(jgoo=m|%Kwn^&%^tn;btL,m%>.nEYVE.c[^8OhKO59PS,*G!xc*+,' );
define( 'SECURE_AUTH_KEY',  '0lv@=kZsILTzbB`b|^O^H[S1u@Vx*>[NW%CaRY^$T.jW9dZ,0E6=Qel3F4M%_O[9' );
define( 'LOGGED_IN_KEY',    'r0GHCF5~Fb-.QsV/EI9wfEA_|Hn5snuL]>~+y[BdLQFyqI=VTk{Ox+f!y$yI!X2t' );
define( 'NONCE_KEY',        '96c&lNdEW+~,Pa^Wk}Ana !E59.B~tfV1{#dA?GIH|46m?TGo|;>0s!Ww}^K(<1G' );
define( 'AUTH_SALT',        'P$1P<@+?4N2FA8&N*lY;iGt?$3v1=UsRu9@E0<!{k;=%x2}NH^lNOWU[M;{Hj#wa' );
define( 'SECURE_AUTH_SALT', '3Y@:$yeP$P$a#,2>MVjeq&)F)lC$ZFS)GtmtZ^#bU  Cp&QYEWh&%MA&Q+,%]n62' );
define( 'LOGGED_IN_SALT',   '**LuZ?1 bgJ9TOz0),Ux&+RbA6KPy[ OV0EJ_Q>`I%80V[Lsft94+@zl~iJ%qQhh' );
define( 'NONCE_SALT',       'Rna`SxJI~z/$;c@:7{&db&aU8$I{kBHIk;u8}S89{n+ROr~_o^krUWAaop(Jlm##' );

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



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define( 'WP_HOME', 'http://100kapsul.loc' );
define( 'WP_SITEURL', 'http://100kapsul.loc' );
