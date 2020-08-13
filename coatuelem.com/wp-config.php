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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'coatuelem' );

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
define( 'AUTH_KEY',         'uZ!sgR68J!Ap6N6>L:B@_M2fa1(1_80!=!y7Kc4-zz,d3S_L(Ps=$6+yE6!.Tsx:' );
define( 'SECURE_AUTH_KEY',  ']*kM[%SU#~V1BwCrD754yRuoh[7k;$,KVoK:oXnK[Ey=7vxd2&,#+wDyAicsmN>4' );
define( 'LOGGED_IN_KEY',    's= U.0w>*![0FOBX{d{k *,(&A3|({69]ja|@m B29vB$E6_[IxFmMwTRvfiI6R;' );
define( 'NONCE_KEY',        'TUg<+}CgNt sg-T?MLrlUj`#wKaD1kmN=#9X)KbxB*,HOfiD{7LORW<[2M$id;.`' );
define( 'AUTH_SALT',        ',<BRJc1?F2*,O~dt=%8ZknCc.9g6[IJWaj~$OHJNg_{5Pb(IJ(IkSaNigv/_;:rG' );
define( 'SECURE_AUTH_SALT', 'E. B!1Ce;!:b>Kgw5jzfC.st0J.;`TG@?.HP&LDd4T|E~RF-G)f;YIbkOJiy;RM ' );
define( 'LOGGED_IN_SALT',   'n^ wE2unwKNr<O-GK[wN9R5P6=CQJzCHBsn1|4:OeC9XT5$ulRI&3I9o.;FHLpw2' );
define( 'NONCE_SALT',       'm]KXN@[58N4[3kR;%^d1CWAp7ZW`7F#bk681;-$nL19x,f9q>;IO Kp9C|Ht`.GJ' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
