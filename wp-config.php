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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'tung');

/** MySQL database password */
define('DB_PASSWORD', 'tung');

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
define('AUTH_KEY',         'A,_NTkJaQnA<cnMyt{V=Y7[[XMb9<)}~!Kps);|yeR~Vio|!zb*.Ovzu1?&}2Z!J');
define('SECURE_AUTH_KEY',  'q8JtYzad5ms2x-4&jm)3&7C+?.HlPav&C>00]VeKi{wB,TuuMk|uE`$!Fp3swB`|');
define('LOGGED_IN_KEY',    'rJ,.SlvX1da9Txc5d{lik5Rc)YtS]HG3 (MH%}Gmk,V>(S- uKsp^2wf9C&)sG+4');
define('NONCE_KEY',        'JejLa!#E&gZolYwjoeq(X1P EH$AoMYGD(Jj_:TNe/MPA~]C:hf0d0OGptBC`pq$');
define('AUTH_SALT',        'S^ZrV:KbdeG9/GLx/GC((V6u3sZ.KPS/_n*9i7p/iHhlx?G0-}[[[}L:5M. Z(xu');
define('SECURE_AUTH_SALT', '%t,7X9S6Pk!tY*^-ZTQPe:n$]iTzDD#rjTXJ;$/tm$LV/>Pz@7xrB<peIiC&vNH+');
define('LOGGED_IN_SALT',   's/uKAo1xS4~~~)]PP-bQ,PsOr>f#1QyO 1Gc#nh26(fRl!qfry~{9Di%?2*GA*k4');
define('NONCE_SALT',       'f*rGk7ddfP9DvZ_6tv)Ba/+0*VT>CO>4c%T*xR]s/:09.l:iYk.dIkr 3zP2|&|@');

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
