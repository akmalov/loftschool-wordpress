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
define('DB_NAME', 'final3');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'L3!yR(q/iPc*EjuJ{2go43NcN[vbh ^jj([V]Rj+Jtc!^i_s;W)lsj%Mq?4+unA[');
define('SECURE_AUTH_KEY',  'PyQ6KCS5}Ph!J/8Cls$1SBk4O7@)O<G#(CNxIjw fU= et3zf7ICVmq0dN.Yufk8');
define('LOGGED_IN_KEY',    'qF83|D.tdy~V8(*r69,N%]#T/o1j-fC:p .^rcgCMf]NU<|$=v#,v*:B]?Ts1a67');
define('NONCE_KEY',        '42Aq*8$ZR2n%DLW|F9|?)<sG_DsBSfwHjW[]DV5r&=zP|z1&Jc ^+)my!5 g%A%2');
define('AUTH_SALT',        'FJdI?rf|c#apmB_MdgYu5z!/9]@nOuK85{_m8voJx,jn<tC-W2?y`Qan61<._so2');
define('SECURE_AUTH_SALT', 'z0M5WAj%ywKxPeQGoFq3~pgdcts-td&Jw7Cq3aXI%A$S0DU),4/<JY6rbXiiKi,&');
define('LOGGED_IN_SALT',   'b>|WpV,U2>t{2=s%(_n=NvKpgw zMSC(TUclN&}zREdQ$8t`i^@lCO*V6agNmpby');
define('NONCE_SALT',       'xO@qkk&a:=yGe$aI6k4GJn|Sxq9M[L.w)?q:N>qu0,U?>MVLl$B{mwkmmKA li>5');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
