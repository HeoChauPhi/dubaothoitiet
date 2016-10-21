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
define('DB_NAME', 'demowp_dubaothoitiet');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '1');

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
define('AUTH_KEY',         'd5x,LU6M$BnD^SmrmPc2Z4wIsDh@R%+t#3&.vK#7e88>uuKF|343(<Cc@QC]NL*[');
define('SECURE_AUTH_KEY',  'q+Olh`+Fk`DYFU<$/DzpCTN8/_~3k^(C,ALf&:kB_zl<3s3PWn{HW|#&ST@.YA<1');
define('LOGGED_IN_KEY',    'kU1HjOihJ;t__6`; w$L<tv}@d~Bc 4?GL/,_gN-+$eXxDsgtmMTD 6GB<`Xq)#;');
define('NONCE_KEY',        '/=gH]{moqt[$<I[_NXO@Sp}1@2sq;(8=x6f^6VM;y8m W=,6u0p<#x?`u6:.h2c^');
define('AUTH_SALT',        'S;Q41>aEY:jd#o`32J2p57YKK=c#A|6~U<MHC%j|dOKUr #*&l/_9/u]Dz(Wlp(h');
define('SECURE_AUTH_SALT', '%jUD{-H.6| ,i;khX[np,o$bF^0o4eA2XQjUC8TU-OL|9mQW`#kdP#5+(|2CRX@j');
define('LOGGED_IN_SALT',   'w`YjAlp };v{>+OfC`{Q)A|nYi S<rkjH%A7z>0?.cXEOo}Vap8n].6^W|5fH<h%');
define('NONCE_SALT',       '6&d#sZOeKN$pFGYU7EI[SH~GAKBcEs8RK)puA<UT,| OJ7U(,&$j2ua.yk1Zp(*+');
define("WP_HOME", "http://localhost/demowp/dubaothoitiet/");
define("WP_SITEURL", "http://localhost/demowp/dubaothoitiet/");

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', true);
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
